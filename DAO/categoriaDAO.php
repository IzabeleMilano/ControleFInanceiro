<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDao extends Conexao
{
    public function CadastrarCategoria($nome)
    {
        if (trim($nome) == '') {
            return 0;
        }
        // 1 passo: criar uma variavel que recebera o obj de conexao, no caso o extends Conexao, que é uma classe .. o "parent" é para acessar o recurso da classe que está sendo herdada.
        $conexao = parent::retornarConexao();

        // 2 passo: criar uma variavel que recebera o texto do comando SQL que deverá ser executado no BD
        $comando_sql = 'insert into tb_categoria (nome_categoria, id_usuario) values (?,?);';

        // 3 passo: criar um obj que será configurado e levado no BD para ser executado. O "statement" 
        $sql = new PDOStatement();
        // 4 passo: colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);
        // 5 passo: verificar se no meu comando_sql e tenho ? para ser configurado. Se tiver, configurar os bindValue.
        // bindValue - valor vinculado
        $sql->bindValue(1, $nome);

        $sql->bindValue(2, UtilDAO::CodigoLogado());

        // bloco de tratamento de erro.

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

    public function ConsultarCategoria($nome_pesq){
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_categoria, 
                        nome_categoria
                        from tb_categoria
                        where id_usuario = ?';
                        if($nome_pesq != ''){
                            $comando_sql = $comando_sql . 'AND nome_categoria LIKE ?';
                        }
                        
$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, UtilDAO::CodigoLogado());
if (trim($nome_pesq != '')){
    $sql->bindValue(2, '%' . $nome_pesq . '%');
}

//elimina os index do array das colunas retornada do BD, permanecendo apenas a coluna e seu valor.
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->execute();
return $sql->fetchAll();
    }


    public function DetalharCategoria($id_categoria){
        $conexao = parent::retornarConexao();
        $comando_sql = 'select id_categoria,
                        nome_categoria
                        from tb_categoria
                        where id_categoria = ?
                        and id_usuario = ?';
    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $id_categoria);
    $sql->bindValue(2,UtilDAO::CodigoLogado());
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    return $sql->fetchAll();
    }

    public function AlterarCategoria($nome_categoria,$id_categoria){
        if($nome_categoria == '' || $id_categoria == ''){
            return 0;
        }
$conexao = parent::retornarConexao();
$comando_sql = 'update tb_categoria
                set nome_categoria = ?
                where id_categoria = ?
                and id_usuario = ?';

$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, $nome_categoria);
$sql->bindValue(2, $id_categoria);
$sql->bindValue(3, UtilDAO::CodigoLogado());  

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

public function ExcluirCategoria($id_categoria){
    if($id_categoria == ''){
        return 0;
    }
    $conexao = parent::retornarConexao();
    $comando_sql = 'delete
                    from tb_categoria
                    where id_categoria = ?
                    and id_usuario = ?';
$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, $id_categoria);
$sql->bindValue(2, UtilDAO::CodigoLogado());

try{
$sql->execute();
return 1;

}catch (Exception $ex){
return -4;
}

}

}
