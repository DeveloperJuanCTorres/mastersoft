<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function editarStock(Request $request)
    {
        try {
            foreach ($request->listado as $key => $item) {
                $producto = Product::where('id_sistema',$item['id_sistema'])->get();
                $producto[0]->update([
                    'stock' => $producto[0]->stock - $item['cantidad']
                ]);
            }
            return response()->json(['status' => true, 'msg' => 'Se edito con exito']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addProduct(Request $request)
    {
        try {
            
            $marca = Brand::where('id_sistema',$request["grupo"])->get();
            $categoria = Taxonomy::where('id_sistema',$request["linea"])->get();
            if ($marca) {
                if ($categoria) {
                    
                    Product::create([
                        'id_sistema' => $request["codigo"],
                        'taxonomy_id' => $categoria[0]->id,
                        'brand_id' => $marca[0]->id,
                        'name' => $request["descripcion"],
                        'price' => $request["precio_venta"],
                        'unidad_medida' => $request["presentacion"],
                        'stock' =>$request["stock"],
                        'slug' => Str::slug($request["descripcion"])                        
                    ]);
                }
            }  

            return response()->json(['status' => true, 'msg' => 'El producto se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addBrand(Request $request)
    {
        try {
            
            Brand::create([
                'name' => $request["descripcion"],
                'id_sistema' => $request["codigo"]
            ]); 

            return response()->json(['status' => true, 'msg' => 'La marca se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    public function addCategory(Request $request)
    {
        try {
            
            Taxonomy::create([
                'name' => $request["descripcion"],
                'id_sistema' => $request["codigo"]
            ]); 

            return response()->json(['status' => true, 'msg' => 'La categoría se agregó con exito']); 

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }
}
