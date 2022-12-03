<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $db = 'mapui';

    $link = mysqli_connect($host, $user, $password, $db);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>NodeMCU mapui</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	  <script src="librerias/jquery-3.3.1.min.js"></script>
	  <script src="librerias/plotly-latest.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css"/>
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/eb496ab1a0.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body onload="table()">
  <script>

  
  </script>
    <header>
      <!-- !:::::La línea de búsqueda::::: -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.html">
            <img src="logo_mapui.png" alt="LOGO" width="" height="70" />
          </a>
          <div
            class="collapse navbar-collapse d-flex justify-content-end"
            id="navbarNavDropdown"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="./datos.php"
                  >Datos</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./equipo.html"
                  >Equipo</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- !:::::El texto en la imagen::::: -->
      <div
        class="cover d-flex justify-content-end align-items-start flex-column p-5"
      >
        <h1>MAPUI</h1>
        <p>Incubadoras caseras de calidad</p>
      </div>
    </header>
    <section>
      <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
        <script> 
    const table = () => {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = () => {
            document.getElementById('table').innerHTML = xhttp.response;
        }
        xhttp.open("GET", "worker.php");
        xhttp.send()
    }
    setInterval(() => {
        table();
    }, 120000); 
    
    </script>
    <div id="table" ></div>
          
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel panel-primary">
                  <div class="panel panel-heading">
                    Temperatura y humedad
                  </div>
                  <div class="panel panel-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div id="cargaLineal"></div>
                      </div>
                      <div class="col-sm-6">
                        <div id="cargaBarras"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- GRAFICOS -->
    </section>
  </body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#cargaBarras').load('barras.php');
	});
</script>

<script type="text/javascript">
 function grafi(){
    $(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#cargaBarras').load('barras.php');
	});
  };
var gg = setInterval(grafi,128000);
;
</script>
