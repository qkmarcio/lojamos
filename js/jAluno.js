var jsProfessor = {};

var formCadastro;

$('#image-file').on('change', function () {
    console.log('This file size is: ' + this.files[0].size / 1024 / 1024 + "MiB");
});
$('#inpBuscar').focus();
$('#inpBuscar').on('change', function (evet) {

    let FData = new FormData();
    FData.set("action", "vBuscaAll");//nome da funcao no PHP
    FData.set("where", evet.target.value);//passo os campos PHP

    var json = jsAluno.ajax(FData);

    try {
        jsAluno.tableList(json);

    } catch (erro) {
        $('#ListView').empty();

    }

    console.log(evet.target.value);
});

//Faz a Chamada para Editar
$('#thumbnail').on('click', function (e) {
    $("#alu_foto").click();
});

$('#alu_foto').change(function (e) {
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
    jsAula.ListaProfessor();
    jsAula.ListaAula();
    jsAluno.editar(id);
});

//Quando o Form esta show modal
$('#formCadastro').on('shown.bs.modal', function () {
    $("#alu_nome").focus();
    jsAluno.ValidaForm();

    if ($("#insert").val('insert') === 'insert') {
        jsAula.ListaProfessor();
        jsAula.ListaAula();
    }
});

//Quando o Form esta hide modal
$('#formCadastro').on('hide.bs.modal', function () {
    $("#inpBuscar").focus();
    $('#formCadastro input,textarea,select').each(function () {
        $(this).val('');
    });

    if (formCadastro.valid() == false) {
        formCadastro.destroy();
    }

    //Deixa o Form padrão para fazer o insert
    $("#insert").val('insert');
    $('#thumbnail').attr('src', "../Fotos/semfoto.jpg");
});

jsAluno.mask = function () {
    $("#alu_telefone").mask('(99) 99999-9999');
    $("#alu_mensalidade").mask('999.999.999.999,99');
};
jsAluno.eventos = function () {

};

// O submit do form que chama esta funcao
jsAluno.ValidaForm = function () {

    formCadastro = $('#formCadastro').validate({
        debug: true,
        ignore: '*:not([name])',
        rules: {
            alu_nome: {
                required: true,
                minlength: 3
            },
            alu_sobrenome: {
                required: true,
                minlength: 3
            },
            alu_resposavel: {
                required: true,
                minlength: 3
            },
            alu_mensalidade: {
                required: true
            },
            alu_mensalidade_venc: {
                required: true
            },
            alu_telefone: {
                required: true
            },
            alu_sexo: {
                required: true
            },
            alu_telefone: {
                required: true
            },
            alu_aul_id: {
                required: true
            },
            alu_prof_id: {
                required: true
            },
            prof_email: {
                required: true,
                email: true
            },
            prof_ativado: {
                required: true
            }
        },
        messages: {
            alu_nome: {
                required: "Coloque um nome",
                minlength: "Seu nome deve consistir em pelo menos 3 caracteres"
            },
            alu_sobrenome: {
                required: "Por favor coloque um Sobrenome",
                minlength: "Seu Sobrenome deve consistir em pelo menos 3 caracteres"
            },
            alu_resposavel: {
                required: "Por favor coloque um Reponsavel",
                minlength: "Seu Sobrenome deve consistir em pelo menos 3 caracteres"
            },
            prof_email: "Coloque um email valido"

        },
        submitHandler: function (form) {
            //alert('inside');

            let Form = jsAluno.getForm();

            Form.set("action", "vCadastro"); //nome da funcao no PHP

            if (jsAluno.ajax(Form, 'vCadastro')) {
                $("#formCadastro").modal('hide');

                jsAluno.getlista();

                swal('Registo...', jsAluno.msg, 'success');
            }

        }
    });
}

jsAluno.getForm = function () {

    let FData = new FormData();
    FData.set('insert', $("#insert").val());
    FData.set('id', $("#alu_id").val());
    FData.set('nome', $("#alu_nome").val());
    FData.set('sobrenome', $("#alu_sobrenome").val());
    FData.set('nascimento', $("#alu_nascimento").val());
    FData.set('telefone', $("#alu_telefone").val());
    FData.set('resposavel', $("#alu_resposavel").val());
    FData.set('sexo', $("#alu_sexo").val());
    FData.set('email', $("#alu_email").val());
    FData.set('endereco', $("#alu_endereco").val());
    FData.set('obs', $("#alu_obs").val());
    FData.set('senha', $("#alu_senha").val());
    FData.set('ativado', $("#alu_ativado").val());
    FData.set('data_cadastro', $("#alu_data_cadastro").val());
    FData.set('foto', $("#alu_foto")[0].files[0]);
    FData.set('mensalidade', $("#alu_mensalidade").val());
    FData.set('mensalidade_venc', $("#alu_mensalidade_venc").val());
    FData.set('aula_id', $("#alu_aul_id").val());
    FData.set('prof_id', $("#alu_prof_id").val());
    //FData.set('cpf', $("#alu_cpf").val());
    FData.set('foto2', $("#thumbnail").attr('src'));

    return FData;

};

