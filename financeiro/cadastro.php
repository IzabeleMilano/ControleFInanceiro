<?php

require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/CadastroDAO.php';
if (isset($_POST['btn_gravar'])) {


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rsenha = $_POST['rsenha'];
    $objdao = new UsuarioDAO();
    $ret = $objdao->CriarCadastro($nome, $email, $senha, $rsenha);
    
 
}


?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Controle Financeiro : Cadastro </h2>

                <h5>( Faça seu cadastro )</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher todos os campos </strong>
                    </div>
                    <div class="panel-body">

                        <br />
                        <?php include_once '_msg.php'; ?>
                        <form action="cadastro.php" method="post">
                            <div class="form-group input-group" id="divNome">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Seu nome" name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>" />
                            </div>

                            <div class="form-group input-group" id="divEmail">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Seu e-mail" name="email" id="email" value="<?= isset($email) ? $email : '' ?>" />
                            </div>
                            <div class="form-group input-group" id="divSenha">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie sua senha (minímo 6 carácteres)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>" />
                            </div>
                            <div class="form-group input-group" id="divRsenha">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita a senha criada" name="rsenha" id="rsenha" value="<?= isset($rsenha) ? $rsenha : '' ?>" />
                            </div>


                            <button type="submit" class="btn btn-success" name="btn_gravar" onclick=" return ValidarCadastro()">Finalizar</button>

                            <hr />
                            Já possui cadastro ? <a href="login.php">Clique aqui</a>
                        </form>

                    </div>

                </div>
            </div>


        </div>
    </div>



</body>

</html>