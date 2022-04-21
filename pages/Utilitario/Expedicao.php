<?php
$date = new DateTime();
$d = $date->format('H:i:s d/m/Y');
?>
<!--<audio controls autoplay>
<source src="Kalimba.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>-->
<!--<embed src='Kalimba.mp3'width='1' height='1'>-->
<style>
    .vermelho {
        color: white !important;
        background-color:#D9534F !important;
    }
    .azul {
        color: white !important;
        background-color:#337AB7 !important;
    }

    .verde {
        color: white !important;
        background-color: #5CB85C !important;
    }
</style>
<div class="row">
    <div class="col-lg-12" >
        <h2 id="relogio" ></h2>
    </div>
    <!--     /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
        <div class="col-lg-6"><!-- Grafico-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw" ></i>Pedidos em Separacion
                    <!--<h5>Separaciones</h4>-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="listaSeparacion1"  ></div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-6"><!-- Grafico-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <!--<i class="fa fa-bar-chart-o fa-fw" style="font-size: 40px;font-style:normal">Em Separação</i>-->
                    <i class="fa fa-bar-chart-o fa-fw" ></i>Rank Separadores
                    <!--<h4>Separaciones</h4>-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="listaSeparacion2" ></div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>    
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12"><!-- Grafico-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw" ></i>Rank Conferentes
                        <!--<i class="fa fa-bar-chart-o fa-fw" style="font-size: 40px;font-style:normal">Em Separação</i>-->
                        <!--<h4>Separaciones</h4>-->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="listaSeparacion3" ></div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-12"><!-- Grafico-->
                <div class="panel panel-info">
                    <div class="panel-heading">

                        <i class="fa fa-bar-chart-o fa-fw" ></i>Rank Equipes
                         <!--<i class="fa fa-bar-chart-o fa-fw" style="font-size: 40px;font-style:normal">Em Separação</i>-->
                        <!--<h4>Separaciones</h4>-->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="listaSeparacion4" ></div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>    
        </div>
    </div>
</div>

<!-- /.row -->
<script type="text/javascript">
    function loadjscssfile(filename, filetype) {
        var fileref = null;
        if (filetype === "js") { //if filename is a external JavaScript file
            fileref = document.createElement('script');
            fileref.setAttribute("type", "text/javascript");
            fileref.setAttribute("src", filename);
        } else if (filetype === "css") { //if filename is an external CSS file
            fileref = document.createElement("link");
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
        }
        if (typeof fileref !== "undefined") {
            document.getElementsByTagName("head")[0].appendChild(fileref);
        }
    }

    loadjscssfile('../js/jExpedicion.js?nocache=' + Math.random(), 'js');


    function mostra_tempo() {

        $.ajax({
            url: "../horas.php",

            success: function (data) {
                $("#relogio").html(data);
            }
        });
    }

    setInterval(function () {
        mostra_tempo();
    }, 1000);

//    setInterval(function () {
//        var v = $("#relogio").html();
//            v = v.substr(11, 5);
//            if(v == '13:03'){alert(v)}
//    }, 1000);

</script>