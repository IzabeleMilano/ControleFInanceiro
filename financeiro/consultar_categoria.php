<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';


$dao = new CategoriaDao();
$nome_pesq = '';

if (isset($_POST['btn_pes'])) {
    $nome_pesq = $_POST['nome_pesq'];
}
$categorias = $dao->ConsultarCategoria($nome_pesq);



?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'

?>

<body>

    <div id="wrapper">
        <?php include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <!-- /. NAV TOP  -->

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Categoria</h2>
                        <h5>Consulte todas as suas categorias aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Categorias cadastradas. Caso deseje alterar, clique no botão.
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form action="consultar_categoria.php" method="post">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <label>Pesquisar pelo nome</label><br>
                                                    <input class="form-control" name="nome_pesq" value="<?= $nome_pesq ?>" />
                                                    <p>
                                                        <center>
                                                            <button class="btn btn-primary btn-sm" name="btn_pes">Pesquisar</button>
                                                            <p>
                                                        </center>
                                    </form>
                                    <th>Nome da Categoria</th>
                                    <th>Ação</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                            <tr class="odd gradeX">
                                                <td><?= $categorias[$i]['nome_categoria'] ?></td>
                                                <td>
                                                    <a href="alterar_categoria.php?cod=<?= $categorias[$i]['id_categoria'] ?>" class="btn btn-warning btn-sm">Alterar</a>

                                                </td>

                                            </tr>
                                        <?php } ?>



                                    </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->



</body>

</html>