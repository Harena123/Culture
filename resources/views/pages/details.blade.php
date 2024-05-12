<?php
$url=config('app.url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo $url ?>/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url ?>/css-perso/app.css" rel="stylesheet">
    <script src="<?php echo $url ?>/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  let currentPage = 0;
  const pages = document.querySelectorAll('.page');

  function showPage(pageIndex) {
    pages.forEach(function(page, index) {
      if (index === pageIndex) {
        page.style.display = 'block';
      } else {
        page.style.display = 'none';
      }
    });
  }

  showPage(currentPage);

  document.querySelector('.prev').addEventListener('click', function() {
    if (currentPage > 0) {
      currentPage--;
      showPage(currentPage);
    }
  });

  document.querySelector('.next').addEventListener('click', function() {
    if (currentPage < pages.length - 1) {
      currentPage++;
      showPage(currentPage);
    }
  });
});

</script>
<body>
<div class="container">

<!-- top-area Start -->
<div class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <li class="nav-item">
        
        <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
</li>
                </ul>
        </li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/traitlist">Liste</a>
        </li>
       

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>
  </div>
  

</nav>



<div class="container">
    <div class="welcome-hero-txt">
    <br>
        <!-- <p class="fw-bold">Bold text.</p> -->
<h3 class="fw-bolder">{{ $imports[0]->Nom }} {{ $imports[0]->prenom }}</h3>
<!-- <p class="fw-medium">Medium weight text.</p>
<p class="fw-normal">Normal weight text.</p>
<p class="fw-light">Light weight text.</p>
<p class="fw-lighter">Lighter weight text (relative to the parent element).</p>
<p class="fst-italic">Italic text.</p>
<p class="fst-normal">Text with normal font style</p> -->
        <div class="page">
       <p> Pages 1/3 </p>
        <table class="table table-striped table-hover">
                  <thead class="table-success">
                    <tr>
                      <th scope="col">Matières</th>
                      <th class="align-right">Notes</th>
                      <th class="align-right">Coefficient</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach ($imports as $pt)
                    <tr>
                      <td> {{ $pt->Matieres }} </td>
                      <td class="align-right">{{ $pt->notes }}</td>
                      <td class="align-right">{{ $pt->coeff }}</td>
                    </tr>
                @endforeach
                    <tr>
                            <td > <h5 class="fw-bold">Votre Moyenne est de : </h5></td>
                            <td class="align-right"></td>
                            <td class="align-right"> <h5 class="fw-bold">{{ $moyenne }}/20</h5> </td>
                    </tr>
                  </tbody>
                </table>
        </div>

        <!-- div2 -->
                    <div class="page">Pages 2/3
                    </div>
                            <div class="page">Pages 3/3
                            </div>
            </div>

            <div class="pagination">
            <a href="#" class="prev">Précédent</a> 
            <a href="#" class="next">Suivant</a>
            </div>
    </div>
</div>
<div class="download">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Download
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('generate-pdf-note',['id' => $imports[0]->id] ) }}">PDF</a></li>
                            <li><a class="dropdown-item" href="#">Xls</a></li>
                        </ul>
                </div>
<!-- <nav class="download" aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item" aria-current="page">
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->
<br>


<!--service start -->

</body>
</html>
