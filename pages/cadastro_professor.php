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
                                <h2 class="page--title h5">Cadastro de Professores</h2>
                                <!-- Page Title End -->

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><span>Cadastro</span></li>
                                    <li class="breadcrumb-item active"><span>Professores</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Page Header End -->

                <!-- Main Content Start -->
                <section class="main--content">
                    <div class="panel">
                        <!-- Records Header Start -->
                        <div class="records--header">
                            <div class="title fa-users">
                                <h3 class="h3">Total de Professores </h3>
                                <p>Total 1,330 Professores</p>
                            </div>

                            <div class="actions">
                                <form action="#" class="search flex-wrap flex-md-nowrap">
                                    <input type="text" id="buscar" class="form-control px-2" placeholder="Professor ..." required>
                                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                                </form>
                                <button href="#formCadastro" id="btnNovoCadastro" class="btn btn-lg btn-rounded btn-warning" data-toggle="modal">NOVO</i></button>
                            </div>
                        </div>
                        <!-- Records Header End -->
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Lista de Professores
                            </h3>

                            <div class="dropdown">
                                <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-sync"></i>Atualizar Data</a></li>
                                    <li><a href="#"><i class="fa fa-cogs"></i>Novo</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="col-lg-12 table-fixed table style--3 table-hover" style="min-width: 900px;">
<!--                                    <colgroup>
                                        <col class="col-1">
                                        <col class="col-4" width="35%">
                                        <col class="col-3" width="10%">
                                        <col class="col-2" width="35%">
                                        <col class="col-1" width="10%">
                                        <col class="col-1" width="5%">
                                    </colgroup>-->
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center">ID</th>
                                            <th class="col-3 text-left">Nome</th>
                                            <th class="col-2 text-left">Telefone</th>
                                            <th class="col-3 text-left">Email</th>
                                            <th class="col-2 text-center">Status</th>
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
        <div id="formCadastro" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Cadastro</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <input id="insert" style="display: none">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group px-2 col-lg-2">
                                <label>Codigo</label>
                                <input class="form-control px-2" id="prof_id" disabled="">
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Nome </label>
                                <input class="form-control px-2" id="prof_nome" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-4">
                                <label>Sobrenome</label>
                                <input class="form-control px-2" id="prof_sobrenome" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Aniversario</label>
                                <input type='date' class="form-control px-2" id="prof_nascimento" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Sexo</label>
                                <select class="form-control px-2" id="prof_sexo">
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMININO">Feminino</option>
                                </select>
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>WhatsApp</label>
                                <input class="form-control px-2" id="prof_telefone" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-6">
                                <label>Endereço</label>
                                <input class="form-control px-2" id="prof_endereco" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-6">
                                <label>E-mail</label>
                                <input class="form-control px-2" id="prof_email" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Comissão</label>
                                <input class="form-control px-2" id="prof_comissao" placeholder="">
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Status</label>
                                <select class="form-control px-2" id="prof_ativado">
                                    <option value="ATIVO">Ativo</option>
                                    <option value="INATIVO">Inativo</option>
                                </select>
                            </div>
                            
                            <div class="form-group px-2 col-lg-9">
                                <label>Obs</label>
                                <textarea class="form-control px-2" id="prof_obs" rows="3"></textarea>
                            </div>
                            <div class="form-group px-2 col-lg-3">
                                <label>Obs</label>
                                <div class="profile--panel">
                                    <div class="img online">
                                        <img id="thumbnail" src="../Fotos/semfoto.jpg" alt="" class="rounded-circle">
                                        <input type="file" id="prof_foto" accept="image/*" style="display: none">
                                    </div>
                                    <div class="name">
                                        <h3 class="h3"></h3>
                                        
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-sm btn-rounded btn-danger" id="Sair" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-sm btn-rounded btn-primary" id="Gravar">Gravar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Large Modal End -->
        <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
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


            //loadjscssfile('../js/custom_jquery.js?nocache=' + Math.random(), 'js');
            loadjscssfile('../js/jProfessor.js?nocache=' + Math.random(), 'js');

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
        <script>
            
            
//            var $pagination = $('#pagination'),
//                    totalRecords = 0,
//                    records = [],
//                    displayRecords = [],
//                    recPerPage = 10,
//                    page = 1,
//                    totalPages = 0;
//
//            $.ajax({
//                url: "https://www.js-tutorials.com/source_code/api_data/employee_all.php",
//                async: true,
//                dataType: 'json',
//                success: function (data) {
//                    records = data;
//                    console.log(records);
//                    totalRecords = records.length;
//                    totalPages = Math.ceil(totalRecords / recPerPage);
//                    apply_pagination();
//                }
//            });
//
//            function apply_pagination() {
//                $pagination.twbsPagination({
//                    totalPages: totalPages,
//                    visiblePages: 6,
//                    onPageClick: function (event, page) {
//                        displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
//                        endRec = (displayRecordsIndex) + recPerPage;
//                        console.log(displayRecordsIndex + 'ssssssssss' + endRec);
//                        displayRecords = records.slice(displayRecordsIndex, endRec);
//                        generate_table();
//                    }
//                });
//            }
        </script>

    </body>

</html>