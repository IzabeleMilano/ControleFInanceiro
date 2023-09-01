<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';
class ContaDAO extends Conexao
{

    public function CadastrarConta($banco, $agencia, $numero, $saldo)
    {
        if (trim($banco) == '' || trim($agencia) == '' || trim($numero) == '' || trim($saldo) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'INSERT INTO tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario) VALUES (?, ?, ?, ?, ?);';

        $sql = new PDOStatement;

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numero);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarConta()
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_conta,
                        banco_conta,
                        agencia_conta,
                        saldo_conta,
                        numero_conta
                        from tb_conta
                        where id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function DetalharConta($id_conta)
    {
        if ($id_conta == 0) {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_conta,
                        numero_conta,
                        banco_conta,
                        agencia_conta,
                        saldo_conta
                        from tb_conta
                        where id_conta = ?
                        and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_conta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function AlterarConta($banco_conta, $agencia_conta, $numero_conta, $saldo_conta, $id_conta)
    {
        if (trim($banco_conta) == '' || trim($numero_conta) == '' || trim($agencia_conta) == '' || trim($saldo_conta) == '' || trim($id_conta) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'update tb_conta
                set banco_conta = ?,
                agencia_conta = ?,
                numero_conta = ?,
                saldo_conta = ?
                where id_conta = ?
                and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $banco_conta);
        $sql->bindValue(2, $agencia_conta);
        $sql->bindValue(3, $numero_conta);
        $sql->bindValue(4, $saldo_conta);
        $sql->bindValue(5, $id_conta);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            //6 passo: executar no banco de BD
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            //mostra o erro tecnico
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirConta($id_conta)
    {
        if ($id_conta == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'delete
                    from tb_conta
                    where id_conta = ?
                    and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_conta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
}
