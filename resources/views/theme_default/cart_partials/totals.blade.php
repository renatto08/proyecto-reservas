<table class="cart-totals__table">
    <thead>
    <tr>
        <th>Subtotal</th>
        <td>S/.{{number_format($sub_total,2)}}</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Descuentos</th>
        <td>-S/.{{number_format($descuento,2)}}</td>
    </tr>
    <tr>
        <th>Envio</th>
        @if($envio)
            <td>S/.{{number_format($envio->price,2)}}</td>
        @else
            <td>Free</td>
        @endif
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th>Total</th>
        <td>S/.{{number_format($total,2)}}</td>
    </tr>
    </tfoot>
</table>
<form action="{{route('shop.checkout_post',['code'=>$shop->code])}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="sub_total" value="{{$sub_total}}">
    @if($coupon)
        <input type="hidden" name="coupon" value="{{$coupon->id}}">
        <input type="hidden" name="descuento" value="{{$descuento}}">
    @endif
    @if($envio)
        <input type="hidden" name="envio_address" value="{{$envio->name}}">
        <input type="hidden" name="envio" value="{{$envio->price}}">
    @endif
    <input type="hidden" name="total" value="{{$total}}">
    <button type="submit" class="btn btn-primary btn-lg cart-totals__button">Pasar a Caja</button>
</form>