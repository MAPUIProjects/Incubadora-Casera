<link rel="stylesheet" href="style.css" />
<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'mapui';

$link = mysqli_connect($host, $user, $password, $db); 


?>

<?php
    // Esta ip se cambia por la que te de el NodeMCU 
    $data = file_get_contents("http://192.168.137.144");
    $decode = json_decode($data, true);
    $query1 = 'INSERT INTO estado (idIncubadora, temperatura, humedad, fechaHora) VALUES (1,'.$decode["temperatura"].','.$decode["humedad"].',"'.date("Y-m-d").' '.date("H:i:s").'");';
    $resultado1 = mysqli_query($link,$query1);
    //echo $query1;
?>

<table class="content-table">
<tr>
    <th>id</th>
    <th>temperatura</th>
    <th>humedad</th>
    <th>fecha y hora</th>
</tr>

<?php 

$query2 = 'SELECT * FROM estado'; //Mi query 
$resultado2 = mysqli_query($link,$query2); //variable con resultado de la query

while($fila = mysqli_fetch_array($resultado2)){

    $id = $fila['idIncubadora'];
    $temperatura = $fila['temperatura'];
    $humedad = $fila['humedad'];
    $fecha = $fila['fechaHora'];


    echo  '<tr>
    <td>'.$id.'</td>
    <td>'.$temperatura.'</td>
    <td>'.$humedad.'</td>
    <td>'.$fecha.'</td>
    </tr>';
}

    mysqli_close($link);
?>
</table>
