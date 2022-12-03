<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $db = 'mapui';

    $link = mysqli_connect($host, $user, $password, $db);

    $sql = "SELECT temperatura, fechaHora from estado";
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

<div id = "graficaLineal"></div>

<script type = "text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type = "text/javascript">
    
    datosX = crearCadenaLineal('<?php echo $datosX ?>');
    datosY = crearCadenaLineal('<?php echo $datosY ?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter',
        line:{
            color: 'purple', 
            width: 4
        }
        
    };

    var layout = {
        title: 'Gráfica de temperatura',
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

    var data = [trace1];

    Plotly.newPlot('graficaLineal', data, layout);
</script>