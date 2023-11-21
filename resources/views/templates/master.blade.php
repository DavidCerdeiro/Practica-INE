<!doctype html>
<!-- Bootstrap first template for Internet y Negocio Electrónico, University of Cadiz,
     since 2019, based on https://www.w3schools.com/bootstrap4/bootstrap_templates.asp -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
    -->
    <style>
      .fakeimg { height: 100px; background: #aaa; }
      .cabecera{
        margin-bottom:0;
        padding:20px;
        background-color:#6397DD;
      }
      .footer{
        margin-bottom:0;
        padding:20px;
        background-color:#6397DD;
        margin-top:30px;
      }
      .button {margin-left:10px;background-color:black;border-radius:0;border:1px solid gray;color: #fff;}
      .autenticacion{background: none; border: none;}
      .foto-articulo{width:200px; height:300px;}
      .foto-derecha{width:100px; height:150px;}
      .link{text-decoration: none; border: none; background: none; color: inherit;}
      .icono{width:20px; height:20px;}
      .numero{margin-bottom:10px;font-size:40px;}
      .carrito{height:50px; width:50px; margin-left:50px;}
      .numproductos{margin-top: 20px; color: #000;}
      .boton-carrito {text-decoration: none;color: #000;font-size: 24px;display: inline-block;}
    </style>

    <title>TodoJuegazos</title>
  </head>
  <body>
    @include('layouts.header')
    <main class="container-fluid" style="margin-top:30px">
    @yield('content-center')
    @yield('content-right')
    </main>
    @include('layouts.footer')
<!-- Loading Javascripts -->   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="../../assets/js/vendor/popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>