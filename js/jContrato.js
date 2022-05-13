var jsContrato = {};

var formCadastro;

jsContrato.mask = function () {
    $("#con_meses").mask('99');
    $("#con_valor").mask('999.999.999,99', {reverse: true, maxlength: false});
};
jsContrato.eventos = function () {

    $("#con_valor").val('000');
    $("#insert").val('insert');
    //Buscar 
    $('#inpBuscar').focus();
    $('#inpBuscar').on('change', function (evet) {

        let FData = new FormData();
        FData.set("action", "vBuscaAll");//nome da funcao no PHP
        FData.set("where", evet.target.value);//passo os campos PHP

        var json = jsContrato.ajax(FData);

        try {
            jsContrato.tableList(json);

        } catch (erro) {
            $('#ListView').empty();
        }

    });
 
    //escuta o click da class .btn-link da lista de professores
    $('table').on('click', '.btn-link', function (e) {
        var id = $(this).closest('tr').children('td:first').text();

        switch ($(this).attr("title")) {
            case 'Visualizar':
                $('.Contratos').hide("slow") //esconde a lista de contratos

                jsContrato.contrato(id);
                jsContrato.mensalida(id);

                $('.Contrato_Mesalidade').show("slow");

                break;
            case 'Editar':

                jsContrato.ListaModalidade();
                jsContrato.ListaAluno();
                jsContrato.editar(id);

                break;
            case 'Pagar':

                alert('Pagar');

                break;
            case 'Solicitar':

                alert('Solicitar');

                break;
            case 'Editar_data':

                alert('Editar_data');

                break;
            case 'Anular':

                alert('Anular');

                break;
            case 'Excluir':

                alert('Excluir');

                break;
        }


        /* if ($(this).attr("title") == 'Visualizar') {
         $('.Contratos').hide("slow") //esconde a lista de contratos
         
         jsContrato.contrato(id);
         jsContrato.mensalida(id);
         $('.Contrato_Mesalidade').show("slow");
         
         /*$(".modal-body :input").each(function () {
         $(this).attr("disabled", true);
         });
         } else {
         jsContrato.ListaModalidade();
         jsContrato.ListaAluno();
         jsContrato.editar(id);
         }*/




    });

    //Quando o Form esta show modal
    $('#formCadastro').on('shown.bs.modal', function () {
        $("#con_vencimento").focus();
        jsContrato.ValidaForm();

        if ($("#insert").val() === 'insert') {

            jsContrato.ListaModalidade();
            jsContrato.ListaAluno();
        }

    });

    //Quando o Form esta hide modal
    $('#formCadastro').on('hide.bs.modal', function () {
        $("#inpBuscar").focus();
        $('#formCadastro input,textarea,select').each(function () {
            $(this).val('');
        });

        $(".modal-body :input").each(function () {
            $(this).attr("disabled", false);
        });

        if (formCadastro.valid() == false) {
            formCadastro.destroy();
        }

        //Deixa o Form padrão para fazer o insert
        $("#insert").val('insert');
    });
};
// O submit do form que chama esta funcao
jsContrato.ValidaForm = function () {

    formCadastro = $('#formCadastro').validate({
        debug: true,
        ignore: '*:not([name])',
        rules: {
            con_vencimento: {
                required: true,
            },
            con_valor: {
                required: true
            },
            con_meses: {
                required: true
            },
            alunos_id: {
                required: true
            },
            modalidades_id: {
                required: true
            }
        },
        messages: {
            con_vencimento: "Ex 08/12/2000",
            con_valor: "Ex 250,00",
            con_meses: "2",
            alunos_id: "Luiz",
            modalidades_id: "*",
        },
        submitHandler: function (form) {
            //alert('inside');

            let Form = jsContrato.getForm();

            Form.set("action", "vCadastro"); //nome da funcao no PHP

            if (jsContrato.ajax(Form, 'vCadastro')) {
                $("#formCadastro").modal('hide');

                jsContrato.getlista();

                swal('Registo...', jsContrato.msg, 'success');
            }

        }
    });
}

