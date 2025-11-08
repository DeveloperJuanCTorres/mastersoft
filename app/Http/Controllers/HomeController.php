<?php

namespace App\Http\Controllers;

use App\Mail\Contactanos;
use App\Mail\Reclamos;
use App\Models\Api;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Company;
use App\Models\Field;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $business = Company::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        $mas_vendidos_ids = DB::table('order_items')
            ->select('product_id', DB::raw('SUM(quantity) as total_vendidos'))
            ->groupBy('product_id')
            ->orderByDesc('total_vendidos')
            ->limit(6)
            ->pluck('product_id'); // devuelve solo los IDs

        $mas_vendidos = Product::with('taxonomy')
            ->whereIn('id', $mas_vendidos_ids)
            ->get();


        $banners = Banner::all();
        $promotions = Promotion::all();
        $products = Product::where('stock', '>', 0)->take(12)->get();
        return view('home',compact('categories','banners','promotions','products','business', 'mas_vendidos'));
    }

    public function store(Request $request)
    {
        $search = $request->input('search');
        $business = Company::find(1);
        $products = Product::query()->where('stock', '>', 0)
                    ->where('name', 'like', "%{$search}%");
        $promotions = Promotion::take(2)->get();
        $categoriesNav = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

       
        if ($request->filled('categories')) {
            $categories = is_array($request->categories) ? $request->categories : [$request->categories];
            $products->whereIn('taxonomy_id', $categories);
        }

        if ($request->has('brands')) {
            $products->whereIn('brand_id', $request->brands);
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $products->where('name', 'like', "%{$search}%");
        }

        $products = $products->paginate(6);

        if ($request->ajax()) {
            return view('product-list', compact('products'))->render();
        }


        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->orderBy('name', 'asc')->get();

        $brands = Brand::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->orderBy('name', 'asc')->get();

       
        return view('store',compact('categories','brands','products','business','categoriesNav','promotions'));
    }

    public function detail (Product $product)
    {
        $business = Company::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        $relatedProducts = Product::where('taxonomy_id', $product->taxonomy_id)
                          ->where('id', '!=', $product->id)
                          ->get();

        $promotions = Promotion::take(2)->get();

        return view('product-detail', compact('product','categories','relatedProducts','business','promotions'));
    }

    public function contact()
    {
        $business = Company::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        return view('contact',compact('categories','business'));
    }

    public function about()
    {
        $business = Company::find(1);
        $nosotros = Field::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        return view('about', compact('categories','business','nosotros'));
    }

    public function checkout()
    {
        $business = Company::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();

        return view('checkout',compact('categories','business'));
    }

    public function reclamaciones()
    {
        $business = Company::find(1);
        $categories = Taxonomy::whereHas('products', function ($query) {
            $query->where('stock', '>', 0);
        })->take(8)->get();
        return view('libro-reclamaciones', compact('categories','business'));
    }

    public function buscar(Request $request)
    {
        $productos = Product::where('name', 'like', '%' . $request->nombre . '%')->get();

        return response()->json($productos);
    }

    public function apiBrand()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Grupo/Listagruposxcodigo_web";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_grupo" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoGrupo as $key => $item) {
                    Brand::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Marcas con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function apiCategory()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Linea/Listalineasxcodigo_web";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "codigo_liena" => 0
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoLinea as $key => $item) {
                    Taxonomy::create([
                        'name' => $item->descripcion,
                        'id_sistema' => $item->codigo
                    ]);
                }
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Categorías con éxito']); 
            }
            else{
                return response()->json(['status' => true, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function apiProduct()
    {
        try {
            $business = Company::find(1);
            $ruta = "https://erp2024.keyoficiales.com/api/Inventario/ProductosWeb";

            $response = Http::post($ruta, [
                "ruc_empresa" => $business->ruc,
                "idlinea" => 0,
                'idgrupo' => 0,
                'idalmacen' => 0,
                'descripcion' => '',
                'cantidad_producto' => 1000,
                'paginas' => 1,
                'estado' => 'P',
                'fechainicial' => '2025-04-25T14:54:34.307Z',
                'fechafinal' => '2025-04-25T14:54:34.307Z'
            ]);

            if ($response->successful() == true) {
                $body = json_decode($response->body());
                foreach ($body->listadoCatalogoWeb as $key => $item) {
                    $marca = Brand::where('id_sistema',$item->grupo)->get();
                    $categoria = Taxonomy::where('id_sistema',$item->linea)->get();
                    if ($marca) {
                        if ($categoria) {
                            
                            Product::create([
                                'name' => $item->descripcion,
                                'slug' => Str::slug($item->descripcion),
                                'price' => $item->precio_venta,
                                'taxonomy_id' => $categoria[0]->id,
                                'brand_id' => $marca[0]->id,
                                'id_sistema' => $item->codigo,
                                'unidad_medida' => $item->presentacion,
                                'stock' =>$item->stock
                            ]);
                        }
                    }             
                } 
                return response()->json(['status' => true, 'msg' => 'Registro masivo de Productos con éxito']);                
            }
            else{
                return response()->json(['status' => false, 'msg' => 'Algo aslio mal']); 
            }

            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => 'Error:'.$th->getMessage()]);
        }
    }

    public function correoContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
       

        $correo = new Contactanos($request->all());
        try {
            Mail::to('jtorres@vesergenperu.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }

    public function correoReclamo(Request $request)
    {
        $correo = new Reclamos($request);
        try {
            Mail::to('jtorres@vesergenperu.com')->send($correo);
            return response()->json(['status' => true, 'msg' => "El correo fue enviado satisfactoriamente"]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => "Hubo un error al enviar, inténtalo de nuevo más tarde." . $e->getMessage()]);
        }
    }

    public function pedido(Request $request)
    {
        try {
            $business = Company::find(1);
            $apis = Api::find(1);
                        

            // Generar el PDF y guardarlo en el storage/app/public/facturas/

            $orden = Order::create([
                'name' =>$request->nombre,
                'apellidos' => $request->apellidos,
                'empresa' => $request->empresa,
                'telefono' => $request->codigo . $request->telefono,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'ruc' => $request->ruc
            ]);

            $data = ['nombre' => $request->nombre,
                    'apellidos' => $request->apellidos,
                    'ruc' => $request->ruc,
                    'empresa' => $request->empresa,
                    'telefono' => $request->codigo . $request->telefono,
                    'email' => $request->email,
                    'direccion' => $request->direccion,
                    'orden' => $orden];

            ini_set('memory_limit', '512M');

            $pdf = Pdf::loadView('partials.pdf', $data);  

            $pdfPath = 'pedido_' .$orden->id . '.pdf';
            Storage::put('public/pedidos/' . $pdfPath, $pdf->output());

            $ordenid = Order::where('id',$orden->id)->find(1);

            $orden->update([
                'pdf' => 'pedidos/' . $pdfPath
            ]);

            foreach (Cart::content() as $key => $value) {
                OrderItem::create([
                    'product_id' => $value->id,
                    'quantity' => $value->qty,
                    'order_id' => $orden->id
                ]);
            }                        

            $mensaje = Http::post($apis->ruta_whatsapp, [
                "ruc_empresa" => $business->ruc,
                "numero_celular" => $request->codigo . $request->telefono,
                "mensaje" => 'Aquí le enviamos el detalle de su pedido',
                "ruta_imagen" => config('app.url') . '/storage/pedidos/' . $pdfPath,
                "apikey_bot" => $apis->apikey_bot_whatsapp,
                "ruta_bot" => $apis->ruta_bot_whatsapp
            ]);

            // config('app.url')

            Cart::destroy();
            return response()->json(['status' => true, 'msg' => 'El detalle de su pedido se envió a su WhatsApp']); 
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }        
    }
}
