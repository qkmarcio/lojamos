<style type="text/css">
.no-close .ui-dialog-titlebar-close {
    display: none
}

</style>

<!-- .row -->
<div class="row">
    <!-- titulo -->
    <h3 class="page-header">Lista de Alunos</h3>
</div>
<!-- /.row -->    

<!-- .row -->
<div class="row">
    <!-- menu -->
    <div class="col-sm-6" style="margin-bottom: 4px">
        <input class="form-control" id="busca_Aula" type="text" placeholder="Busca Professores">
    </div>
    <div class="col-sm-6">
        <button type="button" id="btn_Cadastro_Alunos" class="btn btn-primary" 
                data-whatever="Nova Aula"
                data-backdrop="static">Incluir</button>         
    </div>
</div>
<!-- /.row -->    

<!-- .row -->  
<div class="row " style="margin-top: 5px" >
    <!-- .panel panel-default -->
    <div class="panel panel-primary" id="Form_Cadastro_Alunos" style="display: none;" >
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>Cadastra Alunos
            
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        <div class="row">
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
            <div class="form-group col-lg-6">
                <label>Responsavel</label>
                <input class="form-control" id="alu_resposavel" placeholder="Exemplo Nome da Mãe.">
            </div>
            <div class="form-group col-lg-3">
                <label>Aniversário</label>
                <input type='date' class="form-control"  id="alu_nascimento" placeholder="Exemplo 31/12/2010.">
            </div>
            <div class="form-group col-lg-3">
                <label>Whathapp</label>
                <input class="form-control" id="alu_telefone" placeholder="Exemplo +55 45 99972-1883.">
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
            <div class="form-group col-lg-8">
                <label>Endereço</label>
                <input class="form-control" id="alu_endereco" placeholder="Exemplo Av Brasil.">
            </div>
            <div class="form-group col-lg-12">
                <label>Foto</label>
                <input type="file">
            </div>
            <div class="form-group col-lg-12">
                <label>Obs</label>
                <textarea class="form-control" id="alu_obs" rows="3"></textarea>
            </div>
        </div>   
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="btn-group">
                <button type="reset" class="btn btn-danger" id="alu_Sair" >Cancelar</button>
                <button type="submit" class="btn btn-primary" id="alu_Gravar">Gravar</button>          
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

     // Set effect from select menu value
    $( "#btn_Cadastro_Alunos" ).on( "click", function() {
        

        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
     // Run the effect
     $( "#Form_Cadastro_Alunos" ).toggle( 'blind', 500 );
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
