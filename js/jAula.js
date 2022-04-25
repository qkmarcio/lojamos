var jsAula = {};

var formCadastro;

jsAula.mask = function () {
    //$('input:text').setMask();
    //$("#prof_telefone").masks('(00) 00000-0000');
};

$('#image-file').on('change', function () {
    console.log('This file size is: ' + this.files[0].size / 1024 / 1024 + "MiB");
});

$('#inpBuscar').on('change', function (evet) {
    
    let FData = new FormData();
    FData.set("action", "vBuscaAll");//nome da funcao no PHP
    FData.set("where", evet.target.value );//passo os campos PHP

    var json = jsAula.ajax(FData);

    try {
        jsAula.tableList(json);

    } catch (erro) {
        $('#ListView').empty();
        $('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
    }
    
    console.log(evet.target.value);
});

jsAula.eventos = function () {
    //$('input:text').setMask();
    $("#prof_telefone").mask('(99) 99999-9999');
    $("#prof_comissao").mask('99.999');
    
    jsAula.getlista();

    $('#inpBuscar').focus();

    //Faz a Chamada para Editar
    $('#thumbnail').on('click', function (e) {
        $("#prof_foto").click();
    });

    $('#prof_foto').change(function (e) {
        var img = e.target.files
        if (img.length <= 0) {
            return;
        } else {
            if (img[0].size >= 2306867) {
                swal('Oops...', 'Imagem muito grande!! Max: 2MB', 'info');
                e.target.value = '';
            } else {
                let reader = new FileReader();
                reader.onload = function (evt) {
                    $('#thumbnail').attr('src', evt.target.result);
                }
                reader.readAsDataURL(img[0]);
            }
        }

    });

    //escuta o click da class .btn-link da lista de professores
    $('table').on('click', '.btn-link', function (e) {
        var id = $(this).closest('tr').children('td:first').text();
        jsAula.editar(id);
    });

    //Quando o Form esta show modal
    $('#formCadastro').on('shown.bs.modal', function () {
        $("#prof_nome").focus();
        jsAula.ValidaForm();
    });

    //Quando o Form esta hide modal
    $('#formCadastro').on('hide.bs.modal', function () {
        $("#inpBuscar").focus();
        $('#formCadastro input,textarea').each(function () {
            $(this).val('');
        });
            
        if (formCadastro.valid() == false) {
            formCadastro.destroy();
        }

        //Deixa o Form padrão para fazer o insert
        $("#insert").val('insert');
        $('#thumbnail').attr('src', "../Fotos/semfoto.jpg");
    });

    //Grava um novo Registro ou Altera if $("#insert").val() esta com update
//    $('#Gravar').click(function () {
//    //vai para o js
//    });

//    $('#formCadastro').on("submit", function (event) {
//        $form = $(this); //wrap this in jQuery
//        console.log(formCadastro.validate().form());
//    });
};

jsAula.listarPassageiros = function () {
    $('#integrantes').val('');
    for (var i = 0; i < jsAula.arrayIntegrantes.length; i++) {
        var obj = jsAula.arrayIntegrantes[i];
        var v = $('#integrantes').val();
        $('#integrantes').val(v + obj.pas_nome + '\n');
    }
};
// O submit do form que chama esta funcao
jsAula.ValidaForm = function () {

    formCadastro = $('#formCadastro').validate({
        debug: true,
        ignore: '*:not([name])',
        rules: {
            prof_nome: {
                required: true,
                minlength: 3
            },
            prof_sobrenome: {
                required: true,
                minlength: 3
            },
            prof_email: {
                required: true,
                email: true
            }
        },
        messages: {
            prof_nome: {
                required: "Coloque um nome",
                minlength: "Seu nome deve consistir em pelo menos 3 caracteres"
            },
            prof_sobrenome: {
                required: "Por favor coloque um Sobrenome",
                minlength: "Seu Sobrenome deve consistir em pelo menos 3 caracteres"
            },
            prof_email: "Coloque um email valido"
        },
        submitHandler: function (form) {
            //alert('inside');

            let Form = jsAula.getForm();

            Form.set("action", "vCadastro"); //nome da funcao no PHP

            if (jsAula.ajax(Form, 'vCadastro')) {
                $("#formCadastro").modal('hide');

                jsAula.getlista();

                swal('Registo...', jsAula.msg, 'success');
            }

        }
    });
}

jsAula.getForm = function () {

    let FData = new FormData();
    FData.set('insert', $("#insert").val());
    FData.set('id', $("#prof_id").val());
    FData.set('nome', $("#prof_nome").val());
    FData.set('sobrenome', $("#prof_sobrenome").val());
    FData.set('nascimento', $("#prof_nascimento").val());
    FData.set('telefone', $("#prof_telefone").val());
    FData.set('sexo', $("#prof_sexo").val());
    FData.set('email', $("#prof_email").val());
    FData.set('endereco', $("#prof_endereco").val());
    FData.set('obs', $("#prof_obs").val());
    FData.set('senha', $("#prof_senha").val());
    FData.set('ativado', $("#prof_ativado").val());
    FData.set('comissao', $("#prof_comissao").val());
    FData.set('foto', $("#prof_foto")[0].files[0]);
    FData.set('foto2', $("#thumbnail").attr('src'));

    return FData;

};

jsAula.setForm = function (obj) {
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
    $('#thumbnail').attr('src', obj.foto);
    //$("#prof_foto").val(obj.foto);
};

jsAula.tableList = function (json) {
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

jsAula.getlista = function () {

    let FData = new FormData();
    FData.set("action", "vListaAll");//nome da funcao no PHP

    var json = jsAula.ajax(FData);

    try {
        jsAula.tableList(json);

//        records = json.dados;
//        console.log(records);
//        totalRecords = json.total;
//        totalPages = Math.ceil(totalRecords / recPerPage);
//        jsAula.apply_pagination();

    } catch (erro) {
        $('#ListView').empty();
        $('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
    }
};

jsAula.salvar = function () {

    let Form = jsAula.getForm();

    Form.set("action", "vCadastro"); //nome da funcao no PHP

    if (jsAula.ajax(Form, 'vCadastro')) {
        $("#formCadastro").modal('hide');

        jsAula.getlista();

        swal('Registo...', jsAula.msg, 'success');
    }
};

jsAula.editar = function (id) {

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP
    FData.set("where", "where prof_id=" + id);//passo os campos PHP

    var json = jsAula.ajax(FData, 'vLocalizar');

    jsAula.setForm(json.dados[0]);

    $(".modal-title").text('Editar Cadastro');
    $("#insert").val('update')
    $("#formCadastro").modal("show");
};
//
//jsAula.eventosDaTable = function () {
//
//    $('#ListView tr').each(function () {
//        var codigo;
//        $('td', $(this)).each(function (index, item) {
//            if (index === 0) {
//                codigo = $(item).text();
//            }
//        });
//        $(this).click(function () {
//            jsAula.editar(codigo);
//        }).css('cursor', 'pointer');
//    });
//};

//jsAula.apply_pagination = function () {
//    jsAula.pagination.twbsPagination({
//        totalPages: totalPages,
//        visiblePages: 6,
//        onPageClick: function (event, page) {
//            displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
//            endRec = (displayRecordsIndex) + recPerPage;
//            //console.log(displayRecordsIndex + 'ssssssssss' + endRec);
//            displayRecords = records.slice(displayRecordsIndex, endRec);
//            jsAula.generate_table();
//        }
//    });
//};

//jsAula.generate_table = function () {
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

//jsAula.arrayIntegrantes = new Array();

//Define a paginação da tabela
//jsAula.pagination = $('#pagination'),
//        totalRecords = 0, records = [],
//        displayRecords = [],
//        recPerPage = 3,
//        page = 1,
//        totalPages = 0;

jsAula.ajax = function (FormData, action, v) {
    var view = v == null ? '../view/vProfessor.php' : v;
    var retorno;
    $.ajax({
        url: view, type: "POST", data: FormData, dataType: "json", async: false, processData: false, contentType: false,
        success: function (php) {
            jsAula.msg = php.messages;
            retorno = php;
        },
        error: function (php) {
            debugger;
            var responseText = JSON.parse(php.responseText);
            jsAula.msg = responseText.messages;
            swal('Oops...', jsAula.msg, 'error');

            retorno = false;
        }
    });
    return retorno;

};
jsAula.start = function () {
    jsAula.eventos();

};

jsAula.start();


