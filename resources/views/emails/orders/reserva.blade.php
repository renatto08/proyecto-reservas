@component('mail::message')
![][logo]
[logo]: {{url(Storage::url($order->shop->logo))}} "{{$order->shop->name}}"

# Estimado administrador de la tienda {{$order->shop->name}},

Se ha generado la reserva Nro: {{'#'.$order->serie}} a nombre de {{$order->client->full_name}} con fecha {{$order->created_at->format('d/m/Y')}}.

@component('mail::button', ['url' => route('orders.show',['order'=>$order->id])])
Ver Reserva
@endcomponent

@component('mail::promotion.button', ['url' => route('orders.print',['order'=>$order->id])])
    Imprimir Reserva
@endcomponent

Gracias,<br>
El equipo de {{$order->shop->name}}
@endcomponent
