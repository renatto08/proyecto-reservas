@component('mail::message')
![][logo]
[logo]: {{url(Storage::url($user->client->shop->logo))}} "{{$user->client->shop->name}}"

# Hola {{$user->client->full_name}}

Gracias por Unirte a nuestra marca {{$user->client->shop->name}}. Aquí podrás encontrar novedades sobre las últimas tendencias en prendas.
Para poder activar tu cuenta, por favor, selecciona el enlace que se muestra a continuación.

Se recomienda cambiarla cuando se inicie sesión por primera vez.
@component('mail::button', ['url' => $url])
Verificar cuenta
@endcomponent

Gracias,<br>
El equipo {{$user->client->shop->name}}
@endcomponent
