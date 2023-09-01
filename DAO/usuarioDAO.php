<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao
{

    public function CarregarMeusDados()
    {

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT nome_usuario, email_usuario 
                        from tb_usuario 
                        where id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());

        // remove os index dentro do array, permanecedo somente com as colunas do BD
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();
        return $sql->fetchAll();
    }
    public function GravarMeusDados($nome, $email)
    {
        if (trim($nome) == '' || trim($email) == '') {
            return 0;
        }
        if ($this->VerificarEmailDuplicadoAlt($email) == 0) {
            return -5;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'UPDATE tb_usuario
                        set nome_usuario = ?, 
                        email_usuario = ?
                        where id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    public function ValidarLogin($email, $senha)
    {
        if (trim($email) == '' || trim($senha) == '') 
        {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_usuario, nome_usuario from tb_usuario WHERE email_usuario = ? AND senha_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        $user = $sql->fetchAll();

        if (count($user) == 0) 
        {
            return -6;
        }
        $cod = $user[0]['id_usuario'];
        $nome = $user[0]['nome_usuario'];
        UtilDao::CriarSessao($cod,$nome);
        header('location: inicial.php');
        exit;
    }


    public function CriarCadastro($nome, $email, $senha, $rsenha)
    {
        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($rsenha) == '') {
            return 0;
        }
        if (strlen($senha) < 6) {
            return -2;
        }
        if (trim($senha) != trim($senha)) {
            return -3;
        }
        if ($this->VerificarEmailDuplicado($email) == 0) {
            return -5;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'INSERT INTO 
                tb_usuario
                (nome_usuario, 
                email_usuario, 
                senha_usuario, 
                data_cadastro)
                VALUES(?,?,?,?)';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, date('Y-m-d'));
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    public function VerificarEmailDuplicado($email)
    {
        if (trim($email) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT COUNT(email_usuario) as contar FROM tb_usuario where email_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $contar = $sql->fetchAll();
        return $contar[0];
    }
    public function VerificarEmailDuplicadoAlt($email)
    {
        if (trim($email) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT COUNT(email_usuario) as contar FROM tb_usuario where email_usuario = ? AND id_usuario != ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $contar = $sql->fetchAll();
        return $contar[0];
    }
}


//continuar o código desta função
// retornar 1, retornar o valor -1
