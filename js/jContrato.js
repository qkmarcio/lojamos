var jsContrato = {};

var formCadastro;

jsContrato.eventos = function () {

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
            //$('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
        }

        console.log(evet.target.value);
    });

    //escuta o click da class .btn-link da lista de professores
    $('table').on('click', '.btn-link', function (e) {
        var id = $(this).closest('tr').children('td:first').text();

        if ($(this).attr("title") == 'Visualizar') {
            $(".modal-body :input").each(function () {
                $(this).attr("disabled", true);
            });
        }


        jsContrato.ListaModalidade();

        jsContrato.editar(id);
    });

    //Quando o Form esta show modal
    $('#formCadastro').on('shown.bs.modal', function () {
        $("#aul_nome").focus();
        jsContrato.ValidaForm();

        if ($("#insert").val() === 'insert') {
            jsContrato.ListaProfessor();
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
            aul_nome: {
                required: true,
                minlength: 3
            },
            aul_horario: {
                required: true
            },
            aul_dia: {
                required: true
            },
            aul_prof_id: {
                required: true
            },
        },
        messages: {
            aul_nome: {
                required: "Coloque um nome",
                minlength: "Seu nome deve consistir em pelo menos 3 caracteres"
            },
            aul_horario: {
                required: "Marque um Horario"
            },
            aul_dia: {
                required: "Selecione um Dia"
            },
            aul_prof_id: {
                required: "Selecione um Professor"
            }
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
    FData.set('id', $("#aul_id").val());
    FData.set('nome', $("#aul_nome").val());
    FData.set('horario', $("#aul_horario").val());
    FData.set('dia_semana', $("#aul_dia").val());
    FData.set('comissao', 0);
    FData.set('ativado', '1');
    FData.set('prof_id', $("#aul_prof_id").val());
    FData.set('obs', $("#aul_obs").val());

    return FData;

};

jsContrato.setForm = function (obj) {
    $("#aul_id").val(obj.id);
    $("#aul_nome").val(obj.nome);
    $("#aul_horario").val(obj.horario);
    $("#aul_dia").val(obj.dia_semana);
    $("#aul_prof_id").val(obj.prof_id);
    $("#aul_obs").val(obj.obs);
};

jsContrato.tableList = function (json) {
    var linha = '';
    var dados = json.dados;
    var classe = '';

    for (var i = 0; i < dados.length; i++) {

        switch (dados[i].dia_semana) {
            case 'SEGUNDA':
                classe = "label label-primary";
                break;
            case 'TERÇA':
                classe = "label label-info";
                break;
            case 'QUARTA':
                classe = "label label-danger";
                break;
            case 'QUINTA':
                classe = "label label-success";
                break;
            case 'SEXTA':
                classe = "label label-warning";
                break;
            default:
                classe = "label label-default";
        }

        linha += '<tr class="visualiar">' +
                '<td class="col-1 text-center">' + dados[i].id + '</td>' +
                '<td class="col-2 text-left">' + dados[i].nome + '</td>' +
                '<td class="col-3 text-left">' + dados[i].prof_nome + ' </td>' +
                '<td class="col-2 text-center" ><span class="' + classe + '">' + dados[i].dia_semana + '</span> </td>' +
                '<td class="col-2 text-left">' + dados[i].horario + ' </td>' +
                '<td class="col-2 text-center" style="min-width: 100px;">\n\
                    <i class="btn-link fa bi-eye fa-lg" title="Visualizar"></i>\n\
                    <i class="btn-link fa bi-pencil-square fa-lg" title="Editar"></i>\n\
                </td>' +
                '</tr>';
    }

    $('#ListView').empty();
    $('#ListView').append(linha);
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
    FData.set("where", "where aul_id=" + id);//passo os campos PHP

    var json = jsContrato.ajax(FData, 'vLocalizar');

    jsContrato.setForm(json.dados[0]);

    $(".modal-title").text('Editar Cadastro');
    $("#insert").val('update')
    $("#formCadastro").modal("show");
};

jsContrato.ListaModalidade = function () {
    $('#modalidade_id').empty();

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP

    var json = jsContrato.ajax(FData, null, '../view/vModalidade.php');
    var dados = json.dados;
    for (var i = 0; i < json.total; i++) {
        $("#modalidade_id").append(new Option(dados[i].nome , dados[i].id));
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
    jsContrato.getlista();

};

jsContrato.start();