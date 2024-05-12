@extends('layouts.default')
@section('content')

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
                                 <p> {{ Auth::user()->name }}</p>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class=" scroll active"><a href="/home">home</a></li>
                        <li class="scroll"><a href="/list">list</a></li>
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
        <!-- <h2>get your desired car in resonable price</h2> -->
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore   magna aliqua. 
        </p>
        <button class="welcome-btn" onclick="window.location.href='#'">contact us</button>
       
<div class="container">
    
				<div class="row">
               
					<!-- <div class="col-md-12"> -->
						<div class="model-search-content">
                                
							<!-- <div class="row"> -->

								<!-- <div class="col-md-offset-1 col-md-2 col-sm-12"> -->
                               
									<div class="single-model-search">
                                   
										<!-- <div class="model-select-icon"> -->
                    @if($imports->isEmpty())
                <p style="color:black;">Aucun résultat</p>
                @else
                <table class="table table-striped table-hover">
                  <thead >

                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Nom</th>
                      <!-- <th scope="col">Img</th> -->
                      <th scope="col">Prenom</th>
                      <th scope="col">dateNaissance</th>
                      <th scope="col">Modif</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach ($imports as $pt)

                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td> <a href="{{ route('details',['id'=>$pt->id]) }}">{{ $pt->nom }}</a></td>
                      <td>{{ $pt->prenom }}</td>
                      <td>{{ $pt->dateNaissance }}</td>
                      <td><a href="{{ route('modif',['id'=>$pt->id]) }}" >Modifier</a></td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif

										</div><!-- /.model-select-icon -->
									</div>
    </div>
</div>
@stop