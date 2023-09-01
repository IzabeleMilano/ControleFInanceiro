<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once "../DAO/usuarioDAO.php";


$objdao = new UsuarioDAO();

if (isset($_POST['btngravar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

 

    $ret = $objdao->GravarMeusDados($nome, $email);
}
$dados = $objdao->CarregarMeusDados();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php';

?>

<body>
    <div id="wrapper">

        <?php include_once '_topo.php';
        ?>

        <!-- /. NAV TOP  -->
        <?php include_once '_menu.php';
        ?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <?php include_once '_msg.php'; ?>

                        <h2>Meus Dados</h2>
                        <h5>Aqui você pode alterar seus dados cadastrais </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="meusdados.php" method="post">
                    <div class="form-group" id="divNome">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite aqui" name="nome" id="nome" value="<?= $dados[0] ['nome_usuario']?>" />
                    </div>
                    <div class="form-group" id="divEmail">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="Digite Aqui" name="email" id="email" value="<?=$dados[0] ['email_usuario']?>" />

                    </div>
                    <button type="submit" onclick="return ValidarMeusDados()" class="btn btn-success" name="btngravar">Salvar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

   
</body>

</html>