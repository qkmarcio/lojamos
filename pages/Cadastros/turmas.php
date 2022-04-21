<style type="text/css">
    .no-close .ui-dialog-titlebar-close {display: none }
</style>
<div class="row col-sm-10"><!-- Container -->
    <div class="row"><!-- titulo -->
        <h3 class="page-header">Lista de Alunos</h3>
    </div>

    <div class="row"><!-- menu -->
        <div class="col-sm-10" style="margin-bottom: 4px">
            <input class="form-control" id="buscaProduto" type="text" placeholder="Busca Producto">
        </div>
        <div class="col-sm-10">
            <button type="button" class="btn btn-primary prodmenu1" data-toggle="modal" data-whatever="Nuevo Producto" data-target="#ProdCadastro" data-backdrop="static" >Nuevo</button>
            <button type="button" class="btn btn-success prodmenu1" data-toggle="modal" data-whatever="Editar Producto" data-target="#ProdCadastro" data-backdrop="static" >Editar</button>
            <button type="button" class="btn btn-warning prodmenu1" data-toggle="modal" data-whatever="Vistar Producto" data-target="#ProdCadastro" data-backdrop="static" >Vista</button>

            <button type="button" class="btn btn-danger" id='excelExport' >Exp Excel</button>
            <button type="button" class="btn btn-primary" id="ProdEtiquetaVal" >Imp1</button>
            <button type="button" class="btn btn-danger" id="ProdEtiquetaEuro" >Imp1</button>
            <!--            <button type="button" class="btn btn-danger" id='impEtiqueta' >Imprimir</button>-->
        </div>
        
    </div>

    <div class="row" style="margin-top: 5px"> <!-- grid -->
        <div class="panel panel-default">
            <!--Titulo-->
            <div class="panel-heading">
                Nova Classe
            </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <div class="form-group col-lg-2">
                                    <label>Codigo</label>
                                    <input class="form-control" id="alu_id" disabled="">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Nome </label>
                                    <input class="form-control" id="alu_nome" placeholder="Exemplo João.">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Sobrenome</label>
                                    <input class="form-control" id="alu_sobrenome" placeholder="Exemplo de Souza.">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Data Aniversário</label>
                                    <input class="form-control" id="alu_nascimento" placeholder="Exemplo 31/12/2010.">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Telefone / Whathapp</label>
                                    <input class="form-control" id="alu_telefone" placeholder="Exemplo +55 45 99972-1883.">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Responsavel</label>
                                    <input class="form-control" id="alu_resposavel" placeholder="Exemplo Nome da Mãe.">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Sexo</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Professor(a)</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Classe</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Tipo de Plano</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-lg-4">
                                    <label>E-mail</label>
                                    <input class="form-control" id="alu_email" placeholder="email@example.com.">
                                </div>
                                <div class="form-group col-lg-5">
                                    <label>Endereço</label>
                                    <input class="form-control" id="alu_endereco" placeholder="Exemplo Av Brasil.">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label>Foto</label>
                                    <input type="file">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Obs</label>
                                    <textarea class="form-control" id="alu_obs" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gravar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
        
        
        
        
        <div class="col-sm-12">
            <div id="listaProduto"></div>
            <div id="historicoCompra"></div>
        </div>
    </div>
    <!--    <div class="modal fade" id="ProdEtiqueta" style="display: none" ></div>-->
    <!-- /Inicio modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModProdEtiqueta" >
        <div class="modal-dialog" role="document" style="width: 220px; height: 180px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div style='margin-top: 10px;' id='jqxRadioButton'>
                            <span>Con Logo</span></div>
                        <div style='margin-top: 10px;' id='jqxRadioButton1'>
                            <span>Sin Logo</span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" id="myReset" class="btn btn-default">Cerrar</a>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /Fim modal -->
    <!-- /Inicio modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ProdCadastro" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="pro_imagen" src="../Fotos/error.jpg" width="150" height="150"/>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="disabledSelect">Descripción</label>
                                        <input class="form-control" id="pro_descricao" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="disabledSelect">Codigo</label>
                                        <input class="form-control" id="pro_codigo" type="text" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="disabledSelect">Marca</label>
                                        <input class="form-control" id="pro_marca" type="text" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Localización</label>
                                        <input class="form-control" id="pro_posicao" type="text">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="Prod_sair" style="display: none;">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="Prod_salvar">Guardar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /Fim modal -->
