@extends('layouts.dash')
@section('content2')
<div id="wrapper">
 
 <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.html">
      <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      <h5 class="logo-text"> Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="/dashboard">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>

     <!-- <li>
       <a href="•">
         <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
       </a>
     </li> -->

     <li class="active">
       <a href="/forms" class="active">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Insertion</span>
       </a>
          
     </li>
     <li>
       <a href="/listes">
         <i class="zmdi zmdi-grid"></i> <span>Listes</span>
       </a>
     </li>
     <!-- <li>
       <a href="tables.html">
         <i class="zmdi zmdi-grid"></i> <span>Tables</span>
       </a>
     </li> -->

     <!-- <li>
       <a href="calendar.html">
         <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
         <small class="badge float-right badge-light">New</small>
       </a>
     </li> -->

     <!-- <li>
       <a href="profile.html">
         <i class="zmdi zmdi-face"></i> <span>Profile</span>
       </a>
     </li>

     <li>
       <a href="login.html" target="_blank">
         <i class="zmdi zmdi-lock"></i> <span>Login</span>
       </a>
     </li>

      <li>
       <a href="register.html" target="_blank">
         <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
       </a>
     </li> -->

     <li class="sidebar-header">LABELS</li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

   </ul>
  
  </div>

</header>
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Form-route</div>
           <hr>
            <form action="{{ route('routes.store') }}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-group">
            <label for="input-1">Nom </label>
            <input type="text" class="form-control" id="nomRoute" name="nomRoute" placeholder="Nom"/>
            @error('nomRoute')
              <span class="text-danger">{{ $message }}</span>
          @enderror
           </div>

           <div class="form-group">

            <label for="input-2">Ville deb</label>
            <select class="form-control" id="villeDeb" name="villeDeb">
                <option value="">choisir</option>
                @foreach ($villes as $pt)
                  <option value="{{ $pt->id }}">{{ $pt->nom }}</option>
                  @endforeach
            </select>
            @error('villeDeb')
              <span class="text-danger">{{ $message }}</span>
          @enderror
           </div>
           <div class="form-group">
            <label for="input-2">Ville arriv</label>
            <select class="form-control" id="villeArriv" name="villeArriv">
                <option value="">choisir</option>
                @foreach ($villes as $pt)
                  <option value="{{ $pt->id }}">{{ $pt->nom }}</option>
                  @endforeach

            </select>
            
            @error('villeArriv')
              <span class="text-danger">{{ $message }}</span>
          @enderror
           </div>
           <br>
           <div class="form-group">
            <label for="input-8">Distance</label>
            <input type="number"  class="form-control" id="distance" name="distance" placeholder="distance">
            @error('distance')
              <span class="text-danger">{{ $message }}</span>
          @enderror
           </div>
           <br>
           
           <div class="form-group">
            <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Register</button>
          </div>
          </form>
         </div>
         </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Insertion Portion-route</div>
           <hr>
            <form action="{{ route('portions.store') }}" method="post" enctype="multipart/form-data">
           @csrf
                <div class="form-group">
                  <label for="input-6">Route</label>
                        <select class="form-control" id="nomRoutePortion" name="nomRoutePortion">
                            <option value="">choisir</option>
                            @foreach ($lesroutes as $pt)
                          <option value="{{ $pt->id }}">{{ $pt->nom }}</option>
                          @endforeach
                        </select>
                              @error('nomRoutePortion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>
          
           <br>
              <div class="form-group">
                <label for="input-2">Deb</label>
                <input type="number" class="form-control form-control-rounded" id="debut" name="debut" min="0"placeholder="Debut">
                @error('debut')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
              </div>
                    <div class="form-group">
                      <label for="input-2">Fin</label>
                      <input type="number" class="form-control form-control-rounded" id="fin" name="fin" min="0" placeholder="Fin">
                      @error('fin')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
           <br>
                    <div class="form-group">
                            <label for="input-6">Etat</label>
                                  <select class="form-control" id="etat" name="etat">
                                      <option value="">choisir</option>
                                      @foreach ($etats as $pt)
                                      <option value="{{ $pt->id }}">{{ $pt->descri }}</option>
                                      @endforeach
                                  </select>
                                  @error('etat')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                          </div>
           <br>
         
                <div class="form-group">
                  <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Register</button>
                </div>
          </form>
         </div>
         </div>
      </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Insertion Param-entretien</div>
           <hr>
            <form action="{{ route('parametre.store') }}" method="post" enctype="multipart/form-data">
           @csrf
                          <div class="form-group">
                            <label for="input-6">Etat</label>
                                  <select class="form-control" id="etatParametre" name="etatParametre">
                                      <option value="">choisir</option>
                                        @foreach ($etats as $pt)
                                        <option value="{{ $pt->id }}">{{ $pt->descri }}</option>
                                        @endforeach
                                  </select>
                                  @error('etatParametre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
           <br>
              <div class="form-group">
                <label for="input-2">Prix/Km</label>
                <input type="number" class="form-control form-control-rounded" id="prix" name="prix"  min="0" placeholder="Prix">Ar
                @error('prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
              </div>
                    <div class="form-group">
                      <label for="input-2">Duree</label>
                      <input type="number" class="form-control form-control-rounded" id="duree" name="duree"  min="0" placeholder="Duree">Km
                      @error('duree')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
      
           <br>
          
                <div class="form-group">
                  <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Register</button>
                </div>
          </form>
         </div>
         </div>
      </div>
    </div>
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer> -->
	<!--End footer-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

@stop
