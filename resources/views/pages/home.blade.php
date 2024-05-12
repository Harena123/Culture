@extends('layouts.front')
@section('contentFront')

<div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('uploads/building/slide-img1.png');">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-md-offset-2 text-center">
                  <div class="big-tagline">
                     <img class="border-line-img" src="uploads/building/sep-line-white.png" alt="" />
                     <h2><span class="yellow">Construction</span></h2>
                     <img style="margin-bottom:40px;" class="border-line-img" src="uploads/building/sep-line-white.png" alt="" />
                     <p class="lead"> {{ Auth::user()->name }}</p>
                     <p class="lead">With Landigoo responsive landing page template, you can showcase your awesome building & construction services!</p>
                     <!-- <a data-scroll href="#services" class="btn btn-light btn-radius btn-brd">View all Services</a> -->
                     <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="btn btn-light btn-radius btn-brd"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         </div>         
                    
                    

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="welcome" name="csv_file" placeholder="Recherche"/>
                                    
                                <input  type="submit" />
                            </form>
                    

                    </div>
                </div>
            </div>


@stop