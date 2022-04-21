<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">

<?php
include '../includes/header.php';
//include './funcoes/config.php'; 
?>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Navbar Start -->
        <?php
        include '../Includes/menu.php';
        ?>
        <!-- Sidebar End -->

        <!-- Main Container Start -->
        <main class="main--container">
            <!-- Page Header Start -->
            <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Page Title Start -->
                            <h2 class="page--title h5">Cadastros de Aulas</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/lojamos/pages/principal.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><span>Cadastros</span></li>
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
                    <h3 class="h3">Lista de Aulas </h3>
                    <p>Total 1,330 Aulas</p>
                </div>

                <div class="actions">
                    <form action="#" class="search flex-wrap flex-md-nowrap">
                        <input type="text" class="form-control" placeholder="Nome da Aula..." required>
                        <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                    </form>

                    <a href="#" class="addProduct btn btn-lg btn-rounded btn-warning">Add Aula</a>
                </div>
                </div>
                <!-- Records Header End -->
                </div>
                <div class="row gutter-20">
                    <div class="col-md-6">
                        <!-- Panel Start -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Form</h3>
                            </div>

                            <div class="panel-content">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Email Address</span>
                                        <input type="email" name="email" placeholder="Enter Your Email..." class="form-control">
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Password</span>
                                        <input type="password" name="password" placeholder="Enter Your Password..." class="form-control">
                                    </label>
                                </div>

                                <div class="form-group pt-1 pb-1">
                                    <label class="form-check">
                                        <input type="checkbox" name="checkbox" value="1" class="form-check-input">
                                        <span class="form-check-label">Remember Me</span>
                                    </label>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">
                                <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                        <!-- Panel End -->
                    </div>
                </div>
            </section>
            <?php
            include '../Includes/footer.php';
            ?>
            <!-- Main Footer End -->
        </main>
        <!-- Main Container End -->
    </div>
    <!-- Wrapper End -->
    <?php
    include '../Includes/script.php';
    ?>

    <script>
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









<section class="main--content">
    <div class="panel">
        <!-- Records Header Start -->
        <div class="records--header">
            <div class="title fa-shopping-bag">
                <h3 class="h3">Lista de Aulas </h3>
                <p>Total 1,330 Aulas</p>
            </div>

            <div class="actions">
                <form action="#" class="search flex-wrap flex-md-nowrap">
                    <input type="text" class="form-control" placeholder="Nome da Aula..." required>
                    <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                </form>

                <a href="#" class="addProduct btn btn-lg btn-rounded btn-warning">Add Aula</a>
            </div>
        </div>
        <!-- Records Header End -->
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Form Wizard</h3>
        </div>

        <div class="panel-content">
            <!-- Form Wizard Start -->
            <form action="#" method="post" id="formWizard" class="form--wizard wizard clearfix" novalidate="novalidate" role="application">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="formWizard-t-0" href="#formWizard-h-0" aria-controls="formWizard-p-0"><span class="current-info audible">current step: </span><span class="number">1</span> Identification</a></li>
                        <li role="tab" class="disabled" aria-disabled="true"><a id="formWizard-t-1" href="#formWizard-h-1" aria-controls="formWizard-p-1"><span class="number">2</span> Login Info</a></li>
                        <li role="tab" class="disabled last" aria-disabled="true"><a id="formWizard-t-2" href="#formWizard-h-2" aria-controls="formWizard-p-2"><span class="number">3</span> Completed</a></li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <h3 id="formWizard-h-0" tabindex="-1" class="title current">Identification</h3>
                    <section id="formWizard-p-0" role="tabpanel" aria-labelledby="formWizard-h-0" class="body current" aria-hidden="false" style="display: block;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">First Name: *</span>
                                        <input type="text" name="fname" placeholder="Jr." class="form-control" required="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Middle Name:</span>
                                        <input type="text" name="mname" placeholder="John" class="form-control">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Last Name: *</span>
                                        <input type="text" name="lname" placeholder="Doe" class="form-control" required="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Email: *</span>
                                        <input type="email" name="email" class="form-control" required="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Phone:</span>
                                        <input type="tel" name="phone" class="form-control">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Address: *</span>
                                        <input type="text" name="address" class="form-control" required="">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <h3 id="formWizard-h-1" tabindex="-1" class="title">Login Info</h3>
                    <section id="formWizard-p-1" role="tabpanel" aria-labelledby="formWizard-h-1" class="body" aria-hidden="true" style="display: none;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Username: *</span>
                                        <input type="text" name="uname" class="form-control" required="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Password: *</span>
                                        <input type="password" name="password" id="password" class="form-control" required="">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <span class="label-text">Confirm Password: *</span>
                                        <input type="password" name="cpassword" class="form-control" required="">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <h3 id="formWizard-h-2" tabindex="-1" class="title">Completed</h3>
                    <section id="formWizard-p-2" role="tabpanel" aria-labelledby="formWizard-h-2" class="body" aria-hidden="true" style="display: none;">
                        <div class="jumbotron text-center">
                            <h2 class="h1 fw--600 text-dark mb-2">Login Successfull</h2>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore modi dignissimos, omnis earum cupiditate dolorum, deleniti ad praesentium atque ipsam illum! Aliquid, distinctio consequatur natus vero assumenda adipisci obcaecati iste. Molestias architecto, repudiandae id doloribus dolor.</p>

                            <button type="submit" class="btn btn-rounded btn-info">Proceed To User Profile</button>
                        </div>
                    </section>
                </div>
                <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li>
                        <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a></li>
                        <li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Finish</a></li>
                    </ul>
                </div>
            </form>
            <!-- Form Wizard End -->
        </div>
    </div>
