<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include './includes/header.php';
    //include './funcoes/config.php'; 
    ?>
</head>

<body>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Menu Start -->
        <?php
        include './Includes/menu.php';
        ?>
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
                    <!-- Records Header Start -->
                    <div class="records--header">
                        <div class="title fa-shopping-bag">
                            <h3 class="h3">Total de Aulas </h3>
                            <p>Total 1,330 Aulas</p>
                        </div>

                        <div class="actions">
                            <form action="#" class="search flex-wrap flex-md-nowrap">
                                <input type="text" class="form-control px-2" placeholder="Nome da Aula..." required>
                                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                            </form>
                            <button href="#formCadAula" id="btn_Novo_Aula" class="btn btn-lg btn-rounded btn-warning" data-toggle="modal">NOVO</i></button>
                        </div>
                    </div>
                    <!-- Records Header End -->
                </div>

                <div class="panel">
                    <!-- Records List Start -->
                    <div class="records--list" data-title="Lista de Aulas">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="not-sortable">Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-warning">Not Published</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-danger">Deleted</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-info">Available</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-warning">Not Published</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-danger">Deleted</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-info">Available</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="btn-link">#315321</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">
                                            <img src="assets/img/products/thumb-80x60.jpg" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Dress</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-link">Baby Products</a>
                                    </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td>
                                        <span class="label label-success">Approved</span>
                                    </td>
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Records List End -->
                </div>
            </section>
            <!-- Main Content End -->

            <!-- Main Footer Start -->
            <?php
            include './Includes/footer.php';
            ?>
            <!-- Main Footer End -->
        </main>
        <!-- Main Container End -->
    </div>
    <!-- Wrapper End -->

    <!-- Large Modal Start -->
    <div id="formCadAula" class="modal fade">
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
                        </div>
                        <div class="form-group px-2 col-lg-8">
                            <label>Nome </label>
                            <input class="form-control px-2" id="aul_nome" placeholder="">
                        </div>
                        <div class="form-group px-2 col-lg-5">
                            <label>Horario</label>
                            <input type="time" class="form-control px-2" id="aul_horario" placeholder="">
                        </div>
                        
                        <div class="form-group px-2 col-lg-7">
                            <label>Dia Semana</label>
                            <select class="form-control px-2" id="aul_dia">
                                <option>Segunda</option>
                                <option>Terça</option>
                                <option>Quarta</option>
                                <option>Quinta</option>
                                <option>Sexta</option>
                                <option>Sabado</option>
                                <option>Domingo</option>
                            </select>
                        </div>
                        <div class="form-group px-2 col-lg-12">
                            <label>Professor(a)</label>
                            <select class="form-control px-2" id="aul_prof_id">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/raphael.min.js"></script>
    <script src="assets/js/morris.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery-jvectormap.min.js"></script>
    <script src="assets/js/jquery-jvectormap-world-mill.min.js"></script>
    <script src="assets/js/horizontal-timeline.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.steps.min.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/ion.rangeSlider.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/main.js"></script>

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