jsAluno.setForm = function (obj) {
    $("#alu_id").val(obj.id);
    $("#alu_nome").val(obj.nome);
    $("#alu_sobrenome").val(obj.sobrenome);
    $("#alu_nascimento").val(obj.nascimento);
    $("#alu_telefone").val(obj.telefone);
    $("#alu_resposavel").val(obj.resposavel);
    $("#alu_sexo").val(obj.sexo);
    $("#alu_email").val(obj.email);
    $("#alu_endereco").val(obj.endereco);
    $("#alu_obs").val(obj.obs);
    $("#alu_senha").val(obj.senha);
    $("#alu_ativado").val(obj.ativado);
    $("#alu_data_cadastro").val(obj.data_cadastro);
    $("#alu_mensalidade").val(obj.mensalidade);
    $("#alu_mensalidade_venc").val(obj.mensalidade_venc);
    $("#alu_aula_id").val(obj.aul_id);
    $("#alu_prof_id").val(obj.prof_id);
    //$("#alu_aul_cpf").val(obj.cpf);
    $('#thumbnail').attr('src', obj.foto);
};

jsAluno.tableList = function (json) {
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

jsAluno.getlista = function () {

    let FData = new FormData();
    FData.set("action", "vListaAll");//nome da funcao no PHP

    var json = jsAluno.ajax(FData);

    try {
        jsAluno.tableList(json);

    } catch (erro) {
        $('#ListView').empty();
        $('#ListView').append("<tr>PROFESSORES NÃO LOCALIZADO !</tr>");
    }
};

jsAluno.salvar = function () {

    let Form = jsAluno.getForm();

    Form.set("action", "vCadastro"); //nome da funcao no PHP

    if (jsAluno.ajax(Form, 'vCadastro')) {
        $("#formCadastro").modal('hide');

        jsAluno.getlista();

        swal('Registo...', jsAluno.msg, 'success');
    }
};

jsAluno.editar = function (id) {

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP
    FData.set("where", "where prof_id=" + id);//passo os campos PHP

    var json = jsAluno.ajax(FData, 'vLocalizar');

    jsAluno.setForm(json.dados[0]);

    $(".modal-title").text('Editar Cadastro');
    $("#insert").val('update')
    $("#formCadastro").modal("show");
};

jsAula.ListaProfessor = function () {
    $('#alu_prof_id').empty();

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP

    var json = jsAula.ajax(FData, null, '../view/vProfessor.php');
    var dados = json.dados;
    for (var i = 0; i < json.total; i++) {
        $("#alu_prof_id").append(new Option(dados[i].nome + ' ' + dados[i].sobrenome, dados[i].id));
    }

};


jsAula.ListaAula = function () {
    $('#alu_aul_id').empty();

    let FData = new FormData();
    FData.set("action", "vListaAll"); //nome da funcao no PHP

    var json = jsAula.ajax(FData, null, '../view/vAula.php');
    var dados = json.dados;
    for (var i = 0; i < json.total; i++) {
        $("#alu_aul_id").append(new Option(dados[i].horario + ' - ' + dados[i].dia, dados[i].id));
    }

};


jsAluno.ajax = function (FormData, action, v) {
    var view = v == null ? '../view/vProfessor.php' : v;
    var retorno;
    $.ajax({
        url: view, type: "POST", data: FormData, dataType: "json", async: false, processData: false, contentType: false,
        success: function (php) {
            jsAluno.msg = php.messages;
            retorno = php;
        },
        error: function (php) {
            debugger;
            var responseText = JSON.parse(php.responseText);
            jsAluno.msg = responseText.messages;
            swal('Oops...', jsAluno.msg, 'error');

            retorno = false;
        }
    });
    return retorno;

};
jsAluno.start = function () {
    jsAluno.eventos();

    jsAluno.mask();

    jsAluno.getlista();

};

jsAluno.start();