<?php

/*
 * Autor: Marcio
 * Revisao: 0
 * Data: 13/04/2022
 *
 * Descricao: 
 * Controle de Acesso na tab_aluno
 */

class ColAluno {

    private $alu_id;
    private $alu_nome;
    private $alu_sobrenome;
    private $alu_nascimento;
    private $alu_telefone;
    private $alu_resposavel;
    private $alu_sexo;
    private $alu_email;
    private $alu_endereco;
    private $alu_obs;
    private $alu_senha;
    private $alu_ativado;
    private $alu_data_cadastro;
    private $alu_foto;
    private $alu_mensalidade;
    private $alu_mensalidade_venc;
    private $alu_aul_id;
    private $alu_prof_id;
    private $alu_cpf;
    private $erro;
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
        $sql = "INSERT INTO tab_alunos (
            alu_nome,
            alu_sobrenome,
            alu_nascimento,
            alu_telefone,
            alu_resposavel,
            alu_sexo,
            alu_email,
            alu_endereco,
            alu_obs,
            alu_senha,
            alu_ativado,
            alu_data_cadastro,
            alu_foto,
            alu_mensalidade,
            alu_mensalidade_venc,
            alu_aul_id,
            alu_prof_id,
            alu_cpf
            )VALUES(";
        $sql .= "'" . strtoupper(addslashes($this->alu_nome)) . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_sobrenome)) . "',";
        $sql .= "'" . $this->alu_nascimento . "',";
        $sql .= "'" . $this->alu_telefone . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_resposavel)) . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_sexo)) . "',";
        $sql .= "'" . $this->alu_email . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_endereco)) . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_obs)) . "',";
        $sql .= "'" . md5('123') . "',";
        $sql .= "'" . strtoupper(addslashes($this->alu_ativado)) . "',";
        $sql .= "CURRENT_TIMESTAMP ,";
        $sql .= "'" . $this->alu_foto . "',";
        $sql .= "" . $this->alu_mensalidade . ",";
        $sql .= "'" . $this->alu_mensalidade_venc . "',";
        $sql .= "" . $this->alu_aul_id . ",";
        $sql .= "" . $this->alu_prof_id . ",";
        $sql .= "'" . $this->alu_cpf . "'";
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

        $sql = "UPDATE tab_alunos SET ";
        $sql .= "alu_nome='" . strtoupper(addslashes($this->alu_nome)) . "',";
        $sql .= "alu_sobrenome='" . strtoupper(addslashes($this->alu_sobrenome)) . "',";
        $sql .= "alu_nascimento='" . $this->alu_nascimento . "',";
        $sql .= "alu_telefone='" . $this->alu_telefone . "',";
        $sql .= "alu_resposavel='" . strtoupper(addslashes($this->alu_resposavel)) . "',";
        $sql .= "alu_sexo='" . strtoupper(addslashes($this->alu_sexo)) . "',";
        $sql .= "alu_email='" . $this->alu_email . "',";
        $sql .= "alu_endereco='" . strtoupper(addslashes($this->alu_endereco)) . "',";
        $sql .= "alu_obs='" . strtoupper(addslashes($this->alu_obs)) . "',";
        $sql .= "alu_senha='" . md5($this->alu_senha) . "',";
        $sql .= "alu_ativado='" . strtoupper(addslashes($this->alu_ativado)) . "',";
        $sql .= "alu_foto='" . $this->alu_foto . "',";
        $sql .= "alu_mensalidade=" . Formatador::convertFloatToMoeda($this->alu_mensalidade) . ",";
        $sql .= "alu_mensalidade_venc='" . $this->alu_mensalidade_venc . "',";
        $sql .= "alu_aul_id=" . $this->alu_aul_id . ",";
        $sql .= "alu_prof_id=" . $this->alu_prof_id . ",";
        $sql .= "alu_cpf='" . $this->alu_cpf . "'";
        $sql .= "WHERE alu_id=" . $this->alu_id;

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
        $sql = "DELETE FROM tab_alunos WHERE alu_id = " . $this->alu_id;
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
        $sql = "SELECT * FROM tab_alunos " . $this->sqlCampos;
        $con->set("sql", $sql);
        $result = $con->execute($con->conectar());

        while ($obj = mysqli_fetch_object($result)) {
            $cls = new stdClass();
            $cls->id = $obj->alu_id;
            $cls->nome = $obj->alu_nome;
            $cls->sobrenome = $obj->alu_sobrenome;
            $cls->nascimento = $obj->alu_nascimento;
            $cls->telefone = $obj->alu_telefone;
            $cls->resposavel = $obj->alu_resposavel;
            $cls->sexo = $obj->alu_sexo;
            $cls->email = $obj->alu_email;
            $cls->endereco = $obj->alu_endereco;
            $cls->obs = $obj->alu_obs;
            $cls->senha = $obj->alu_senha;
            $cls->ativado = $obj->alu_ativado;
            $cls->data_cadastro = $obj->alu_data_cadastro;
            $cls->foto = $obj->alu_foto;
            $cls->mensalidade = Formatador::convertMoedaToFloat($obj->alu_mensalidade);
            $cls->mensalidade_venc = $obj->alu_mensalidade_venc;
            $cls->aula_id = $obj->alu_aul_id;
            $cls->prof_id = $obj->alu_prof_id;
            $cls->cpf = $obj->alu_cpf;
            
            $conArry[] = $cls;
        }

        return $conArry;
    }

}
