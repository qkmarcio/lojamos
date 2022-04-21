var jsProfessor = {};
jsProfessor.FData = new FormData();

jsProfessor.mask = function () {
    $("#gru_hot_saida").mask('00/00/0000');
    $("#gru_hot_entrada").mask('00/00/0000');
    $("#mov_dataIn").mask('00/00/0000 - 00:00');
    $("#mov_dataOut").mask('00/00/0000 - 00:00');
    $("#prof_telefone").mask('(45) 99972-1883');
};
//carrega a foto antes de gravar
jsProfessor.showThumbnail = function (files) {
    if (files && files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#thumbnail').attr('src', e.target.result);
        }

        reader.readAsDataURL(files[0]);
    }
}
jsProfessor.eventos = function () {

    jsProfessor.getlista();
    //jsProfessor.mask();
    $('#buscar').focus();

    //Faz a Chamada para Editar
//
//    $('.rounded-circle').on('click', function (e) {
//        //debugger;
//        $(".custom-file-input").click();
//
//    });
    $('#thumbnail').on('click', function (e) {
        $("#prof_foto").click();
    });

    $('#prof_foto').change(function (e) {
        //showThumbnail(this.files);
        var img = $('#prof_foto')[0];
        debugger;
        console.log(img[0]);
        if (img.files.length <= 0) {
            return;
        }
        let reader = new FileReader();
        reader.onload = function (e) {
            
            $('#thumbnail').attr('src', e.target.result);
        };
        reader.readAsDataURL(img.files[0]);

//        if (files && files[0]) {
//        var reader = new FileReader();
//
//        reader.onload = function (e) {
//            $('#thumbnail').attr('src', e.target.result);
//        }
//
//        reader.readAsDataURL(files[0]);
//    }
    });

    //escuta o click da class .btn-link da lista de professores
    $('table').on('click', '.btn-link', function (e) {

        var id = $(this).closest('tr').children('td:first').text();
        jsProfessor.editar(id);
    });

    //Quando o Form esta show modal
    $('#formCadastro').on('shown.bs.modal', function () {
        $("#prof_nome").focus();
    });

    //Quando o Form esta hide modal
    $('#formCadastro').on('hidden.bs.modal', function () {
        $("#buscar").focus();
        $('#formCadastro input,textarea').each(function () {
            $(this).val('');
        });
        //Deixa o Form padrão para fazer o insert
        $("#insert").val('insert');
        $('#thumbnail').attr('src',"../Fotos/semfoto.jpg");
    });

    //Grava um novo Registro ou Altera if $("#insert").val() esta com update
    $('#Gravar').click(function () {
        jsProfessor.salvar();
    });
};

jsProfessor.listarPassageiros = function () {
    $('#integrantes').val('');
    for (var i = 0; i < jsProfessor.arrayIntegrantes.length; i++) {
        var obj = jsProfessor.arrayIntegrantes[i];
        var v = $('#integrantes').val();
        $('#integrantes').val(v + obj.pas_nome + '\n');
    }
};

/*jsProfessor.getNovaLinha=function(){
 var linha = $('.linha:first').clone();  // PEGA O PRIMEIRO ELEMENTO COM CLASS=LINHA E CLONA
 linha.find('.nome').val('');            // LIMPA O NOME
 linha.find('.id').val('');              // LIMPA O ID
 return linha;                           // DEVOLVE NOVO ELEMENTO
 };*/



jsProfessor.informe = function (msg) {
    $("#msg").text(msg);
    $("#dialog").dialog({
        with : 300, height: 150,
        modal: true, buttons: {
            Ok: function () {
                $("#dialog").dialog("close");
                $("#btVoltar").click();
            }
        }
    });
};

