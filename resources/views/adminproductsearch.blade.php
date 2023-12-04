@extends('includes.adminlayout')
@section('title', 'Manage Products')

@section('content')


    <!-- Search Bar -->

    <div class="search-container">
        <input type="text" placeholder="Search Products" id="search">
        <button class="btn" onclick="searchNow();">Search</button>
        <button class="btn add-product-btn" onclick="window.location.href='{{ route('addProduct') }}'">Add Product</button>
    </div>


    {{-- <!-- Products Table -->
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
                        <td>{{$items->description}}</td>
                        <td>{{$items->category}}</td>
                        <td>{{$items->stocks}}</td>
                        <td>PHP {{number_format($items->price,2,'.',',')}}</td>
                        <td><button class="btn">Edit</button> <button class="btn">Delete</button></td>
                    </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
            </tbody>
        </table>
        <div>
            {{$pd->links()}}
        </div>
    </div> --}}
    {{-- @include('includes.products') --}}
    <div class="div" id="products">

    </div>
    @php
        $page = request()->query('page');
        $search = request()->query('search');
    @endphp
    <script>
        function search() {
            var search = document.getElementById('search').value;
            var link = "/searchProducts?search=" + search;
            window.location.href= link;
        }


        function deleteProduct(id) {
            fetch('/deleteProduct?id=' + id)
                .then(response => response.json())
                .then(data => {

                    var check = data.status;

                    if (check === "success") {
                        Toastify({
                            text: "Product Has Been Removed Successfully!",
                            duration: 3000,


                            close: true,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                    } else {
                       
                    }


                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }

        function checkForUpdate() {
            var page = "{{ $page }}";
            var search = "{{ $search }}";
            var link = "/searchAdminProduct?page=" + page + "&search=" + search + "&mode=search";
            fetch(link)
                .then(response => response.text())
                .then(data => {
                    console.log('Received data:', data);

                    document.getElementById('products').innerHTML = data;


                })
                .catch(error => {
                    console.error('Error fetching cart count:', error);
                });
        }




        checkForUpdate();
        setInterval(checkForUpdate, 2000);
    </script>
@endsection
