@component('mail::message')
![][logo]
[logo]: {{url(Storage::url($order->shop->logo))}} "{{$order->shop->name}}"

# Hola {{$order->client->full_name}},

Gracias por preferir {{$order->shop->name}}. Tu pedido ha sido registrado correctamente, lo estaremos atendiendo lo más pronto posible.

## Número de pedido: {{"#".$order->serie}} generado el {{$order->created_at->format('d/m/Y')}}

Tiempo de entrega:

* Envío a domicilio: 2 días hábiles (disponible en Lima Metropolitana)
* Provincias:  2 días hábiles (vía agencia de transportes)
* Recojo en oficina: 1 días hábil.

Si tienes alguna consulta con respecto a tu pedido, comunícate con nosotros a número  {{$order->shop->phone}} ó al correo ventas{{$order->shop->email}}



@component('mail::button', ['url' => route('shop.home',['code'=>$order->shop->code])])
Visitar tienda
@endcomponent

Gracias,<br>
El equipo de {{$order->shop->name}}
@endcomponent
