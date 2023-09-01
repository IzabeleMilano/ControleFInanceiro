<?php
require_once '../DAO/categoriaDAO.php';
$dao = new CategoriaDao;

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_categoria = $_GET['cod'];
    $dados = $dao->DetalharCategoria($id_categoria);

    // se tem algum valor dentro do array $dados.
    if (count($dados) == 0) {
        header('location: consultar_categoria.php');
        exit;
    }
} else if (isset($_POST['btnsalvar'])) {
    $id_categoria = $_POST['cod'];
    $nome_categoria = $_POST['nome_categoria'];
    $ret = $dao->AlterarCategoria($nome_categoria, $id_categoria);

    header('location: consultar_categoria.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnexcluir'])) {
    $id_categoria = $_POST['cod'];
    $ret = $dao->ExcluirCategoria($id_categoria);
    header('location: consultar_categoria.php?ret=' . $ret);
    exit;
} else {

    header('location: consultar_categoria.php');
    exit;
}




?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'

?>

<body>

    <?php include_once '_topo.php';
    include_once '_menu.php';
    ?>
    <div id="wrapper">


        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Alterar categoria</h2>
                        <h5>Aqui você poderá alterar ou excluir suas categorias. Exemplo: Conta de luz </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_categoria.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                    <div class="form-group">
                        <label>Nome da categoria</label>
                        <input class="form-control" placeholder="Digite o nome da categoria. Exemplo: Conta de luz" id="nomecategoria" value="<?= $dados[0]['nome_categoria'] ?>" name="nome_categoria" />


                    </div>

                    <button type="submit" class="btn btn-success" onclick="return ValidarCategoria()" button name="btnsalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modal_excluir" class="btn btn-danger" >Excluir</button>
                    
                    <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a categoria: <b><?=$dados[0]['nome_categoria']?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" button name="btnexcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->



</body>

</html>