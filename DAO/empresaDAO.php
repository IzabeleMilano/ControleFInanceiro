<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';



class EmpresaDao extends Conexao
{

    public function CadastrarEmpresa($nome, $tel, $endereco)
    {
        if (trim($nome) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();

        $comando_sql = 'INSERT INTO tb_empresa (nome_empresa, telefone_empresa, endereco_empresa, id_usuario) VALUES (?, ?, ?, ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $tel);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarEmpresa($nome_pesq, $filtro)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_empresa, 
                        nome_empresa,
                        telefone_empresa,
                        endereco_empresa
                        from tb_empresa
                        where id_usuario = ?';

        if ($filtro == 0) {
            $nome_pesq = '';
        }
        if ($filtro == 1 && $nome_pesq != '') {
            $comando_sql = $comando_sql . ' AND telefone_empresa LIKE ?';
        } else if ($filtro == 2 && $nome_pesq != '') {
            $comando_sql = $comando_sql . ' AND nome_empresa LIKE ?';
        } else if ($filtro == 3 && $nome_pesq != '') {
            $comando_sql = $comando_sql . ' AND endereco_empresa LIKE ?';
        }

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        if (trim($nome_pesq) != '') {
            $sql->bindValue(2, '%' . $nome_pesq . '%');
        }

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharEmpresa($id_empresa)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_empresa,
                        nome_empresa,
                        telefone_empresa,
                        endereco_empresa
                        from tb_empresa
                        where id_empresa = ?
                        and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_empresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarEmpresa($nome_empresa, $telefone_empresa, $endereco_empresa, $id_empresa)
    {
        if ($nome_empresa == '' || $id_empresa == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'update tb_empresa
                set nome_empresa = ?,
                telefone_empresa = ?,
                endereco_empresa = ?
                where id_empresa = ?
                and id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome_empresa);
        $sql->bindValue(2, $telefone_empresa);
        $sql->bindValue(3, $endereco_empresa);
        $sql->bindValue(4, $id_empresa);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

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

    public function ExcluirEmpresa($id_empresa)
    {
        if ($id_empresa == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();
        $comando_sql = 'delete
                    from tb_empresa
                    where id_empresa = ?
                    and id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_empresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -4;
        }
    }
}
