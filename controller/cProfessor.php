<?php

/*
 * Autor: Marcio
 * Revisao: 0
 * Data: 13/04/2022
 *
 * Descricao: 
 * Controle de Acesso na tab_professor
 */

class ColProfessor {

    private $prof_id;
    private $prof_nome;
    private $prof_sobrenome;
    private $prof_nascimento;
    private $prof_telefone;
    private $prof_sexo;
    private $prof_email;
    private $prof_endereco;
    private $prof_obs;
    private $prof_senha;
    private $prof_ativado;
    private $prof_data_cadastro;
    private $prof_comissao;
    private $prof_foto;
    private $erro;
    private $sqlCampos;
    private $dica;

    //#atribuir valores as propriedades da classe;

    public function set($prop, $value) {
        $this->$prop = $value;
    }

    public function get($prop) {
        return $this->$prop;
    }

    public function incluir() {

        $con = new cConexao(); // Cria um novo objeto de conexão com o BD. 
        $con->conectar();
        $sql = "INSERT INTO tab_professores (
            prof_nome,
            prof_sobrenome,
            prof_nascimento,
            prof_telefone,
            prof_sexo,
            prof_email,
            prof_endereco,
            prof_obs,
            prof_senha,
            prof_ativado,
            prof_data_cadastro,
            prof_comissao,
            prof_foto
            )VALUES(";
        $sql .= "'" . strtoupper(addslashes($this->prof_nome)) . "',";
        $sql .= "'" . strtoupper(addslashes($this->prof_sobrenome)) . "',";
        $sql .= "'" . $this->prof_nascimento . "',";
        $sql .= "'" . $this->prof_telefone . "',";
        $sql .= "'" . strtoupper(addslashes($this->prof_sexo)) . "',";
        $sql .= "'" . $this->prof_email . "',";
        $sql .= "'" . strtoupper(addslashes($this->prof_endereco)) . "',";
        $sql .= "'" . strtoupper(addslashes($this->prof_obs)) . "',";
        $sql .= "'" . md5('123') . "',";
        $sql .= "'" . strtoupper(addslashes($this->prof_ativado)) . "',";
        $sql .= "CURRENT_TIMESTAMP ,";
        $sql .= "" . $this->prof_comissao . ",";
        $sql .= "'" . $this->prof_foto . "'";
        $sql .= ")";

        $con->set("sql", $sql);

        if ($con->execute($con->conectar())) {
            $id = $con->ultimoId;
            return $id;
        } else {
            $this->erro = $con->erro;
            return false;
        }
    }

    public function alterar() {
        $con = new cConexao(); // Cria um novo objeto de conexão com o BD. 
        $con->conectar();

        $sql = "UPDATE tab_professores SET ";
        $sql .= "prof_nome='" . strtoupper(addslashes($this->prof_nome)) . "',";
        $sql .= "prof_sobrenome='" . strtoupper(addslashes($this->prof_sobrenome)) . "',";
        $sql .= "prof_nascimento='" . $this->prof_nascimento . "',";
        $sql .= "prof_telefone='" . $this->prof_telefone . "',";
        $sql .= "prof_sexo='" . strtoupper(addslashes($this->prof_sexo)) . "',";
        $sql .= "prof_email='" . $this->prof_email . "',";
        $sql .= "prof_endereco='" . strtoupper(addslashes($this->prof_endereco)) . "',";
        $sql .= "prof_obs='" . strtoupper(addslashes($this->prof_obs)) . "',";
        $sql .= "prof_senha='" . md5($this->prof_senha) . "',";
        $sql .= "prof_ativado='" . strtoupper(addslashes($this->prof_ativado)) . "',";
        $sql .= "prof_comissao=" . $this->prof_comissao . ",";
        $sql .= "prof_foto='" . $this->prof_foto . "'";
        $sql .= "WHERE prof_id=" . $this->prof_id;

        $con->set("sql", $sql);
        if ($con->execute($con->conectar())) {
            return true;
        } else {
            $this->erro = $con->erro;
            return false;
        }
    }

    #remove o registro

    public function remover() {
        $con = new cConexao(); // Cria um novo objeto de conexão com o BD.
        $con->conectar();
        $sql = "DELETE FROM tab_professores WHERE prof_id = " . $this->prof_id;
        $con->set("sql", $sql);
        $resultado = $con->execute($con->conectar());
        if ($resultado) {
            return $con->execute($con->conectar());
        } else {
            return false;
        }
    }

    public function getRegistros() {
        $con = new cConexao(); // Cria um novo objeto de conexão com o BD.
        $con->conectar();
        $sql = "SELECT * FROM tab_professores " . $this->sqlCampos;
        $con->set("sql", $sql);
        $result = $con->execute($con->conectar());
        
        while ($obj = mysqli_fetch_object($result)) {
            $cls = new stdClass();
            $cls->id = $obj->prof_id;
            $cls->nome = $obj->prof_nome;
            $cls->sobrenome = $obj->prof_sobrenome;
            $cls->nascimento = $obj->prof_nascimento;
            $cls->telefone =  $obj->prof_telefone;
            $cls->sexo = $obj->prof_sexo;
            $cls->email = $obj->prof_email;
            $cls->endereco = $obj->prof_endereco;
            $cls->obs = $obj->prof_obs;
            $cls->senha = $obj->prof_senha;
            $cls->ativado = $obj->prof_ativado;
            $cls->data_cadastro = $obj->prof_data_cadastro;
            $cls->comissao = $obj->prof_comissao;
            $cls->foto = $obj->prof_foto;
            
            $conArry[] = $cls;
        }
        
        return $conArry;
    }
}
