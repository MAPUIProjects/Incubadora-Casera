<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $db = 'mapui';

    $link = mysqli_connect($host, $user, $password, $db);

    $sql = "SELECT humedad, fechaHora from estado order by fechaHora";
    $result = mysqli_query($link, $sql);
    $valoresX = array();
    $valoresY = array();

    while ($ver = mysqli_fetch_row($result)) {
        $valoresX[]= $ver[1];
        $valoresY[]= $ver[0];
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);
?>

<div id = "graficaBarras"></div>

<script type = "text/javascript">
    function crearCadenaBarras(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type = "text/javascript">

    datosX = crearCadenaBarras('<?php echo $datosX ?>');
    datosY = crearCadenaBarras('<?php echo $datosY ?>');
    
    var data = [
        {
            x: datosX,
            y: datosY,
            type: 'bar',
            marker:{
                color: 'purple'
            }
        }
    ];
    var layout = {
        title: 'Gráfica de humedad',
        xaxis: {
            title: 'Fechas'
            
        },
        yaxis: {
            title: 'Temperatura'
        },
        font:{
            family: "Century Gothic"
        }
    };


    Plotly.newPlot('graficaBarras', data, layout);

</script>