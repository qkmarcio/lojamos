var jsAluno = {};

jsAluno.arrayIntegrantes = new Array();

jsAluno.start = function () { jsAluno.eventos(); };
jsAluno.mask = function () {
    $("#gru_hot_saida").mask('00/00/0000');
    $("#gru_hot_entrada").mask('00/00/0000');
    $("#mov_dataIn").mask('00/00/0000 - 00:00');
    $("#mov_dataOut").mask('00/00/0000 - 00:00');
    $("#pas_nascimento").mask('00/00/0000');
};

jsAluno.eventos = function () {
    //jsAluno.getlista();
    //jsAluno.mask();
    //jsAluno.autoGuia();
    //jsAluno.autoHotel();
    //jsAluno.autoMotorista();
    $("#buscar_professor").focus();
    
    $('#formCadProfessor').on('shown.bs.modal', function () {
        $("#prof_nome").focus();
    });
    $('#formCadProfessor').on('hidden.bs.modal', function () {
        $("#buscar_professor").focus();
        $('#formCadProfessor input,textarea').each(function(){
            $(this).val('');
        });
    });


    $('#pss_Salvar').click(function () { jsAluno.regIntegrantes(); });
    $('#PassageiroNovoEditar').focus(function () { $('#pas_nome').focus(); }); // dar focus na segunda tela
    //$('#btMaisIntegrante').click(function(){ jsAluno.addCampoIntegrante(); });
};

/*jsAluno.addCampoIntegrante=function(){
    var linha = jsAluno.getNovaLinha();
    $('.divCadastroIntegrante').append(linha);
};*/

jsAluno.regIntegrantes = function () {
    var obj = new Object();                 // NOVO OBJETO
    obj.pas_nome = $('#pas_nome').val();
    obj.pas_nascimento = $('#pas_nascimento').val();
    obj.pas_documento = $('#pas_documento').val();
    obj.mov_tipoIn = $('#mov_tipoIn :selected').text();
    obj.mov_transporteIn = $('#mov_transporteIn').val();
    obj.mov_dataIn = $('#mov_dataIn').val();
    obj.mov_tipoOut = $('#mov_tipoOut :selected').text();
    obj.mov_transporteOut = $('#mov_transporteOut').val();
    obj.mov_dataOut = $('#mov_dataOut').val();
    jsAluno.arrayIntegrantes.push(obj);     // ADD O OBJETO DENTRO DO ARRAY

    //apagar campos que nao irá se repetir num proximo cadastro
    $('#pas_nome').val('');
    $('#pas_nascimento').val('');
    $('#pas_documento').val('');
    $('#voltar').click();  //  FECHAR A JANELA DO CADASTRO DE PASSAGEIRO

    jsAluno.listarPassageiros();
};

jsAluno.listarPassageiros = function () {
    $('#integrantes').val('');
    for (var i = 0; i < jsAluno.arrayIntegrantes.length; i++) {
        var obj = jsAluno.arrayIntegrantes[i];
        var v = $('#integrantes').val();
        $('#integrantes').val(v + obj.pas_nome + '\n');
    }
};

/*jsAluno.getNovaLinha=function(){
    var linha = $('.linha:first').clone();  // PEGA O PRIMEIRO ELEMENTO COM CLASS=LINHA E CLONA
    linha.find('.nome').val('');            // LIMPA O NOME
    linha.find('.id').val('');              // LIMPA O ID
    return linha;                           // DEVOLVE NOVO ELEMENTO
};*/

jsAluno.autoGuia = function () {
    main.autocomplet($('#guia_nome'), 'guia_nome', 'buscaNome', 'view/vGuia.php');
    main.autocomplet.retorno = function (obj) { console.info(obj.guia_id); $("#guia_id").val(obj.guia_id); };
};

jsAluno.autoMotorista = function () {
    main.autocomplet($('#mot_nome'), 'mot_nome', 'buscaNome', 'view/vMotorista.php');
    var obj = main.objRetorno;
    $("#mot_id").val(obj.guia_id);
};

jsAluno.autoHotel = function () {
    main.autocomplet($('#hot_nome'), 'hot_nome', 'buscaNome', 'view/vHotel.php');
    var obj = main.objRetorno;
    $("#hot_id").val(obj.guia_id);
};

jsAluno.informe = function (msg) {
    $("#msg").text(msg);
    $("#dialog").dialog({
        with: 300, height: 150,
        modal: true, buttons: {
            Ok: function () {
                $("#dialog").dialog("close");
                $("#btVoltar").click();
            }
        }
    });
};

jsAluno.ajax = function (obj, funcao, v) {
    var view = v == null ? 'view/vGrupo.php' : v;
    var data = { 'obj': obj, 'action': funcao };
    var retorno;
    $.ajax({
        type: "POST", url: view, dataType: "json", data: data, async: false,
        success: function (json) {
            retorno = json;
        },
        error: function () {
            retorno = null;
        }
    });
    return retorno;
};

