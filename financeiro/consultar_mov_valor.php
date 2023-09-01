<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/movimentoDAO.php';
$data_inicial = '';
$data_final = '';
$tipo_movimento = '';
$qtd = '';
$valor_movimento = '';





if (isset($_POST['btn_pesq'])) {

    $tipo_movimento = $_POST['tipo_movimento'];
    $data_inicial = $_POST['data_inicial'];
    $data_final = $_POST['data_final'];
    $qtd = $_POST['qtd'];
    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarValorMovimento($data_inicial, $data_final, $qtd, $tipo_movimento);
}



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
                        <form action="consultar_mov_valor.php" method="post">

                            <h2>Consultar por valor do movimento</h2>

                            <div class="col-md-6">
                                <div class="form-group" id="divInicial">
                                    <label>Data inicial
                                    </label>
                                    <input type="date" class="form-control" placeholder="Coloque a data do movimento " id="data_inicial" name="data_inicial" value="<?= $data_inicial ?> " />

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="divFinal">
                                    <label>Data final
                                    </label>
                                    <input type="date" class="form-control" placeholder="Coloque a data do movimento " id="data_final" name="data_final" value="<?= $data_final ?>" />

                                </div>
                            </div>


                    </div>
                </div>
                <!-- /. ROW  -->


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Todos*</label>

                        <select class="form-control" name="tipo_movimento">
                            <option value="0" <?= $tipo_movimento == '0' ? 'selected' : '' ?>>TODOS</option>
                            <option value="1" <?= $tipo_movimento == '1' ? 'selected' : '' ?>>Acima</option>
                            <option value="2" <?= $tipo_movimento == '2' ? 'selected' : '' ?>>Abaixo</option>
                            <option value="3" <?= $tipo_movimento == '3' ? 'selected' : '' ?>>Igual</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6">
                    <label>Valor</label>
                    <input type="text" class="form-control" placeholder="Valor" name="qtd" value="<?= $qtd ?>" />
                    <p>

                        <center>
                            <button class="btn btn-info" onclick="return ValidarConsultaPeriodo()" name="btn_pesq">Pesquisar</button>
                        </center>
                        </form>
                        <hr>
                </div>

                <?php if (isset($movs)) { ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Resultados encontrados
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Tipo</th>
                                                        <th>Categoria</th>
                                                        <th>Empresa</th>
                                                        <th>Conta</th>
                                                        <th>Valor</th>


                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    $total = 0;
                                                    for ($i = 0; $i < count($movs); $i++) {

                                                        if ($movs[$i]['tipo_movimento'] == 1) {
                                                            $total  = $total + $movs[$i]['valor_movimento'];
                                                        } else {
                                                            $total = $total - $movs[$i]['valor_movimento'];
                                                        }

                                                    ?>



                                                        <tr class="odd gradeX">
                                                            <td><?= $movs[$i]['data_movimento'] ?></td>
                                                            <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                            <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                            <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                            <td><?= $movs[$i]['banco_conta'] ?></td>
                                                            <td>
                                                                R$ <?= $movs[$i]['valor_movimento'] ?>
                                                            </td>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            </form>

                            </td>
                            </tr>

                            </td>


                        <?php } ?>

                        </table>
                        <center>
                            <label style="color: <?= $total < 0 ? 'red' : 'green' ?>;">TOTAL: R$ <?= number_format($total, 2, ',', '.'); ?></label>
                        </center>
                        </div>
                        


                    </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    </div>

    </tbody>

<?php } ?>


</html>