<?php

include '../controller/cConexao.php';
include '../controller/cProfessor.php';
include '../lib/Formatador.php';

//set
$col = new ColProfessor();

//route
$action = $_POST['action'];
//var_dump($_GET);

if (!isset($action)) {
    die('Não foi passado Function');
} else {
    $obj = (object) $_POST['obj'];
    $action($obj);
}

function vCadastro($obj) {
    // $obj = (object) $_REQUEST['obj'];
    var_dump($obj);
    die('teste');

    global $col;

    $col->set("prof_id", $obj->id);
    $col->set("prof_nome", $obj->nome);
    $col->set("prof_sobrenome", $obj->sobrenome);
    $col->set("prof_nascimento", $obj->nascimento);
    $col->set("prof_telefone", $obj->telefone);
    $col->set("prof_sexo", $obj->sexo);
    $col->set("prof_email", $obj->email);
    $col->set("prof_endereco", $obj->endereco);
    $col->set("prof_obs", $obj->obs);
    $col->set("prof_senha", $obj->senha);
    $col->set("prof_ativado", $obj->ativado);
    $col->set("prof_comissao", $obj->comissao);
    $col->set("prof_foto", $obj->foto);

    if ($obj->insert === "insert") {
        $result = $col->incluir();

        $msg = $result ? 'Registro(s) inserido(s) com sucesso' : 'Erro ao inserir o registro, tente novamente.';
    } else {
        $result = $col->alterar();

        $msg = $result ? 'Registro(s) atualizado(s) com sucesso' : 'Erro ao atualizar, tente novamente.';
    }

    //se houver um erro, retornar um cabeçalho especial, seguido por outro objeto JSON
    if ($result == false) {

        header('HTTP/1.1 500 Internal Server vProfessor.php');
        header('Content-Type: application/json; charset=UTF-8');

        echo json_encode(array(
            "success" => false,
            "messages" => $msg,
            "dados" => $result
        ));
    } else {

        //header('Content-Type: application/json; charset=UTF-8');

        echo json_encode(array(
            "success" => true,
            "messages" => $msg,
            "dados" => $result
        ));
    }
}

function vListaAll($obj) {
    //$obj = (object) $_REQUEST['obj'];
    global $col;

    $col->set("sqlCampos", " order by prof_nome");

    $result = $col->getRegistros();

    $msg = $result ? 'Registro(s) localizado(s) com sucesso' : 'Erro ao localizar registro, tente novamente.';

    //se houver um erro, retornar um cabeçalho especial, seguido por outro objeto JSON
    if ($result == false) {

        header('HTTP/1.1 500 Internal Server vProfessor.php');
        header('Content-Type: application/json; charset=UTF-8');

        echo json_encode(array(
            "success" => false,
            "messages" => $msg,
            "dados" => $result,
            "total" => count($result)
        ));
    } else {

        echo json_encode(array(
            "success" => true,
            "messages" => $msg,
            "dados" => $result,
            "total" => count($result)
        ));
    }
}

function vLocalizar($obj) {
    //$obj = (object) $_REQUEST['obj'];

    global $col;
    $col->set("prof_id", $obj->id);
    $col->set("sqlCampos", $obj->where);
    $result = $col->getRegistros();
    $msg = $result ? 'Registro(s) localizado(s) com sucesso' : 'Erro ao localizar registro, tente novamente.';

    //se houver um erro, retornar um cabeçalho especial, seguido por outro objeto JSON
    if ($result == false) {

        header('HTTP/1.1 500 Internal Server vProfessor.php');
        header('Content-Type: application/json; charset=UTF-8');

        echo json_encode(array(
            "success" => false,
            "messages" => $msg,
            "dados" => $result,
            "total" => count($result)
        ));
    } else {

        //header('Content-Type: application/json; charset=UTF-8');

        echo json_encode(array(
            "success" => true,
            "messages" => $msg,
            "dados" => $result,
            "total" => count($result)
        ));
    }
}