jsAluno.getForm = function () {
    var obj = new Object();
    obj.alu_id = $("#alu_id").val();
    obj.alu_nome = $("#alu_nome").val();
    obj.alu_sobrenome = $("#alu_sobrenome").val();
    obj.alu_nascimento = $("#alu_nascimento").val();
    obj.alu_telefone = $("#alu_telefone").val();
    obj.alu_resposavel = $("#alu_resposavel").val();
    obj.alu_sexo = $("#alu_sexo").val();
    obj.alu_email = $("#alu_email").val();
    obj.alu_endereco = $("#alu_endereco").val();
    obj.alu_obs = $("#alu_obs").val();
    obj.alu_senha = $("#alu_senha").val();
    obj.alu_ativado = $("#alu_ativado").val();
    obj.alu_data_cadastro = $("#alu_data_cadastro").val();
    obj.alu_foto = $("#alu_foto").val();
    obj.alu_mensalidade = $("#alu_mensalidade").val();
    obj.alu_mensalidade_venc = $("#alu_mensalidade_venc").val();
    obj.alu_aul_id = $("#alu_aul_id").val();
    obj.alu_prof_id = $("#alu_prof_id").val();

    return obj;
};

jsAluno.setForm = function (obj) {
    $("#alu_id").val(obj.alu_id);
    $("#alu_nome").val(obj.alu_nome);
    $("#alu_sobrenome").val(obj.alu_sobrenome);
    $("#alu_nascimento").val(obj.alu_nascimento);
    $("#alu_telefone").val(obj.alu_telefone);
    $("#alu_resposavel").val(obj.alu_resposavel);
    $("#alu_sexo").val(obj.alu_sexo);
    $("#alu_email").val(obj.alu_email);
    $("#alu_endereco").val(obj.alu_endereco);
    $("#alu_obs").val(obj.alu_obs);
    $("#alu_senha").val(obj.alu_senha);
    $("#alu_ativado").val(obj.alu_ativado);
    $("#alu_data_cadastro").val(obj.alu_data_cadastro);
    $("#alu_foto").val(obj.alu_foto);
    $("#alu_mensalidade").val(obj.alu_mensalidade);
    $("#alu_mensalidade_venc").val(obj.alu_mensalidade_venc);
    $("#alu_aul_id").val(obj.alu_aul_id);
    $("#alu_prof_id").val(obj.alu_prof_id);
};

jsAluno.getlista = function () {
    var obj = new Object();
    obj.gru_nome = 'gru_nome';
    var json = jsAluno.ajax(obj, 'fetchAll');

    try {
        main.listarNaTable($('#listaGrupo'), json.data, true);
        jsAluno.eventosDaTable();
        //jsAluno.paginacao();
    } catch (erro) {
        $('#listaGrupo').empty();
        $('#listaGrupo').append("<div colspan='2' style='height:13px;padding-top: 20px'>GRUPOS NÃO LOCALIZADO !</div>");
    }
};

jsAluno.salvar = function () {
    var obj = this.getDoForm();

    obj.arrayIntegrantes = jsAluno.arrayIntegrantes; // ADD INTEGRANTES NO SUBMIT
    console.info(obj);
    if (obj.gru_id == "") {
        var fun = 'insert';
    } else {
        fun = 'update';
    }
    var json = jsAluno.ajax(obj, fun); //!= null ? jsAluno.confirmacao(fun,1):jsAluno.confirmacao(fun,2) //alert("REGISTRADO COM SUCESSO!"): alert("ERRO AO GRAVAR");    

    $("#GrupoNovoEditar").modal('hide');
    jsAluno.getlista();
    $("#infoText").text(json.message);
    $("#infoModal").modal();
    jsAluno.arrayIntegrantes = new Array(); // limpa o array depois de inserir tudo
};

jsAluno.confirmacao = function (a, b) {
    if (a == "update") {
        if (b == 1) {
            var msg = "REGISTRO EDITADO COM SUCESSO!";
        } else { msg = "ERRO AO EDITAR REGISTRO!"; }
    } else {
        if (b == 1) {
            msg = "REGISTRADO COM SUCESSO!";
        } else { msg = "ERRO AO REGISTRAR!"; }
    }
    $("#infoText").text(msg);
    $("#infoModal").modal();
}

jsAluno.editar = function (gru_id) {
    var obj = new Object();
    obj.gru_id = gru_id;
    var json = jsAluno.ajax(obj, 'buscaid');
    jsAluno.setDoForm(json.data[0]);
    $("#titulo").text('Editar Cadastro');
    $("#GrupoNovoEditar").modal();
    jsAluno.mask();
};

jsAluno.eventosDaTable = function () {
    $('#listaGrupo tr').each(function () {
        var codigo;
        $('td', $(this)).each(function (index, item) {
            if (index === 0) { codigo = $(item).text(); }
        });
        $(this).click(function () { jsAluno.editar(codigo); }).css('cursor', 'pointer');
    });
};
jsAluno.guia = function () {
    var json = jsAluno.ajax('', 'getGuia');
    fo
}

jsAluno.paginacao = function () {
    $("table")
        .tablesorter({
            dateFormat: 'uk',
            headers: {
                0: {
                    sorter: false
                },
                5: {
                    sorter: false
                }
            }
        })
        .tablesorterPager({ container: $("#pager") });
}
jsAluno.start();


