<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aureus | HOME OF LUXURY PERFUMES</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .search-container {
        display: flex;
        align-items: center;
    }
    
    .search-container input[type="text"] {
        padding: 10px;
        border: none;
        border-radius: 5px 0 0 5px;
    }
    
    .search-container button {
        border: none;
        background-color: #f77f00;
        color: #fff;
        padding: 10px 15px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }
    .dropdown {
    position: relative;
}

.dropdown-toggle::after {
    content: '\f0d7'; /* Angle down icon (Font Awesome) */
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-left: 5px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.show {
    display: block;
}
.navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
       
        display: flex;
        align-items: center;
       
        z-index: 1000;
    }

    .logo img {
        width: 125px;
        height: auto;
    }

    .menu-icon {
        cursor: pointer;
    }

  

    .search-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        align-items: center;
        justify-content: center;
        z-index: 1001;
    }

    .search-box {
        position: relative;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
    }

    .search-icon {
        margin-right: 10px;
        font-size: 20px;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    .search-box input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

 

    .cart-icon {
        position: relative;
        display: inline-block;
    }

    .cart-icon img {
        width: 30px;
        height: 30px;
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #bd9a35;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        text-align: center;
        line-height: 20px;
    }
</style>

</head>

<body>
    
    <div class="header">
        <div class="container1">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/main-logo/header-logo.png" alt="logo" style="width: 150px !important;"></a>
                </div>
                
                <nav>
                    <ul id="MenuItems">
                        <li><a href="admin-home.html">Home</a></li>
                        <li><a href="manageproducts.html">Manage Products</a></li>
                        <li><a href="manageorders.html">Manage Orders</a></li> 
                        <li><a href="admin-profile.html">Profile</a></li>                  
                        <li>
                            <a href="admin-login.html"  >Login</a>
                         
                        </li>
                    </ul>
                </nav>
                
                <div class="search-icon" onclick="openSearchOverlay()">
                    <a href="#">
                    <i class="fas fa-search search-icon"></i>
                </a>
                </div>
                
                <div class="search-overlay" id="searchOverlay" onclick="closeSearchOverlay()">
                   <form method="get" action="productsearch.html">
                    <div class="search-box" onclick="event.stopPropagation();">
                        
                        <input type="text" placeholder="Search..." name="search">
                        &nbsp;<i class="fas fa-search search-icon"></i>
                    </div>
                </form>
                </div>
                
               
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row1">
                <div class="col-2">
                    <h1>Welcome Administrator</h1>
                    <p>
                    </p>
                  
                   
                </div>
                
                <div class="col-2">
                    <img src="images/perfumehome.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Feadtued Categories -->

  

    <!-- Featured Products -->

    

    


    

 <!-- Footer -->
 <div class="footer">
    <div class="container1">
        <div class="row1">
           
            <div class="footer-col-2">
                <img src="images/main-logo/header-logo.png">
                
            </div>
            
            
        </div>
        <hr>
        <p class="copyright">Copyright 2023 - Group 1 - 4ITD</p>
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
            }
            else {
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
</body>

</html>