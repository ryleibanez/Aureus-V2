@foreach ($orders->groupBy('transactionid') as $transactionid => $items)
    @php
        $user = \App\Models\User::where('email', $items[0]->email)->first();
        $count = 1;

    @endphp

    <!-- Replace this with dynamic data from your backend -->
    <tr>

        @foreach ($items as $order)
            @php
                $date = new DateTime($order->created_at);
                $formattedDate = $date->format('MMMM-dd-yyyy');
            @endphp
    <tr>
        <td>{{ $transactionid }}</td>
        <td>{{ $user->fname }} {{ $user->lname }}</td>
        <td>{{ $order->created_at }}

        </td>
        <td>{{ $user->address }}

        </td>
        <td>{{ $order->pdname }}</td>
        <td>{{ $order->quantity }}</td>

        <td>PHP {{ number_format($order->totalprice, 2, '.', ',') }}</td>
        <td>{{ $order->orderstatus }}</td>
        <td>{{ $order->modeofpayment }}</td>
        <td>{{ $order->deliverydate }}</td>
        <td>PHP {{ number_format($order->deliveryfee, 2, '.', ',') }}</td>
        <td>
            @if ($count === 1)
                @if ($order->orderstatus === 'Pending')
                    <div style="display: inline-block">

                        <button class="btn" onclick="cancelOrder({{ $order->transactionid }})">Cancel</button> <button
                            class="btn" onclick="openPopup({{ $order->transactionid }})">Set Delivery Fee</button>
                    </div>
                @endif
                @if ($order->orderstatus === 'Processing' && $order->deliverydate === '')
                    <button class="btn" onclick="openPopup1({{ $order->transactionid }})">Set Delivery Date</button>
                @endif

                @if ($order->orderstatus === 'Processing' && $order->deliverydate !== '')
                    <button class="btn" onclick="shipped('{{ $order->transactionid }}')">Shipped</button>
                @endif

                @if ($order->orderstatus === 'Shipped')
                    <button class="btn" onclick="delivered('{{ $order->transactionid }}')">Delivered</button>
                @endif
                @php $count = 0; @endphp
            @endif
        </td>
    </tr>
@endforeach
</tr>

<!-- Add more rows as needed -->
@endforeach
