<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('ustora/')}}/style.css">
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href=""><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        <li><a href=""><i class="fa fa-folder"></i>Categories</a></li>
                        @auth()
                            <li><a href="{{route('login')}}"><i class="fa fa-sign-out "></i> Logout</a></li>
                        @else
                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
                        @endauth
                        <li><a href="{{route('admin')}}"><i class="fa fa-folder-open"></i>Admin panel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{asset('ustora/')}}/.."><img src="{{asset('ustora/')}}/img/logo.png"></a></h1>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger" >
                    {{$errors->first()}}
                </div>
            @endif
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{route('cart')}}">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('Homepage')}}">Home</a></li>
                    <li><a href="{{route('shop')}}">Смартфоны</a></li>
                    <li><a href="{{route('brands')}}">Brands</a></li>
                    <li><a href="">Наушники</a></li>
                    <li><a href="">Аксессуары</a></li>
                    <li><a href="">Ноутбуки</a></li>
                    <li><a href="">Авто товары</a></li>
                    <li><a href="">Фотоаппараты</a></li>
                    <li><a href="">Связатся с нами</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