jsContrato.getForm = function () {

    let FData = new FormData();
    FData.set('insert', $("#insert").val());
    FData.set('id', $("#con_id").val());
    FData.set('vencimento', $("#con_vencimento").val());
    FData.set('valor', $("#con_valor").val());
    FData.set('meses', $("#con_meses").val());
    FData.set('obs', $("#con_obs").val());
    FData.set('ativado', $("#con_ativado").val());
    FData.set('email_notificacao', $("#con_email_notificacao").val());
    FData.set('data_cadastro', $("#con_data_cadastro").val());
    FData.set('alunos_id', $("#alunos_id").val());
    FData.set('modalidades_id', $("#modalidades_id").val());

    return FData;

};

jsContrato.setForm = function (obj) {

    $("#con_id").val(obj.id);
    $("#con_vencimento").val(obj.vencimento);
    $("#con_valor").val(obj.valor);
    $("#con_meses").val(obj.meses);
    $("#con_obs").val(obj.obs);
    $("#con_ativado").val(obj.ativado);
    $("#con_email_notificacao").val(obj.email_notificacao);
    $("#con_data_cadastro").val(obj.data_cadastro);
    $("#alunos_id").val(obj.alunos_id);
    $("#modalidades_id").val(obj.modalidades_id);
};

jsContrato.tableList = function (json) {
    var linha = '';
    var dados = json.dados;
    var classe = '';

    for (var i = 0; i < dados.length; i++) {

        switch (dados[i].ativado) {
            case '0':
                classe = "label label-danger";
                ativado = "INATIVO";
                break;
            case '1':
                classe = "label label-success";
                ativado = "ATIVO";
                break;
        }

        linha += '<tr class="visualiar">' +
                '<td class="col-1 text-center">' + dados[i].id + '</td>' +
                '<td class="col-1 text-center">' + dados[i].vencimentoPT + '</td>' +
                '<td class="col-1 text-center" ><span class="' + classe + '">' + ativado + '</span> </td>' +
                '<td class="col-1 text-center">' + dados[i].data_cadastro + '</td>' +
                '<td class="col-1 text-center">' + dados[i].valor + '</td>' +
                '<td class="col-1 text-center">' + dados[i].meses + ' </td>' +
                '<td class="col-3 text-left">' + dados[i].alunos_nome + ' </td>' +
                '<td class="col-2 text-left">' + dados[i].modalidades_nome + ' </td>' +
                '<td class="col-1 text-center" style="min-width: 100px;">\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Visualizar"></i>\n\
                    <i class="btn-link fa bi-pencil-square fa-lg" title="Editar"></i>\n\
                </td>' +
                '</tr>';
    }

    $('#ListView').empty();
    $('#ListView').append(linha);
};

jsContrato.tableList_Contrato = function (json) {
    var linha = '';
    var dados = json.dados;
    var classe = '';

    for (var i = 0; i < dados.length; i++) {

        switch (dados[i].ativado) {
            case '0':
                classe = "label label-danger";
                ativado = "INATIVO";
                break;
            case '1':
                classe = "label label-success";
                ativado = "ATIVO";
                break;
        }

        linha += '<tr class="visualiar">' +
                '<td class="col-1 text-center">' + dados[i].id + '</td>' +
                '<td class="col-1 text-center">' + dados[i].vencimentoPT + '</td>' +
                '<td class="col-1 text-center" ><span class="' + classe + '">' + ativado + '</span> </td>' +
                '<td class="col-1 text-center">' + dados[i].data_cadastro + '</td>' +
                '<td class="col-1 text-center">' + dados[i].valor + '</td>' +
                '<td class="col-1 text-center">' + dados[i].meses + ' </td>' +
                '<td class="col-3 text-left">' + dados[i].alunos_nome + ' </td>' +
                '<td class="col-2 text-left">' + dados[i].modalidades_nome + ' </td>' +
                '<td class="col-1 text-center" style="min-width: 100px;">\n\
                    <i class="btn-link fa bi-pencil-square fa-lg" title="Editar"></i>\n\
                </td>' +
                '</tr>';
    }

    $('#Contrato_ListView').empty();
    $('#Contrato_ListView').append(linha);
};

