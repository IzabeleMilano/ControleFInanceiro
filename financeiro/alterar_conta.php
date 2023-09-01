<?php


require_once '../DAO/contaDAO.php';
$dao = new ContaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_conta = $_GET['cod'];
    $dados = $dao->DetalharConta($id_conta);

    // se tem algum valor dentro do array $dados.
    if (count($dados) == 0) {
        header('location: consultar_conta.php');
        exit;
    }
} else if (isset($_POST['btnsalvar'])) {
    $id_conta = $_POST['cod'];
    $banco_conta = $_POST['banco'];
    $agencia_conta = $_POST['agencia'];
    $numero_conta = $_POST['conta'];
    $saldo_conta = $_POST['saldo'];

    $ret = $dao->AlterarConta($banco_conta, $agencia_conta, $numero_conta, $saldo_conta, $id_conta);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnexcluir'])) {
    $id_conta = $_POST['cod'];
    $ret = $dao->ExcluirConta($id_conta);
    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else {

    header('location: consultar_conta.php');
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
                        <h2>Alterar conta</h2>
                        <h5>Aqui você poderá alterar suas contas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_conta.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                    <div class="form-group">
                        <label>Nome do banco*</label>
                        <input class="form-control" placeholder="Digite o nome do banco." id="banco" name="banco" value="<?= $dados[0]['banco_conta'] ?>" />


                    </div>
                    <div class="form-group">
                        <label>Agência</label>
                        <input class="form-control" placeholder="Digite a agência*" id="agencia" name="agencia" value="<?= $dados[0]['agencia_conta'] ?>" />


                    </div>
                    <div class="form-group">
                        <label>Número da conta</label>
                        <input class="form-control" placeholder="Digite o número da conta " id="numero" name="conta" value="<?= $dados[0]['numero_conta'] ?>" />


                    </div>
                    <div class="form-group">
                        <label>Saldo*</label>
                        <input class="form-control" placeholder="Digite o saldo da conta " id="saldo" name="saldo" value="<?= $dados[0]['saldo_conta'] ?>" />


                    </div>


                    <button type="submit" class="btn btn-success" onclick="return ValidarConta()" button name="btnsalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modal_excluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a conta: <b><?= $dados[0]['banco_conta'] ?> / <?= $dados[0]['agencia_conta'] ?> - <?= $dados[0]['numero_conta'] ?> </b>
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