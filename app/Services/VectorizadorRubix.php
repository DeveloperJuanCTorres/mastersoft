<?php

namespace App\Services;

use Rubix\ML\Transformers\WordCountVectorizer;
use Rubix\ML\Tokenizers\Word;
use Rubix\ML\Datasets\Unlabeled;
use App\Models\Product;

class VectorizadorRubix
{
    protected WordCountVectorizer $vectorizer;

    public function __construct()
    {
        $this->vectorizer = new WordCountVectorizer(
            minDocumentCount: 1,
            tokenizer: new Word()
        );
    }

    public function buscarProductosSimilares(string $query, int $limite = 100)
    {
        // Obtiene todos los productos con stock > 0
        $productos = Product::where('stock', '>', 0)->limit(3)->get();

        if ($productos->isEmpty()) {
            throw new \Exception('No hay productos disponibles para analizar.');
        }

        // Prepara los textos (nombre + descripción) en minúsculas
        $textos = $productos->map(function ($producto) {
            return strtolower(trim($producto->name . ' ' . $producto->description));
        })->toArray();

        // Crea el dataset con los textos como entradas
        $dataset = Unlabeled::quick(array_map(fn($texto) => [$texto], $textos));

        // Entrena el vectorizador con el dataset de productos
        $this->vectorizer->fit($dataset);

        // Transforma los samples del dataset
        $samples = $dataset->samples();
        $this->vectorizer->transform($samples);

        // Guardamos los vectores transformados
        $vectores = $samples;

        // Vectoriza la consulta
        $querySample = [[strtolower(trim($query))]];
        $this->vectorizer->transform($querySample);

        // Verifica si el vector contiene información útil
        if (!isset($querySample[0]) || !is_array($querySample[0]) || count(array_filter($querySample[0], fn($v) => $v !== 0)) === 0) {
            throw new \Exception('La consulta no contiene palabras reconocidas por el modelo.');
        }

        $queryVector = $querySample[0];

        // Calcula la similitud del coseno entre la consulta y cada producto
        $similitudes = [];
        foreach ($vectores as $index => $vector) {
            $similitudes[$index] = $this->cosineSimilarity($vector, $queryVector);
        }

        // Ordena por mayor similitud
        arsort($similitudes);

        // Obtiene los productos más similares
        $indices = array_slice(array_keys($similitudes), 0, $limite);

        return $productos->filter(function ($item, $key) use ($indices) {
            return in_array($key, $indices);
        })->values();
    }

    protected function cosineSimilarity(array $a, array $b): float
    {
        $dotProduct = array_sum(array_map(fn($x, $y) => $x * $y, $a, $b));
        $magnitudeA = sqrt(array_sum(array_map(fn($x) => $x ** 2, $a)));
        $magnitudeB = sqrt(array_sum(array_map(fn($y) => $y ** 2, $b)));

        if ($magnitudeA == 0.0 || $magnitudeB == 0.0) {
            return 0.0;
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }
}