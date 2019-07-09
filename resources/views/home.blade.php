<!doctype html>
{{-- <html lang="en"> --}}
<html lang="{{ app()->getLocale() }}">

@foreach($content as $one)
    <?php  $xcomcontent[$one->category] = $one->content  ?>
@endforeach

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $xcomcontent['Description']}}">
    <meta name="keywords" content="{{ $xcomcontent['Keyword']}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>XCOM</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>  
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="xcomstyle.css?ver={{date('YmdHis')}}">

   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143204356-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-143204356-1');
</script>
</head>

<style>
     #about {
        position: relative;
        text-align: center;
        color: white;
        background-image: url(<?php echo $xcomcontent['AboutBackgroundImage'] ?>);
        width:100%;
        background-size: 100% 100%;
        height:300px;
        margin: 150px 0 50px 0;
        }
    .hero-image {
        background-image: linear-gradient(90deg, rgba(32, 53, 32, 1) 0%, rgba(32, 53, 32, 0.5) 50%, rgba(255, 255, 255, 0.5) 100%), url(<?php echo $xcomcontent['HeroBackgroundImage'] ?>);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
       
        }
</style>
<body>
    <nav class="navbar ">
        <div class="container align-center">
            <div class="row">
                <div class=" col-md-6  my-5">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href={{$xcomcontent['LogoImageUrl']}}><img src='<?php echo $xcomcontent['LogoImage'] ?>'  alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#ourServices">SERVICE</a></li>
                        <li><a href="#about">ABOUT</a></li>
                        <li><a href="#contactform">CONTACT</a></li>
                        <li style="color:#2c5e2e; padding: 13px 0 0 30px;">
                            <img src='<?php echo $xcomcontent['PhoneIconImage'] ?>' />&nbsp; &nbsp; {{ $xcomcontent['PhoneNumber']}}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <div class="hero-image">

        <div class="hero-text align-center">
            <div class="container">
                <h1>{{ $xcomcontent['HeroTitle'] }}</h1>
                <p style="padding: 30px 0 40px 0; font-size:18px;">{{ $xcomcontent['HeroContents']}}</p>
                <a type="button" class="startBtnStyle" href={{$xcomcontent['HeroButtonUrl']}}>{{$xcomcontent['HeroButton']}}</a>

            </div>
        </div>
    </div>

    <div class="services-header text-center" id="ourServices">
        <h3 style="font-size: 24px; color:#212121; ">{{ $xcomcontent['ServiceTitle'] }}</h3>
        <div class="line" style="padding-top:15px"></div>
    </div>

    <div class="container" id="serviceDetails">
        <div class="row">
            <div class="col-md-3 ">
                <div style=" max-height:300px; margin: 0 5px ">
                    <h1 class="my-0 font-weight-normal">01</h1>
                    <h4>{{ $xcomcontent['01Title']}}</h4>
                    <p>{{ $xcomcontent['01Description']}}</p>
                </div>
            </div>
            <div class="col-md-3 ">
                <div style="max-height:300px; margin: 5px ">
                    <h1 class="my-0 font-weight-normal">02</h1>
                    <h4>{{ $xcomcontent['02Title']}}</h4>
                    <p>{{ $xcomcontent['02Description']}}</p>

                </div>
            </div>
            <div class="col-md-3 ">
                <div style="max-height:300px; margin: 5px ">
                    <h1 class="my-0 font-weight-normal ">03</h1>

                    <h4>{{ $xcomcontent['03Title']}}</h4>
                    <p>{{ $xcomcontent['03Description']}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div style="max-height:300px; margin:5px;">
                    <h1 class="my-0 font-weight-normal">04</h1>
                    <h4>{{ $xcomcontent['04Title']}}</h4>
                    <p>{{ $xcomcontent['04Description']}}</p>

                </div>
            </div>

        </div>
    </div>

    <div id="about">
        <p class="centered">{{ $xcomcontent['AboutDescription']}}</p>
    </div>

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <form id="contactform" class="container text-center"  action="{{ route('send-email') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 40px;">
                <h4 style="margin: 30px 0; font-size:24px;">Contact Us</h4>
                <div class="line"></div>
            </div>

            <div class="col-md-12">     
            <div class="col-md-6 inputstyle">
                
                <input type="text" class="form-control" name="firstname" placeholder="* First name">
                <span id="firstnameerror" class="errormsg"></span>
            </div>
            <div class="col-md-6 inputstyle">
                
                <input type="text" class="form-control" name="lastname" placeholder="* Last name">
                <span id="lastnameerror" class="errormsg"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 inputstyle">
            
                <input type="email" class="form-control"  name="email" placeholder="* Email">
                <span id="emailerror" class="errormsg"></span>
            </div>
            <div class="col-md-6 inputstyle">
                <input type="number" class="form-control" name="phonenumber" placeholder="Phone" height="50px">
            </div>
        </div>
            <div class="col-md-12 inputstyle">
                <textarea type="text" class="form-control" name="message" placeholder="Message"
                    style="margin-bottom:20px; margin:0 auto; width:94%" rows="6"></textarea>
            </div>
            <div class="col-md-12" style="margin-left:15px;">
                {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{$errors->first('g-captcha-response')}}</strong>
                    </span>
                @endif --}}
                {!! app('captcha')->display(['email' => 'email',
                                             'firstname' => 'firstname',
                                             'lastname' => 'lastname']) !!}
            </div>
            <div class="col-md-12 inputstyle">
                <button type="submit" id="sendBtn" name="send" class="btn btn-outline-primary" >Send Message</button>
            </div>
        </div>
    </form>
    <footer class="container-fluid py-4" style=" background: #153f17; margin-top:50px; padding:20px; color:#FFF">
        <div class="row ">
            <div class="col-md-4 text-center" style="padding: 20px 0 10px 0">

                <nav>
                    <a style="color:white; margin:5px 30px; font-size:15px;" href="#ourServices">SERVICES</a>
                    <a style="color:white; margin:5px; font-size:15px;" href="#about">ABOUT</a>
                    <a style="color:white; margin:30px; font-size:15px;" href="#contactform">CONTACT</a>
                </nav>
            </div>
            <div class="col-md-4 text-center" style="padding: 10px 0;">
                <a href={{$xcomcontent['FooterLogoImageUrl']}}>
                    <img src='<?php echo $xcomcontent['FooterLogoImage'] ?>' alt="footerlogoimg" />
                </a>
            </div>
            <div class="col-md-4 text-center">
                <p style="font-size:14px; padding: 25px 0 10px 0;">{{ $xcomcontent['Copyright']}}</p>
            </div>

        </div>
    </footer>
    <script>
            
            $('#contactform').on('submit', function(e){
                e.preventDefault();
                $('#sendBtn').attr("disabled", true)
                data= $(this).serialize();
                url=$(this).attr('action');
                $.ajax({
                    url: url,
                    type:'POST',
                    data:data,
                    success:function(data){
                       
                        if($.isEmptyObject(data.error)){
                           goToSuccessPage()
                        }else{
                            printMessageErrors(data.error)
                        }
                    }
                })
            });
            function printMessageErrors(msg){
                $('#sendBtn').removeAttr("disabled");
                $('.print-error-msg').find('ul').empty();
                $('.print-error-msg').css('display', 'block');
                $.each(msg, function(key, value){
                    $('.print-error-msg').find('ul').append("<li>"+ value + "</li>")
                })
            }
            function goToSuccessPage(){
                let url = "{{route('thankyou')}}";
                $(location).attr('href',url);
            }
        </script>
</body>

</html>