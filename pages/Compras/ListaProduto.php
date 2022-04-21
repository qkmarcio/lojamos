<style type="text/css"> 
    .jqx-widget-content .jqx-grid-cell { font-size: 10px;}
</style>
<div class="row col-sm-7"><!-- Container -->
    <div class="row"><!-- titulo -->
        <h1 class="page-header">Lista de Productos</h1>
    </div>

    <div class="row"><!-- menu -->
        <div class="col-sm-8">
            <button type="button" class="btn btn-danger" id='excelExport' >Exp Excel</button>            
            <button type="button" class="btn btn-warning" >Produto</button>
            <button type="button" class="btn btn-warning" >Prov. Agre</button>
            <button type="button" class="btn btn-warning" >Outro Prov</button>
        </div>
        <div class="col-sm-4">
            <input class="form-control" id="buscaProduto" type="text" placeholder="Busca Producto" style="display: none">
            <input class="form-control" id="Ruc" type="text">
        </div>
    </div>

    <div class="row" style="margin-top: 5px"> <!-- grid -->
        <div class="col-sm-12">
            <div id="listaProduto"></div>
            <div id="historicoCompra"></div>
        </div>
    </div>

</div>

<!-- /.row -->
<script type="text/javascript">



    $(document).ready(function () {


//        $('#buscaProduto').focus();
//        $("#excelExport").click(function () {
//            $("#listaProduto").jqxGrid('exportData', 'xls', 'lista_Produto');
//        });

        $('#Ruc').focus();
        $("#excelExport").click(function () {
           
            var c = $("#Ruc").val();
            
           var t = ruc(c);
              console.info(t);
        });
        
        function ruc (p_numero){
        var digito = p_numero.substr(9);
        
        p_numero = p_numero.substr(0,8);
        
        var v_total=0, v_resto=0, k=0, v_numero_aux=0, v_digit=0, v_numero_al="";
        p_numero = new String(""+p_numero);
        
   
        v_numero_al = p_numero;
        
        k = 2;
        v_total = 0;
        var p_basemax=11;
        
        for(var i = v_numero_al.length - 1; i >= 0; i--) {  
                k = k > p_basemax ? 2 : k;                
                v_numero_aux = v_numero_al.charAt(i);                
                v_total += v_numero_aux * k++;
        }

        v_resto = v_total % 11;
        console.info(v_total);
        v_digit = v_resto > 1 ? 11 - v_resto : 0;

        var b;
        v_digit != digito ?  b= false : b=true;
        return b;
    };

//        $('#buscaProduto').keypress(function () {
//            // $(this).keypress()
//            console.info($(this).val());
//        });



        $('#buscaProduto').on('keyup', function (e) {

            var v = $('#buscaProduto').val().toUpperCase();
            
            if(v.length > 2){
                jListaProduto.buscaProduto(v);
            }else if(e.keyCode == 8){jListaProduto.start()}
//            if (e.keyCode == 13) {
//                produto.buscaProduto(v);
//            }

        });
        document.querySelector('body').addEventListener('keydown', function (event) {

            var tecla = event.keyCode;
            //console.info(tecla);

            if (tecla == 13) {


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
    loadjscssfile('../js/jListaProduto.js?nocache=' + Math.random(), 'js');
</script>