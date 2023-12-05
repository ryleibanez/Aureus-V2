@extends('includes.layout')
@section('title', 'Add an Address')
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
        /* Optional: Hide horizontal scrollbar */
    }

    .u-s-p-b-60 {
        min-height: 64%;
        display: flex;
        flex-direction: column;
    }
</style>
@section('content')
    
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
                                    ADD A ADDRESS
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
                                  
                                    <form class="l-f-o__form" method="POST" id="myForm">
                                        @csrf
                                        <div class="gl-s-api">


                                        </div>
                                        
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-fname">Address *</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="reg-fname" name = "address" required/>
                                        </div>



                                        

                                       
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password">Country *</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="reg-password" name="country1" value="Philippines" disabled/>
                                                
                                                <input class="input-text input-text--primary-style" type="hidden"
                                                id="reg-password" name="country" value="Philippines" required/> 
                                        </div>
                                      
                                        <div class="u-s-m-b-15">
                                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                                            
                                           
                                        </div>

                                        <a class="gl-link" href="{{route('myaddress')}}">Return to My Address</a>
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
      
        fetch('/addAddressPost', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                var dataUser = data.status;
                
               
                if (dataUser == 'success') {


                    window.location.replace('/myaddress');
                    

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
