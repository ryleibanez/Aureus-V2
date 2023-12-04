@extends('includes.layout')
@section('title', 'Categories')

@section('content')
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        margin-top: 0;
    }


    .footer {
        padding: 20px;
        text-align: center;
    }
</style>

<!-- Feadtued Categories -->
<div class="small-container">
<div class="categories">
    
        <h2 class="title">Categories</h2>
        <div class="row1">

            <div class="col-4">

                <a href="{{ url('/categoryProduct?search=Men') }}">
                    <img src="images/men.png">
                </a>

            </div>

            <div class="col-4">
                <a href="{{ url('categoryProduct?search=Women') }}">
                    <img src="images/women.png">
                </a>
            </div>
            <div class="col-4">
                <a href="{{ url('categoryProduct?search=Unisex') }}">
                    <img src="images/unisex.png">
                </a>
            </div>
        </div>
    </div>
</div>


<!-- javascript -->

<!-- javascript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
        accountDropdown.addEventListener('click', function (e) {
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
        document.addEventListener('click', function (e) {
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