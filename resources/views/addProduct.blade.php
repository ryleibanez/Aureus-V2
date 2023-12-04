@extends('includes.adminlayout')
@section('title', 'Add a Product')
    
@section('content')
    
<!-- Initialize TinyMCE -->
<script>
    tinymce.init({
        selector: 'textarea',
        height: 300, // Adjust the height as needed
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic underline | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        menubar: 'file edit view insert format tools table help',
    });

    function getEditorContent() {
            var content = tinymce.get('text-area').getContent();
            document.getElementById('description-input').value = content;
        }
</script>
<!--====== Main App ======-->
<div id="app">


    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
            <!--====== Section Content ======-->

        </div>
        <!--====== End - Section 1 ======-->

        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">
                                    ADD A PRODUCT
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                  
                                    <form class="l-f-o__form" method="POST" id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="gl-s-api">


                                        </div>
                                        <div>
                                            <input type="file" name="image[]" value="Upload Image"
                                                accept="image/jpeg,image/png" multiple required>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-fname">PRODUCT NAME *</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="reg-fname" name = "pdname" required/>
                                        </div>



                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="gender">CATEGORY</label><select
                                                class="select-box select-box--primary-style u-w-100" id="gender" name="category"
                                                required>
                                              
                                                <option value="Men" selected>Male</option>
                                                <option value="Women">Women</option>
                                                <option value="Unisex">Unisex</option>
                                                <option value="Brands">Brands</option>
                                            </select>
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-email">STOCKS *</label>

                                            <input class="input-text input-text--primary-style" type="number"
                                                id="reg-email" name="stocks" required/>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password">PRICE *</label>

                                            <input class="input-text input-text--primary-style" id="productPrice" type="text"
                                                 name="price" required/>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password">DESCRIPTION *</label>

                                            <textarea class="input-text input-text--primary-style" name="descripstion" id="text-area" cols="30" rows="10"></textarea>
                                            <input type="hidden" id="description-input" name="description">
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <button type="button" style="display: none;" id="get-content" onclick="getEditorContent()">Get Content</button>
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">
                                                CREATE
                                            </button>
                                        </div>

                                        <a class="gl-link" href="{{route('manageproducts')}}">Return to Manage Products</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->

   
</div>
<!--====== End - Main App ======-->

<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
<script>
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        document.getElementById('get-content').click();
        fetch('/createProduct', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var dataUser = data.status;
                
               
                if (dataUser == 'success') {


                    window.location.replace('/manageproducts');
                    

                } else {
                    Toastify({
                        text: dataUser,
                        duration: 3000,


                        close: true,
                        gravity: "bottom", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "red",
                        }
                    }).showToast();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
<script>

document.getElementById("productPrice").addEventListener("input", function () {
    // Allow only digits, a single dot, and ensure it doesn't go below 1
    this.value = this.value.replace(/[^0-9.]/g, ''); // Allow only digits and a single dot
    this.value = this.value.replace(/(\..*)\./g, '$1'); // Remove extra dots
    if (parseFloat(this.value) < 1) {
      this.value = '1'; // Set to 1 if it's less than 1
    }
  });

    window.ga = function() {
        ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date();
    ga("create", "UA-XXXXX-Y", "auto");
    ga("send", "pageview");
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">
                            JavaScript is disabled in your browser.
                        </h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a
                            JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>
@endsection
