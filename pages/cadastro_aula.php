<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <?php
        include './includes/header.php';
        //include './funcoes/config.php'; 
        ?>
    </head>

    <body>
        <style type="text/css">
            input {
                text-transform: uppercase;
            }
            textarea {
                text-transform: uppercase;
            }
            .table-fixed thead tr th {
                background-color: #f39c12;
                border-color: #e67e22;
            }

            .table-fixed tbody {
                display:block;
                height:300px;
                overflow:auto;
            }
            .table-fixed thead, tbody tr {
                display:table;
                width:100%;
                table-layout:auto;
            }
            .table-fixed thead {
                width: calc( 100% - 1em )
            }

            .profile--panel .img{
                height: 150px;
            }
            #thumbnail {
                height: 100%
            }
        </style>

        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- Menu Start -->
            <?php include './Includes/menu.php'; ?>
            <!-- Menu End -->
            <!-- Main Container Start -->
            <main class="main--container">
                <!-- Page Header Start -->
                <section class="page--header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Page Title Start -->
                                <h2 class="page--title h5">Cadastro de Aulas</h2>
                                <!-- Page Title End -->

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><span>Cadastro</span></li>
                                    <li class="breadcrumb-item active"><span>Aulas</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Page Header End -->

                <!-- Main Content Start -->
                <section class="main--content">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="dropdown">
                                <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-sync"></i>Atualizar Data</a></li>
                                    <li><a href="#formCadastro" id="btnNovoCadastro" data-toggle="modal"><i class="fa fa-cogs" ></i>Novo</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-4" style="margin-bottom: 20px;">
                                    <h3 class="panel-title">Lista de Aulas</h3>
                                </div>
                                <div class="col-lg-8 app_searchBar" style="max-width: 500px;">
                                    <input id="inpBuscar" type="search" name="tasks" placeholder="Buscar Aulas..." class="form-control">
                                    <button id="btnBuscar" type="submit" class="btn btn-rounded">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="col-lg-12 table-fixed table style--3 table-hover" style="min-width: 900px;">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center">ID</th>
                                            <th class="col-2 text-left">Aula</th>
                                            <th class="col-4 text-left">Professor</th>
                                            <th class="col-2 text-center">Semanda</th>
                                            <th class="col-2 text-left">Horario</th>
                                            <th class="col-1 text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="ListView"></tbody>
                                </table>

                            </div>
                            <div id="pager">
                                <ul id="pagination" class="pagination-sm "></ul>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Main Content End -->

                <!-- Main Footer Start -->
                <?php include './Includes/footer.php'; ?>
                <!-- Main Footer End -->
            </main>
            <!-- Main Container End -->

        </div>
        <!-- Wrapper End -->
        <!-- Large Modal Start -->
        <form id="formCadastro" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de Aulas</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group px-2 col-lg-4">
                                <label>Codigo</label>
                                <input class="form-control px-2" id="aul_id" disabled="">
                                <input id="insert" style="display: none">
                            </div>
                            <div class="form-group px-2 col-lg-8">
                                <label name="aul_nome">Nome </label>
                                <input class="form-control px-2" id="aul_nome" name="aul_nome">
                            </div>
                            <div class="form-group px-2 col-lg-5">
                                <label name="aul_horario">Horario</label>
                                <input type="time" class="form-control px-2" id="aul_horario"  name="aul_horario">
                            </div>

                            <div class="form-group px-2 col-lg-7">
                                <label name="prof_nome">Dia Semana</label>
                                <select class="form-control px-2" id="aul_dia" name="aul_dia">
                                    <option >SELECIONE DIA</option>
                                    <option value="SEGUNDA">SEGUNDA</option>
                                    <option value="TERÇA">TERÇA</option>
                                    <option value="QUARTA">QUARTA</option>
                                    <option value="QUINTA">QUINTA</option>
                                    <option value="SEXTA">SEXTA</option>
                                    <option value="SABADO">SABADO</option>
                                    <option value="DOMINGO">DOMINGO</option>
                                </select>
                            </div>
                            <div class="form-group px-2 col-lg-12">
                                <label name="aul_prof_id">Professor(a)</label>
                                <select class="form-control px-2" id="aul_prof_id" name="aul_prof_id">

                                </select>
                            </div>
                            <div class="form-group px-2 col-lg-12">
                                <label>Obs</label>
                                <textarea class="form-control px-2" id="aul_obs" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-sm btn-rounded btn-danger" id="aul_Sair" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-sm btn-rounded btn-primary" id="aul_Gravar">Gravar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Large Modal End -->

        <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
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
        <script src="../assets/js/jquery.mask.js"></script>
        <script src="../assets/js/jquery.steps.min.js"></script>
        <script src="../assets/js/dropzone.min.js"></script>
        <script src="../assets/js/ion.rangeSlider.min.js"></script>
        <script src="../assets/js/datatables.min.js"></script>
        <script src="../assets/js/jquery.twbsPagination.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script src="../assets/js/sweetalert.min.js"></script>
        <script src="../assets/js/sweetalert-init.js"></script>

        <script>
            /*$('document').ready(function() {
             $("#buscar_professor").focus();
             //$('#btn_Novo_Professor').click(function () { $("#prof_nome").focus(); });
             $('#formCadProfessor').on('shown.bs.modal', function () {
             $("#prof_nome").focus();
             });
             
             });*/

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
                $(id).slideUp("slow", function () { //efeito de sobe e desce o footer
                    //$("#carregando").dialog('open');
                    $(this).load(pagina, function () {
                        //$("#carregando").dialog('close');
                        $(this).slideDown("slow");
                    });
                });
            }

            loadjscssfile('../js/jAula.js?nocache=' + Math.random(), 'js');
        </script>
        <!-- Page Level Scripts -->

</body>

</html>