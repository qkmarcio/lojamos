<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">

<?php
include './includes/header.php';
//include './funcoes/config.php'; 
?>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Navbar Start -->
        <?php
        include './Includes/menu.php';
        ?>
        <!-- Sidebar End -->

        <!-- Main Container Start -->
        <main class="main--container">
            <!-- Page Header Start -->

            <!-- Main Footer Start -->
            <?php
            include './Includes/footer.php';
            ?>
            <!-- Main Footer End -->
        </main>
        <!-- Main Container End -->
    </div>
    <!-- Wrapper End -->
    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap-table.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/jquery.sparkline.min.js"></script>
    <script src="../assets/js/raphael.min.js"></script>
    <script src="../assets/js/morris.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/jquery-jvectormap.min.js"></script>
    <script src="../assets/js/jquery-jvectormap-world-mill.min.js"></script>
    <script src="../assets/js/horizontal-timeline.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/jquery.steps.min.js"></script>
    <script src="../assets/js/dropzone.min.js"></script>
    <script src="../assets/js/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <script>
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

        function loadContent(id, pagina) {
            $(id).slideUp("slow", function() { //efeito de sobe e desce o footer
                //$("#carregando").dialog('open');
                $(this).load(pagina, function() {
                    //$("#carregando").dialog('close');
                    $(this).slideDown("slow");
                });
            });
        }


        loadjscssfile('../js/custom_jquery.js?nocache=' + Math.random(), 'js');
        loadjscssfile('../js/jUsuario.js?nocache=' + Math.random(), 'js');

        // var usuario = $("#usuarioID").val();
        if ($("#usuarioID").val() == 5) { // verifica se o usuario tem permissao
            //javascript:loadContent('#conteudo', 'Utilitario/Expedicao.php');
            $("#page-wrapper").attr("style", "margin-left:0px;padding-top: 30px;");

        } else {
            //javascript:loadContent('#conteudo', 'Financeiro/dashboard.php');
            //setTimeout(function() { console.log("setTimeout: Ja passou 1 segundo!"); }, 1000);
        }
    </script>
    <!-- Page Level Scripts -->
</body>

</html>