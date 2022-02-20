<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$title}}</title>

        <style>
            body{
                font-family: courier, monospace;
            }
            .page-break {
                page-break-after: always;
            }
            .title{
                text-align: center;
                background-color: #0a0a0a;
                color: #ffffff;
                margin: 0;
                padding: .5em 1em;
                font-size: 2em;
                border-bottom: 1px solid #ffffff;

            }
            .sub-title{
                display: block;
                text-align: center;
                color: #ffffff;
                background-color: #000000;
            }
            .cabecera{
                border: 1px solid #333333;
                width: 100%;
            }

            .detalle{
                border: 1px solid #333333;
                width: 100%;
            }
            .detalle th{
                background-color: #000000;
                color: #ffffff;
                text-align: center;
            }
            tr.center > td{
                text-align: center;
            }
            .text-right{
                text-align: right;
            }

            .text-left{
                text-align: left;
            }
            .text-center{
                text-align: center;
            }

            .tr-total{
                background-color: #000000;
                color: #ffffff;
                text-align: center;
                text-transform: uppercase;
                font-size: .8em;
            }

        </style>
    </head>
    <body>
        <h2 class="title">{{$order->shop->name}}</h2>
        <small class="sub-title">DETALLE DE {{strtoupper($order->status)}}</small>
        <hr>
        <table class="cabecera">
            <tr>
                <th>Orden: </th>
                <td>#{{$order->serie}}</td>
                <th>Cliente: </th>
                <td>{{$order->client->full_name}}</td>
            </tr>
            <tr>
                <th>Fecha: </th>
                <td>{{$order->created_at}}</td>
                <th>Campaña: </th>
                <td>{{$order->campaign->name}}</td>
            </tr>
            <tr>
                <th>Estado: </th>
                <td>{{$order->status}}</td>
                <th>Medio de pago: </th>
                <td>{{ strtolower($order->status)==='reserva' ? 'POR CONFIRMAR' : $order->payment}}</td>
            </tr>
            <tr>
                <th>Envio: </th>
                <td>{{$order->flete_address}}</td>
                <th>Direccion: </th>
                <td>{{$order->flete_address_text}}</td>
            </tr>
            <tr>
                <th>Email: </th>
                <td>{{$order->client->user->email}}</td>
                <th>Telefono: </th>
                <td>{{$order->client->phone}}</td>
            </tr>
            <tr>
                <th>DNI: </th>
                <td>{{$order->client->code}}</td>
            </tr>
        </table>

        <hr>
        <table class="detalle">
            <tr class="center">
                <th>SKU</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            <?php $total = 0;?>
            @foreach($order->detalle as $item)
            <?php $total += $item->q;?>
            <tr>
                <td>{{$item->attribute->sku}}</td>
                <td>{{$item->price_sale > 0 ? '(*)' : ''}}{{$item->product->title}} / {{$item->attribute->full_desc}}</td>
                <td class="text-center">{{($item->price_sale>0 ? $item->price_sale : $item->price)}}</td>
                <td class="text-center">{{$item->q}}</td>
                @if($item->gift)
                <td class="text-right">GRATIS</td>
                @else
                <td class="text-right">{{number_format($item->q * ($item->price_sale>0 ? $item->price_sale : $item->price),2)}}</td>
                @endif
            </tr>
            @endforeach
            <tr class="tr-total">
                <td colspan="5">importes y descuentos</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">SubTotal</td>
                <td colspan="1" class="text-right">{{number_format($order->sub_total,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">SubTotal Oferta</td>
                <td colspan="1" class="text-right">{{number_format($order->sub_total_offer,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">Descuento @if($order->discount_model) @if($order->discount_model->type=='Monto')S/.{{$order->discount_model->value}}@else{{$order->discount_model->value*100}}% @endif @endif
                </td>
                <td colspan="1" class="text-right">-{{number_format($order->amount_discount,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">Descuento Oferta @if($order->discount_offer_model) @if($order->discount_offer_model->type=='Monto')S/.{{$order->discount_offer_model->value}}@else{{$order->discount_offer_model->value*100}}% @endif @endif</td>
                <td colspan="1" class="text-right">-{{number_format($order->amount_discount_offer,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">Descuento Adicional</td>
                <td colspan="1" class="text-right">-{{number_format($order->amount_discount_aditional,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right">Costo de envio</td>
                <td colspan="1" class="text-right">{{number_format($order->flete,2)}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" class="text-right"><strong style="font-size: 1.2em;">Total</strong></td>
                <td colspan="1" class="text-right"><span style="font-size: 1.5em;">S/.{{number_format($order->total,2)}}</span></td>
            </tr>
        </table>

        @if(strlen($order->description)>0)
        <br>
        <p>Comentario adicional : {{$order->description}}</p>
        @endif
        <br>
        <p>Cantidad de items <strong>({{$total}})</strong>, el documento ha sido generado por <strong>{{$order->user->name}}</strong>.</p>
    </body>
</html>