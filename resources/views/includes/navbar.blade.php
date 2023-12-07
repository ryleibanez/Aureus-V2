{{-- <style>
    body,
    html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .u-s-p-b-60 {
        min-height: 64%;
        display: flex;
        flex-direction: column;
    }
</style> --}}

<link rel="stylesheet" href="{{ asset('style.css') }}"> 
<nav >
    
    <ul id="MenuItems">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/products') }}">Products</a></li>
        <li><a href="{{ url('/categories') }}">Categories</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/account') }}">My Account</a></li>
    </ul>
    <div class="search-icon" onclick="openSearchOverlay()">
        <i class="fas fa-search"></i>
    </div>
</nav>