jsProfessor.getForm = function () {
    //var FormData = new FormData();
    jsProfessor.FData.set('insert', $("#insert").val());
    jsProfessor.FData.set('id', $("#prof_id").val());
    jsProfessor.FData.set('nome', $("#prof_nome").val());
    jsProfessor.FData.set('sobrenome', $("#prof_sobrenome").val());
    jsProfessor.FData.set('nascimento', $("#prof_nascimento").val());
    jsProfessor.FData.set('telefone', $("#prof_telefone").val());
    jsProfessor.FData.set('sexo', $("#prof_sexo").val());
    jsProfessor.FData.set('email', $("#prof_email").val());
    jsProfessor.FData.set('endereco', $("#prof_endereco").val());
    jsProfessor.FData.set('obs', $("#prof_obs").val());
    jsProfessor.FData.set('senha', $("#prof_senha").val());
    jsProfessor.FData.set('ativado', $("#prof_ativado").val());
    jsProfessor.FData.set('comissao', $("#prof_comissao").val());
    jsProfessor.FData.set('foto', $("#prof_foto")[0].files[0]);


//
//
//
//    var obj = new Object();
//    obj.insert = $("#insert").val();
//    obj.id = $("#prof_id").val();
//    obj.nome = $("#prof_nome").val();
//    obj.sobrenome = $("#prof_sobrenome").val();
//    obj.nascimento = $("#prof_nascimento").val();
//    obj.telefone = $("#prof_telefone").val();
//    obj.sexo = $("#prof_sexo").val();
//    obj.email = $("#prof_email").val();
//    obj.endereco = $("#prof_endereco").val();
//    obj.obs = $("#prof_obs").val();
//    obj.senha = $("#prof_senha").val();
//    obj.ativado = $("#prof_ativado").val();
//    obj.comissao = $("#prof_comissao").val();


    return jsProfessor.FData;
};

jsProfessor.setForm = function (obj) {
    $("#prof_id").val(obj.id);
    $("#prof_nome").val(obj.nome);
    $("#prof_sobrenome").val(obj.sobrenome);
    $("#prof_nascimento").val(obj.nascimento);
    $("#prof_telefone").val(obj.telefone);
    $("#prof_sexo").val(obj.sexo);
    $("#prof_email").val(obj.email);
    $("#prof_endereco").val(obj.endereco);
    $("#prof_obs").val(obj.obs);
    $("#prof_senha").val(obj.senha);
    $("#prof_ativado").val(obj.ativado);
    $("#prof_comissao").val(obj.comissao);
    $("#prof_foto").val(obj.foto);
};

jsProfessor.tableList = function (json) {
    var linha = '';
    var dados = json.dados;

    for (var i = 0; i < dados.length; i++) {

        var classe = "label label-danger";

        if (dados[i].ativado === "ATIVO") {
            classe = "label label-success";
        }

        linha += '<tr class="visualiar">' +
                '<td class="col-1 text-center">' + dados[i].id + '</td>' +
                '<td class="col-3 text-left">' + dados[i].nome + ' ' + dados[i].sobrenome + '</td>' +
                '<td class="col-2 text-left">' + dados[i].telefone + ' </td>' +
                '<td class="col-3 text-left">' + dados[i].email + ' </td>' +
                '<td class="col-2 text-center" ><span class="' + classe + '">' + dados[i].ativado + '</span> </td>' +
                '<td class="col-1 text-center" ><i class="btn-link fa fa-edit fa-lg"></i></td>' +
                '</tr>';
    }

    $('#ListView').empty();
    $('#ListView').append(linha);
};