</section>
<!-- Main Content End -->


<!-- .row -->
<div class="row">
    <!-- menu -->
    <div class="col-sm-6" style="margin-bottom: 4px">
        <input class="form-control" id="busca_Aula" type="text" placeholder="Busca Horarios">
    </div>
    <div class="col-sm-6">
        <button type="button" id="btn_Cadastro_Aulas" class="btn btn-primary" data-whatever="Nova Aula" data-backdrop="static">Incluir</button>
    </div>
</div>
<!-- /.row -->

<!-- .row -->
<div class="row " style="margin-top: 5px">
    <!-- .panel panel-default -->
    <div class="panel panel-primary " id="Form_Cadastro_Aulas">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>Cadastra Aulas

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-lg-2">
                    <label>Codigo</label>
                    <input class="form-control" id="aul_id" disabled="">
                </div>
                <div class="form-group col-lg-4">
                    <label>Nome </label>
                    <input class="form-control" id="aul_nome" placeholder="ex. João.">
                </div>
                <div class="form-group col-lg-6">
                    <label>Sobrenome</label>
                    <input class="form-control" id="aul_sobrenome" placeholder="ex. de Souza.">
                </div>
                <div class="form-group col-lg-3">
                    <label>Aniversário</label>
                    <input class="form-control" id="aul_nascimento" placeholder="ex. 31/12/2010.">
                </div>
                <div class="form-group col-lg-3">
                    <label>Sexo</label>
                    <select class="form-control">
                        <option>Ma</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>E-mail</label>
                    <input class="form-control" id="aul_email" placeholder="email@exemplo.com.">
                </div>
                <div class="form-group col-lg-4">
                    <label>Whathapp</label>
                    <input class="form-control" id="aul_telefone" placeholder="ex. +55 45 99972-1883.">
                </div>
                <div class="form-group col-lg-8">
                    <label>Endereço</label>
                    <input class="form-control" id="aul_endereco" placeholder="ex. Av Brasil.">
                </div>
                <div class="form-group col-lg-12">
                    <label>Foto</label>
                    <input type="file">
                </div>
                <div class="form-group col-lg-12">
                    <label>Obs</label>
                    <textarea class="form-control" id="aul_obs" rows="3"></textarea>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="btn-group">
                <button type="reset" class="btn btn-danger" id="aul_Sair">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="aul_Gravar">Gravar</button>
            </div>
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel panel-default -->
</div>
<!-- /.row -->

<!-- .row -->
<!-- grid -->
<div class="row" style="margin-top: 5px">
    <div class="col-sm-12">
        <div id="lista_Aulas"></div>
    </div>
</div>
<!-- /.row -->

<script type="text/javascript">
    $(document).ready(function() {

        /*$('#Cadastro_Professor').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            
        });

        $('#aul_Gravar').click(function() {
            $('#Cadastro_Aula').modal('hide');
        }); */


        // Set effect from select menu value
        $("#btn_Cadastro_Aulas").on("click", function() {


            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            // Run the effect
            $("#Form_Cadastro_Aulas").toggle('blind', 500);
            $("#aul_nome").focus();
        });




    });



    function loadjscssfile(filename, filetype) {
        var fileref = null;
        if (filetype == "js") { //if filename is a external JavaScript file
            fileref = document.createElement('script');
            fileref.setAttribute("type", "text/javascript");
            fileref.setAttribute("src", filename);
        } else if (filetype == "css") { //if filename is an external CSS file
            fileref = document.createElement("link");
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
        }
        if (typeof fileref != "undefined") {
            document.getElementsByTagName("head")[0].appendChild(fileref);
        }
    }

    //loadjscssfile('../js/jProfessores.js?nocache=' + Math.random(), 'js');
</script>