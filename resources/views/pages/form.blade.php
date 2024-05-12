@extends('layouts.dash')
@section('content2')

<section id="home" class="welcome-hero">

<!-- top-area Start -->
<div class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

            <div class="container">

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="navbar-brand"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li ></li>
                    <li ><a href="/home">home</a></li>
                        <li ><a href="/traitlist">list</a></li>
                        <li class=" active"><a href="#">Form</a></li>
                        <!-- <li class="scroll"><a href="#featured-cars">featured cars</a></li>
                        <li class="scroll"><a href="#new-cars">new cars</a></li>
                        <li class="scroll"><a href="#brand">brands</a></li>
                        <li class="scroll"><a href="#contact">contact</a></li> -->
                    </ul><!--/.nav -->
                </div><!-- /.navbar-collapse -->
            </div><!--/.container-->
        </nav><!--/nav-->
        <!-- End Navigation -->
    </div><!--/.header-area-->
    <div class="clearfix"></div>

</div><!-- /.top-area-->
<!-- top-area End -->

<div class="container">
    <div class="welcome-hero-txt">
    <form action="{{ route('insert.MenuEtu') }}" method="POST" enctype="multipart/form-data">

    <p>
    Welcome <br><br>

            <select name="idEtu" id="idEtu" style="color:black">
        @foreach ($etu as $pt)
                <option value="{{ $pt->id }}">{{ $pt->nom }} {{ $pt->prenom }} </option>
        @endforeach
        
            </select>
<br>
<br>

            <select name="idMenu" id="" style="color:black">
        @foreach ($menu as $pt)
                <option value="{{ $pt->id }}">{{ $pt->nom }} : {{ $pt->prix }} </option>
        @endforeach
        
            </select>
        </p>
        <button class="welcome-btn" onclick="window.location.href='#'">Valider</button>

            </form>
    
    <br>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
               


    <div class="welcome-hero-txt">
                     


            <!-- <div class="model-search-content"> -->

                <div class="row">
                    <div class="col-md-offset-1 col-md-2 col-sm-12">
                    
                  

                        <!-- <div class="single-model-search text-center">
                            <button class="welcome-btn model-search-btn" onclick="window.location.href='#'">
                                search
                            </button>
                        </div> -->
                    </div>
        </div>
</div>

</section><!--/.welcome-hero-->
<!--welcome-hero end -->

<!--service start -->

@stop