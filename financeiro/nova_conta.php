<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/contaDAO.php';
if(isset($_POST['btn_gravar'])){

    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $saldo = $_POST['saldo'];

    $objdao = new ContaDAO();
    $ret = $objdao->CadastrarConta($banco, $agencia, $conta, $saldo);
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
       
    
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once'_msg.php' ?>
                     <h2>Nova conta</h2>   
                        <h5>Aqui você poderá cadastrar todas as suas contas.  </h5>
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <form action="nova_conta.php" method="post">
                 <div class="form-group" id="divBanco" >
                    <label>Nome do banco*</label>
                    <input class="form-control" placeholder="Digite o nome do banco." name="banco" id="banco" />

                   
                </div>
                <div class="form-group" id="divAgencia" >
                    <label>Agência</label>
                    <input class="form-control" placeholder="Digite a agência*" name="agencia" id="agencia" />

                   
                </div>
                <div class="form-group" id="divNumero" >
                    <label>Número da conta</label>
                    <input class="form-control" placeholder="Digite o número da conta " name="conta" id="numero" />

                   
                </div>
                <div class="form-group" id="divSaldo" >
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta " name="saldo" id="saldo" />

                   
                </div>

                <button type="submit" class="btn btn-success" name="btn_gravar" onclick=" return ValidarConta()" >Gravar</button>
                </form>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    
    
   
</body>
</html>
