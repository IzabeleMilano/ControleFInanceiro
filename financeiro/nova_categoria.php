<?php
require_once "../DAO/UtilDAO.php";
UtilDao::VerificarLogado();
require_once '../DAO/categoriaDAO.php';

if(isset($_POST['btngravar'])){
    $nome = $_POST['nome'];
    $objdao = new CategoriaDao();
    $ret = $objdao->CadastrarCategoria($nome);

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
                        <?php include_once '_msg.php'; ?>
                     <h2>Nova categoria</h2>   
                        <h5>Aqui você poderá cadastrar todas todas as suas categorias. Exemplo: Conta de luz </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <form action="nova_categoria.php" method="post">
                 <div class="form-group" id="divNome" >
                    <label>Nome da categoria</label>
                    <input class="form-control" placeholder="Digite o nome da categoria. Exemplo: Conta de luz" name="nome" id="nomecategoria"/>

                   
                </div>

                <button type="submit" class="btn btn-success" name="btngravar" onclick="return ValidarCategoria()" >Gravar</button>
                </form>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    
    
   
</body>
</html>
