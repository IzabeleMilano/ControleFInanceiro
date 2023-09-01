<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/empresaDAO.php';

$dao = new EmpresaDao();


$filtro = '';
$nome_pesq = '';

if (isset($_POST['btn_pes'])) {
    $nome_pesq = $_POST['nome_pesq'];
    $filtro = $_POST['filtro'];
}
$empresas = $dao->ConsultarEmpresa($nome_pesq, $filtro);



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
                        <h2>Consultar Empresa</h2>
                        <h5>Consulte todas as suas empresas aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Empresas cadastradas. Caso deseje alterar, clique no botão.

                            </div>


                            <form action="consultar_empresa.php" method="post">
                                <li><label>Pesquisar pelo nome</label><br>
                                <input class="form-control" name="nome_pesq" value="<?= $nome_pesq ?>" />

                                <p>
                                    <select name="filtro" class="form-control">
                                        <option <?=$filtro == 0 ? 'selected' : '' ?> value="0">TODOS</option>
                                        <option <?=$filtro == 1 ? 'selected' : '' ?> value="1">Telefone</option>
                                        <option <?=$filtro == 2 ? 'selected' : '' ?> value="2">Nome</option>
                                        <option <?=$filtro == 3 ? 'selected' : '' ?> value="3">Endereço</option>
                                        
                                    </select>
                                    <center>
                                        <button class="btn btn-primary btn-sm" name="btn_pes">Pesquisar</button>

                                    </center>



                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nome da empresa</th>
                                                    <th>Telefone</th>
                                                    <th>Endereço</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php for ($i = 0; $i < count($empresas); $i++) { ?>

                                                    <tr class="odd gradeX">


                                                    <tr class="old gradeX">
                                                        <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                                        <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                                        <td><?= $empresas[$i]['endereco_empresa'] ?></td>

                                                        <td>
                                                            <a href="alterar_empresa.php?cod=<?= $empresas[$i]['id_empresa'] ?>" class="btn btn-warning btn-sm">Alterar</a>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>


</body>

</html>