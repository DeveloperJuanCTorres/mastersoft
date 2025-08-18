<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Facades\Voyager;
use App\Models\Product;

class ProductController extends VoyagerBaseController
{
    public function index(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Modelo base
        $model = app($dataType->model_name);
        $query = Product::query();

        // === Filtros personalizados ===
        if ($request->filled('taxonomy_id')) {
            $query->where('taxonomy_id', $request->taxonomy_id);
        }
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // === Búsqueda texto ===
        if ($search = $request->get('s')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // === Orden ===
        $orderBy = $request->get('order_by', 'id');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($orderBy, $sortOrder);

        // === Paginación ===
        $perPage = $request->get('per_page', 15);
        $dataTypeContent = $query->paginate($perPage);

        // === SoftDeletes ===
        $usesSoftDeletes = false;
        $showSoftDeleted = false;

        if ($model && in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive($model))) {
            $usesSoftDeletes = true;
            if ($request->get('showSoftDeleted')) {
                $dataTypeContent = $query->withTrashed()->paginate($perPage);
                $showSoftDeleted = true;
            }
        }

        // === Multi-idioma ===
        $isModelTranslatable = is_bread_translatable($model);

        // === Actions ===
        $actions = [];
        if (!empty($dataTypeContent->first())) {
            foreach (Voyager::actions() as $action) {
                $actions[] = new $action($dataType, $dataTypeContent->first());
            }
        }

        // === Server-side (DataTables) ===
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        // === Checkbox (acciones masivas) ===
        $showCheckboxColumn = false;
        if (auth()->user()->can('delete', app($dataType->model_name))) {
            $showCheckboxColumn = true;
        }

        // === Order column ===
        $orderColumn = [];
        if (!empty($dataTypeContent->first()) && $orderBy) {
            $orderColumn = $dataTypeContent->first()->getAttributes();
        }

        // === Search actual ===
        $search = $request->get('s');

        return view('vendor.voyager.products.browse', compact(
            'dataType',
            'dataTypeContent',
            'usesSoftDeletes',
            'showSoftDeleted',
            'isModelTranslatable',
            'search',
            'orderBy',
            'sortOrder',
            'actions',
            'isServerSide',
            'showCheckboxColumn',
            'orderColumn'
        ));
    }
}
