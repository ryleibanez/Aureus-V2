<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

    
        
        <!-- Forgot-Security Question  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content" style=" display: flex;
                justify-content: center;
                align-items: center;
               ">
                   
    
                    <div class="signin-form" style="">
                        <h2 class="form-title">Security Question</h2>
                        <h3 class="form-title">{{$securityQuestion}}?</h3>
                        <form method="POST" class="register-form" id="login-form" action="{{route('answerverify')}}">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="answer" id="your_name" placeholder="Answer" required/>
                            </div>
                            @if(session()->has('error'))
                                <span style="color:red; text-align: center;">{{session('error')}}</span>
                            @endif
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Submit"/>
                            </div>
                            <a href="{{route('signin')}}" class="signup-image-link">Return to signin</a>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>
    
  
    
    



        


    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>