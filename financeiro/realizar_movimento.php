<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/movimentoDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/ContaDAO.php';
require_once '../DAO/CategoriaDAO.php';

$dao_cat = new CategoriaDao();
$dao_emp = new EmpresaDao();
$dao_con = new ContaDAO();

$nome_pesq = '';
$filtro = '';

if (isset($_POST['btn_gravar'])) {
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    $empresa = $_POST['empresa'];
    $conta = $_POST['conta'];
    $obs = $_POST['obs'];

    $objdao = new MovimentoDAO();
    $ret = $objdao->RealizarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta, $obs);
}

$categorias = $dao_cat->ConsultarCategoria($nome_pesq);
$empresas = $dao_emp->ConsultarEmpresa($nome_pesq, $filtro);
$contas = $dao_con->ConsultarConta();

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
        a

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2>Realizar movimento</h2>
                        <h5>Aqui você poderá realizar seus movimentos de entrada ou saída. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="realizar_movimento.php" method="post">
                    <div class="col-md-6">

                        <div class="form-group" id="divTipo" >
                            <label>Tipo do movimento*</label>

                            <select class="form-control" name="tipo" id="tipo" >
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>

                        </div>
                        <div class="form-group" id="divData" >
                            <label>Data*
                            </label>
                            <input type="date" class="form-control" placeholder="Coloque a data do movimento " name="data" id="data" />

                        </div>
                        <div class="form-group" id="divValor" >
                            <label>Valor*</label>
                            <input class="form-control" placeholder="Digite o valor do movimento" name="valor" id="valor" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="divCategoria" >
                            <label>Categoria*</label>

                            <select class="form-control" name="categoria" id="categoria" >
                                <option value="">Selecione</option>
                                <?php  foreach($categorias as $item) { ?>
                                    <option value="<?= $item ['id_categoria'] ?>">
                                    <?= $item['nome_categoria']?>
                                </option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group" id="divEmpresa" >
                            <label>Empresa*</label>

                            <select class="form-control" name="empresa" id="empresa" >
                                <option value="">Selecione</option>
                                <?php foreach ($empresas as $item) { ?>
                                    <option value="<?= $item ['id_empresa'] ?>">
                                    <?= $item['nome_empresa'] ?>
                                    </option>
                                    <?php } ?>
                                
                            </select>

                        </div>

                        <class="form-group" id="divConta">
                            <label>Conta*</label>

                            <select class="form-control" name="conta" id="conta" >
                                <option value="">Selecione</option>
                                    <?php foreach ($contas as $item) { ?>
                                        <option value="<?= $item ['id_conta'] ?>">
                                        <?= 'Banco : ' . $item['banco_conta'] . ' - ' . $item['agencia_conta'] . '/' . $item['numero_conta'] . ' - 
                                        Saldo: ' . $item['saldo_conta']?>
                                        </option>
                                    <?php } ?>
                            </select>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (opcional)</label>
                            <textarea class="form-control" rows="3" name="obs"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="btn_gravar" onclick="return ValidarMovimento()" >Finalizar lançamento</button>

                    </div>
                </form>





            </div>



        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->



</body>

</html>