

   <!-- Products Table -->
   <div class="table-container">
    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Stocks</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Replace this with dynamic data from your backend -->

            @foreach ($pd as $items)
                <tr>
                    <td>{{$items->id}}</td>
                    <td>{{$items->pdname}}</td>
                    <td>{!!$items->description!!}</td>
                    <td>{{$items->category}}</td>
                    <td>{{$items->stocks}}</td>
                    <td>PHP {{number_format($items->price,2,'.',',')}}</td>
                    <td><div style=""><button class="btn" onclick="window.location.href='{{URL('/editProduct?id='.$items->id.'')}}'">Edit</button> <button class="btn" onclick="deleteProduct('{{$items->id}}')">Delete</button> </div></td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
        </tbody>
    </table>
    <div>
        @php
        $mode = request()->query('mode');
        @endphp
        @if($mode === "manageproducts")
        {{ $pd->onEachSide(1)->setPath(route('manageproducts'))->links('pagination::bootstrap-4') }}
        @else
        {{ $pd->onEachSide(1)->setPath(route('searchAdminProduct'))->links('pagination::bootstrap-4') }}
        @endif
      
    </div>
</div>