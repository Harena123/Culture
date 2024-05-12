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

<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.align-right{
    text-align:right
}
th {
    background-color: #f2f2f2;
}

    </style>
<div class="container">

<div class="top-area">
    <div class="header-area">


<div class="container">
    <div class="welcome-hero-txt">
    <br>

<h3 class="fw-bolder">{{ $imports[0]->Nom }} {{ $imports[0]->prenom }}</h3>

     
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

                 
                
    </div>

</div>

<br>

</body>
</html>
