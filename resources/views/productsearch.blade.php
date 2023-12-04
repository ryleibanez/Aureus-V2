@extends('includes.layout')
@section('title', 'Search Product')

@section('content')

    <!-- All Products -->

    <div class="small-container">
        <div class="row row-2">
            <h2>Search Product</h2>

        </div>

        <div class="row1">
            @foreach ($pd as $items)
                <div class="col-4">
                    <a href="{{ url('/viewproduct?id=' . $items->id) }}"><img src="{{ $items->image }}"></a>
                    <h4>{{ $items->pdname }}</h4>
                    <h5>{{ $items->category }}</h5>

                    <p>PHP {{ number_format($items->price, 2, '.', ',') }}</p>
                    @if ($items->stocks <= 0)
                        <p style="color: red">Out of Stock</p>
                    @endif
                </div>
            @endforeach



        </div>

        <div>
            {{ $pd->links() }}
        </div>


    </div>

    <!-- javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accountDropdown = document.getElementById('accountDropdown');
            const accountDropdownMenu = accountDropdown.nextElementSibling;

            // Function to open the dropdown
            function openDropdown() {
                accountDropdownMenu.classList.add('show');
            }

            // Function to close the dropdown
            function closeDropdown() {
                accountDropdownMenu.classList.remove('show');
            }

            // Click event listener
            accountDropdown.addEventListener('click', function(e) {
                e.preventDefault();
                if (accountDropdownMenu.classList.contains('show')) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            });

            // Hover event listeners
            accountDropdown.addEventListener('mouseenter', openDropdown);
            accountDropdownMenu.addEventListener('mouseleave', closeDropdown);

            // Close the dropdown if clicked outside
            document.addEventListener('click', function(e) {
                if (!accountDropdownMenu.contains(e.target) && !accountDropdown.contains(e.target)) {
                    closeDropdown();
                }
            });
        });
    </script>

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "300px"
            } else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
    <script>
        function openSearchOverlay() {
            document.getElementById("searchOverlay").style.display = "flex";
        }

        function closeSearchOverlay() {
            document.getElementById("searchOverlay").style.display = "none";
        }
    </script>
@endsection
