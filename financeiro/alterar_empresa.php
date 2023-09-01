<?php
require_once '../DAO/empresaDAO.php';
$dao = new EmpresaDao;

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_empresa = $_GET['cod'];
    $dados = $dao->DetalharEmpresa($id_empresa);

    // se tem algum valor dentro do array $dados.
    if (count($dados) == 0) {
        header('location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btnsalvar'])) {
    $id_empresa = $_POST['cod'];
    $nome_empresa = $_POST['nome_empresa'];
    $telefone_empresa = $_POST['telefone_empresa'];
    $endereco_empresa = $_POST['endereco_empresa'];

    $ret = $dao->AlterarEmpresa($nome_empresa,$telefone_empresa,$endereco_empresa, $id_empresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnexcluir'])) {
    $id_empresa = $_POST['cod'];
    $ret = $dao->ExcluirEmpresa($id_empresa);
    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {

    header('location: consultar_empresa.php');
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
                        <h2>Nova empresa</h2>
                        <h5>Aqui você poderá alterar suas empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_empresa.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Nome da empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da empresa." id="nomeempresa" value="<?= $dados[0]['nome_empresa'] ?>" name="nome_empresa" />


                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite o número de telefone (opcional)" name="telefone_empresa" value="<?= $dados[0]['telefone_empresa'] ?>"/>


                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa (opcional) " name="endereco_empresa" value="<?= $dados[0]['endereco_empresa'] ?>" />


                    </div>

                    <button type="submit" class="btn btn-success" onclick="return ValidarEmpresa()" button name="btnsalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modal_excluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a empresa: <b><?= $dados[0]['nome_empresa'] ?></b>
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