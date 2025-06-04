<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura Electrónica</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 30px;
        }
        .header, .footer {
            /* text-align: center; */
            margin-bottom: 20px;
        }
        .company-info, .client-info {
            width: 100%;
            margin-bottom: 30px;
        }
        .company-info td, .client-info td {
            vertical-align: top;
        }
        .invoice-details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .invoice-details th, .invoice-details td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .totals {
            float: right;
            width: 40%;
            border-collapse: collapse;
        }
        .totals th, .totals td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: right;
        }
        .izquierda {
            float: left;
        }
        .contenedor {
        width: 300px; /* Ajusta el ancho según tus necesidades */
        float: right; /* Mueve el div a la derecha */
        }
        .contenido {
        text-align: left; /* Alinear el texto a la izquierda dentro del div */
        }
        .inferior {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img width="300" class="izquirda" src="{{public_path('img/logo-factura.png')}}" alt="">
        <div class="contenedor">
            <div class="contenido">
                <span>Computadoras - Impresoras - Laptops</span>
                <br>
                <span>Servicio Técnico Garantizado</span>
                <br>
                <span>RUC: 20614007584</span>
                <br>
                <h4>Pedido PPP1-{{ $orden->id }}</h4>
            </div>
        </div>        
    </div>
    <br>
    <table class="company-info">
        <tr>
            <td>
                <strong>Cliente:</strong><br>
                {{ $nombre . $apellidos . $empresa}}<br>
                <strong>Dirección:</strong><br>
                {{ $direccion }}<br>
                @if($ruc != "")
                RUC: {{$ruc}}
                @endif
            </td>
        </tr>
    </table>

    <table class="invoice-details">
        <thead>
            <tr style="background-color: rgb(164, 206, 58);">
                <th>CANT.</th>
                <th style="text-align: center;">PRODUCTO</th>
                <th style="width: 80px;">P. UN.</th>
                <th style="width: 80px;">PRECIO</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Cart::content() as $item)
            <tr>
                <td>{{ $item->qty }}</td>
                <td>
                    <span style="font-family: 10px !important;">{{ $item->name }}</span>
                </td>
                <td>
                    <span style="font-family: 10px !important;">S/ {{ number_format($item->price, 2) }}</span>
                </td>
                <td>
                    <span style="font-family: 10px !important;">S/ {{ number_format($item->price * $item->qty, 2) }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="totals">
        <tr style="background-color: rgb(108, 117, 125); margin-top: 2px; margin-bottom: 2px; padding: 2px;">
            <th style="float: left; color: white !important;">
                Subtotal
            </th>
            <th style="float: right; color: white !important;">
                S/ {{ number_format(Cart::subtotal()/1.18, 2) }}
            </th>
        </tr>
        <tr style="background-color: rgb(108, 117, 125); margin-top: 2px; margin-bottom: 2px; padding: 2px;">
            <th style="float: left; color: white !important;">
                IGV (18%)
            </th>
            <th style="float: right; color: white !important;">
                S/ {{ number_format(Cart::subtotal() - Cart::subtotal()/1.18, 2) }}
            </th>
        </tr>
        <tr style="background-color: rgb(164, 206, 58); margin-top: 2px; margin-bottom: 2px; padding: 2px;">
            <th style="float: left; color: #333 !important;">
                Total
            </th>
            <th style="float: left; color: white !important;">
                S/ {{ number_format(Cart::subtotal(), 2) }}
            </th>
        </tr>
    </table>

    <div class="footer" style="padding-right: 15px;">
        <p style="text-align: justify !important;">Sin otro particular, estamos a su disposición para ampliar la información que estime conveniente y quedamos a la espera de sus noticias.</p>
    </div>

    <div class="inferior" style="display: flex;align-items: center;">
        <img style="float: left;" width="100" src="{{public_path('img/caja-piura.png')}}" alt="">
        <div>
            <span style="color: rgb(164, 206, 58);">SOS PORTÁTILES E.I.R.</span>
            <br>
            <span>SOLES: 435 - 71 - 36192085</span>
            <br>
            <span>AHORROS: 00243500713619208564</span>
        </div>        
    </div>
</body>
</html>
