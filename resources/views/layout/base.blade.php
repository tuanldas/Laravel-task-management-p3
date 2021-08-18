<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/update.css') }}">
    <!--===============================================================================================-->
</head>
<body>

<div class="bg-container-contact100" style="background-image: url({{  URL::asset('svg/bg-01.jpg') }});">
    <div class="contact100-header flex-sb-m">
    </div>
</div>
</div>

<div class="container-contact100">
    <div class="wrap-contact100">
        <button class="btn-hide-contact100">
            <i class="zmdi zmdi-close"></i>
        </button>

        <div class="contact100-form-title" style="background-image: url({{  URL::asset('svg/bg-02.jpg') }});">
            <span>@yield('namePage')</span>
        </div>

        @yield('form')
        {{ csrf_field() }}
        <div class="wrap-input100 validate-input">
            <input id="name" class="input100" type="text" name="name"
                   value="{{ isset($task->name) ? $task->name : '' }}" placeholder="name">
            <span class="focus-input100"></span>
            <label class="label-input100" for="name">
                    <span class="lnr lnr-user m-b-2"></span>
            </label>

            @if ($errors->any())
                <li>{{ $errors->first('name') }}</li>
            @endif
        </div>


        <div class="wrap-input100 validate-input">
            <input id="email" class="input100" type="text" name="email"
                   value="{{ isset($task->email) ? $task->email : '' }}" placeholder="Eg. example@email.com">
            <span class="focus-input100"></span>
            <label class="label-input100" for="email">
                <span class="lnr lnr-envelope m-b-5"></span>
            </label>
            @if ($errors->any())
                <li>{{ $errors->first('email') }}</li>
            @endif
        </div>


        <div class="wrap-input100 validate-input">
            <input id="phone" class="input100" type="text" name="phone"
                   value="{{ isset($task->phone) ? $task->phone : '' }}" placeholder="Eg. +1 800 000000">
            <span class="focus-input100"></span>
            <label class="label-input100" for="phone">
                <span class="lnr lnr-smartphone m-b-2"></span>
            </label>
            @if ($errors->any())
                <li>{{ $errors->first('phone') }}</li>
            @endif
        </div>

        @yield('value')
        </form>
    </div>
</div>


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