jsContrato.tableList_Mensalidade = function (json) {
    var linha = '';
    var dados = json.dados;
    var classe = '';

    for (var i = 0; i < dados.length; i++) {

        switch (dados[i].status) {
            case '0':
                classe = "text-danger";
                ativado = "Pendente";
                break;
            case '1':
                classe = "text-primary";
                ativado = " Pago Parcial";
                break;
            case '3':
                classe = "text-green";
                ativado = " Pago Concluido";
                break;
        }

        linha += '<tr class="visualiar">' +
                '<td class="col-1 text-center">' + dados[i].id + '</td>' +
                '<td class="col-1 text-center">' + dados[i].vencimento + '</td>' +
                '<td class="col-1 text-center">' + dados[i].data_pago + '</td>' +
                '<td class="col-2 text-center" ><p class="' + classe + '">' + ativado + '</p> </td>' +
                '<td class="col-1 text-center">' + dados[i].valor + '</td>' +
                '<td class="col-1 text-center">' + dados[i].valor_pago + '</td>' +
                '<td class="col-2 text-center">' + dados[i].modalidade_nome + ' </td>' +
                '<td class="col-2 text-center" style="min-width: 100px;">\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Pagar"></i>\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Solicitar"></i>\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Editar_data"></i>\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Anular"></i>\n\
                    <i class="btn-link fa bi-pencil-square fa-lg" title="Excluir"></i>\n\
                </td>' +
                '</tr>';
    }

    $('#Mesalidade_ListView').empty();
    $('#Mesalidade_ListView').append(linha);
};

jsContrato.getlista = function () {

    let FData = new FormData();
    FData.set("action", "vListaAll");//nome da funcao no PHP

    var json = jsContrato.ajax(FData);

    try {
        jsContrato.tableList(json);

    } catch (erro) {
        $('#ListView').empty();
        //$('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
    }
};

jsContrato.salvar = function () {

    let Form = jsContrato.getForm();

    Form.set("action", "vCadastro"); //nome da funcao no PHP

    if (jsContrato.ajax(Form, 'vCadastro')) {
        $("#formCadastro").modal('hide');

        jsContrato.getlista();

        swal('Registo...', jsContrato.msg, 'success');
    }
};

jsContrato.editar = function (id) {

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP
    FData.set("where", "where con_id=" + id);//passo os campos PHP

    var json = jsContrato.ajax(FData, 'vLocalizar');

    jsContrato.setForm(json.dados[0]);

    $(".modal-title").text('Editar Cadastro');
    $("#insert").val('update')
    $("#formCadastro").modal("show");
};

jsContrato.contrato = function (id) {

    let FData = new FormData();
    FData.set("action", "vListaAll");//nome da funcao no PHP
    FData.set("where", "where con_id=" + id);//passo os campos PHP

    let json = jsContrato.ajax(FData);
    jsContrato.tableList_Contrato(json);

};

jsContrato.mensalida = function (id) {

    let FData = new FormData();
    FData.set("action", "vListaAll");//nome da funcao no PHP
    FData.set("where", "where contratos_id=" + id);//passo os campos PHP

    let json = jsContrato.ajax(FData, null, '../view/vMensalidade.php');
    jsContrato.tableList_Mensalidade(json);

};

jsContrato.ListaModalidade = function () {
    $('#modalidades_id').empty();
    $("#modalidades_id").append(new Option('', ''));

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP

    var json = jsContrato.ajax(FData, null, '../view/vModalidade.php');
    var dados = json.dados;
    for (var i = 0; i < json.total; i++) {
        $("#modalidades_id").append(new Option(dados[i].nome, dados[i].id));
    }
    //$('#aul_prof_id').val(id);
};

jsContrato.ListaAluno = function () {
    $('#alunos_id').empty();
    $("#alunos_id").append(new Option('', ''));
    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP

    var json = jsContrato.ajax(FData, null, '../view/vAluno.php');
    var dados = json.dados;
    for (var i = 0; i < json.total; i++) {
        $("#alunos_id").append(new Option(dados[i].nome, dados[i].id));
    }
    //$('#aul_prof_id').val(id);
};

jsContrato.ajax = function (FormData, action, v) {
    var view = v == null ? '../view/vContrato.php' : v;
    var retorno;
    $.ajax({
        url: view, type: "POST", data: FormData, dataType: "json", async: false, processData: false, contentType: false,
        success: function (php) {
            jsContrato.msg = php.messages;
            retorno = php;
        },
        error: function (php) {
            //debugger;
            //var responseText = JSON.parse(php.responseText);
            jsContrato.msg = php.responseText;
            swal('Oops...', jsContrato.msg, 'error');

            retorno = false;
        }
    });
    return retorno;

};
jsContrato.start = function () {
    jsContrato.eventos();
    jsContrato.mask();
    jsContrato.getlista();

};

jsContrato.start();