jsProfessor.getlista = function () {
//    var obj = new Object();
//    obj.nome = 'prof_nome';

    //var FData = new FormData();
    //nome da funcao no PHP
    jsProfessor.FData.set("action", "vListaAll");

    var json = jsProfessor.ajax(jsProfessor.FData);

    try {
        jsProfessor.tableList(json);

//        records = json.dados;
//        console.log(records);
//        totalRecords = json.total;
//        totalPages = Math.ceil(totalRecords / recPerPage);
//        jsProfessor.apply_pagination();

    } catch (erro) {
        $('#ListView').empty();
        $('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
    }
};

jsProfessor.salvar = function () {
    //var Form = jsProfessor.getForm();

    if (jsProfessor.ajax(jsProfessor.getForm(), 'vCadastro')) {
        $("#formCadastro").modal('hide');

        jsProfessor.getlista();

        swal('Registo...', jsProfessor.msg, 'success');
    }
};

jsProfessor.editar = function (id) {
//    var obj = new Object();
//    obj.where = " where prof_id=" + id;

    //nome da funcao no PHP
    jsProfessor.FData.set("action", "vLocalizar");
    //passo os campos PHP
    jsProfessor.FData.set("where", "where prof_id=" + id);

    var json = jsProfessor.ajax(jsProfessor.FData, 'vLocalizar');

    jsProfessor.setForm(json.dados[0]);

    $(".modal-title").text('Editar Cadastro');
    $("#insert").val('update')
    $("#formCadastro").modal("show");
    //jsProfessor.mask();
};
//
//jsProfessor.eventosDaTable = function () {
//
//    $('#ListView tr').each(function () {
//        var codigo;
//        $('td', $(this)).each(function (index, item) {
//            if (index === 0) {
//                codigo = $(item).text();
//            }
//        });
//        $(this).click(function () {
//            jsProfessor.editar(codigo);
//        }).css('cursor', 'pointer');
//    });
//};

//jsProfessor.apply_pagination = function () {
//    jsProfessor.pagination.twbsPagination({
//        totalPages: totalPages,
//        visiblePages: 6,
//        onPageClick: function (event, page) {
//            displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
//            endRec = (displayRecordsIndex) + recPerPage;
//            //console.log(displayRecordsIndex + 'ssssssssss' + endRec);
//            displayRecords = records.slice(displayRecordsIndex, endRec);
//            jsProfessor.generate_table();
//        }
//    });
//};

//jsProfessor.generate_table = function () {
//    var tr;
//
//    $('#ListView').html('');
//    for (var i = 0; i < displayRecords.length; i++) {
//
//        var classe = "label label-danger";
//
//        if (displayRecords[i].ativado === "ATIVO") {
//            classe = "label label-success";
//        }
//
//        tr = $('<tr/>');
//        tr.append("<td class='col-1'>" + displayRecords[i].id + "</td>");
//        tr.append("<td class='col-4'>>" + displayRecords[i].nome + " " + displayRecords[i].sobrenome + "</td>");
//        tr.append("<td class='col-3'>>" + displayRecords[i].telefone + "</td>");
//        tr.append("<td class='col-2'>>" + displayRecords[i].email + "</td>");
//        tr.append("<td class='col-1'>><span class='" + classe + "' >" + displayRecords[i].ativado + "</span> </td>");
//        tr.append("<td class='col-1'>><i class='btn-editar btn-link fa fa-edit fa-lg'></i></td>");
//        $('#ListView').append(tr);
//    }
//
//};

//jsProfessor.arrayIntegrantes = new Array();

//Define a paginação da tabela
//jsProfessor.pagination = $('#pagination'),
//        totalRecords = 0, records = [],
//        displayRecords = [],
//        recPerPage = 3,
//        page = 1,
//        totalPages = 0;

jsProfessor.ajax = function (FormData, action, v) {
    var view = v == null ? '../view/vProfessor.php' : v;
    //var data = {'obj': obj, 'action': action};
    var retorno;
    $.ajax({
        url: view, type: "POST", data: FormData, dataType: "json", async: false, processData: false, contentType: false,
        success: function (php) {
            /*var responseText = JSON.parse(php.responseText);
             jsProfessor.msg = responseText;*/
            jsProfessor.msg = php.messages;
            retorno = php;
        },
        error: function (php) {
            var responseText = JSON.parse(php.responseText);
            jsProfessor.msg = responseText.messages;
            swal('Oops...', jsProfessor.msg, 'error');

            retorno = false;
        }
    });
    return retorno;

};
jsProfessor.start = function () {
    jsProfessor.eventos();
};
jsProfessor.start();