</div>

<!-- /.row -->
<div class="row">

    <!-- /.col-lg-8 
    <div class="col-lg-4">
        <img id="imgProduto" style="margin-top: 8px" height="250" width="300" src="../Fotos/error.jpg"/>
    </div>
    <!-- /.col-lg-4 -->
</div>   
</div>

<!-- /.row -->
<script type="text/javascript">



    $(document).ready(function () {

        $("#jqxRadioButton").jqxRadioButton({width: 250, height: 25});
        $("#jqxRadioButton1").jqxRadioButton({width: 250, height: 25});

        $('#ProdCadastro').on('shown.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text(recipient);
            //modal.find('.modal-title').text(recipient);
            //modal.find('.modal-body input').val(recipient);

            var id = $("#listaProduto").jqxGrid('getselectedrowindex');
            var row = $('#listaProduto').jqxGrid('getrowdata', id);

            if (row == undefined) {
                alert('selecionar producto manuel');
            } else {
                $("#pro_descricao").val(row.descricao);
                $("#pro_codigo").val(row.codigo);
                $("#pro_marca").val(row.marca);
                $("#pro_posicao").val(row.posicao);
                $("#pro_imagen").attr('src');
                img = '../Fotos/' + id;
            }

        });

        $('#pro_salvar').click(function () {
            $('#ProdCadastro').modal('hide');
        });

        $('#buscaProduto').focus();
        //$("#excelExport").jqxButton();
        //$("#pdfExport").jqxButton();
        $("#excelExport").click(function () {
            $("#listaProduto").jqxGrid('exportData', 'xls', 'lista_Produto');
        });
        $("#pdfExport").click(function () {
            $("#listaProduto").jqxGrid('exportData', 'pdf');
        });

        $('#buscaProduto').keypress(function () {
            // $(this).keypress()
            console.info($(this).val());
            ;
        });

        $('buscaProduto').keypress(function () {
            //alert( $(this).find(":selected").val() );
            console.info('teste');

            console.info($(this).val());
        });

        $('#buscaProduto').on('keypress', function (e) {
            //console.info($('#buscaProduto').val());

            var v = $('#buscaProduto').val().toUpperCase();

            if (e.keyCode == 13) {
                produto.buscaProduto(v);
            }

        });
        document.querySelector('body').addEventListener('keydown', function (event) {

            var tecla = event.keyCode;
            console.info(tecla);

            if (tecla == 13) {

                // tecla ENTER

            } else if (tecla == 27) {
                // tecla ESC
                $("#buscaProduto").val('');
                $('#buscaProduto').focus();

            } else if (tecla == 37) {

                // seta pra ESQUERDA

            } else if (tecla == 38) {

                // seta pra CIMA

            } else if (tecla == 39) {

                // seta pra DIREITA

            } else if (tecla == 40) {
                // seta pra BAIXO
                var id = $("#listaProduto").jqxGrid('getselectedrowindex');
                console.info(id);
                if (id > 0) {
                    $("#listaProduto").jqxGrid('selectrow', id);
                } else {
                    $("#listaProduto").jqxGrid('selectrow', 0);
                }
                $('#listaProduto').jqxGrid('focus');
            }

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
    $("#buscaProduto").jqxInput({placeHolder: "Busca Produto", height: 25, width: 300});
    loadjscssfile('../js/jProduto.js?nocache=' + Math.random(), 'js');
</script>