@extends('voyager::master')

@section('content')
<div class="page-content browse container-fluid">
    <h1 class="page-title">Productos</h1>

    {{-- 🔹 Filtros --}}
    <div class="row mb-3">
        <div class="col-md-3">
            <select id="filterCategoria" class="form-control" style="max-height: 100px;">
                <option value="">-- Categoría --</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Ropa">Ropa</option>
                {{-- puedes cargar dinámico desde DB --}}
            </select>
        </div>
        <div class="col-md-3">
            <select id="filterMarca" class="form-control" style="max-height: 100px;">
                <option value="">-- Marca --</option>
                <option value="Sony">Sony</option>
                <option value="Samsung">Samsung</option>
                {{-- idem --}}
            </select>
        </div>
    </div>

    {{-- 🔹 Tabla --}}
    <table id="productsTable" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Creado</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    var table = $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('products.data') }}",
            data: function (d) {
                d.categoria = $('#filterCategoria').val();
                d.marca = $('#filterMarca').val();
            }
        },
        pageLength: 15,
        lengthMenu: [15, 25, 50, 100],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'categoria', name: 'categoria' },
            { data: 'marca', name: 'marca' },
            { data: 'nombre', name: 'nombre' },
            { data: 'precio', name: 'precio' },
            { data: 'stock', name: 'stock' },
            { data: 'created_at', name: 'created_at' },
            { data: 'acciones', name: 'acciones', orderable: false, searchable: false }
        ]
    });

    // 🔹 Redibujar cuando cambian filtros
    $('#filterCategoria, #filterMarca').change(function() {
        table.ajax.reload();
    });
});
</script>
@endsection