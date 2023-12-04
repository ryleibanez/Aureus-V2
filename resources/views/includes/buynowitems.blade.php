
@php

    $checkOrder = \App\Models\Order::where('orderstatus', '=', 'buynow')
    ->where('email', '=', auth()->user()->email)->get();
@endphp

@foreach ($checkOrder as $item)
                {{$stocks = $item->stocks}}
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="img/1.png">
                            <div>
                                <p id="price">{{ $item->pdname }}</p>
                                <small>Price: PHP {{ number_format($item->price, 2, '.', ',') }}</small>
                                <br>
                                <a href="">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" value="{{ $item->quantity }}" id="quantity" name="quantity"
                            oninput="changeValues('{{ $item->price }}','{{ $stocks }}', '{{$item->id}}')"></td>
                    <td>PHP {{ number_format($item->price, 2, '.', ',') }}</td>
                </tr>
@endforeach