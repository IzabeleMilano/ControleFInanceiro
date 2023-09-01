<?php
require_once 'funcao/funcao_generica.php';

if(isset($_POST['btn_mostrar'])){
    $nome = trim($_POST['nome']);
    $desc = trim($_POST['desc']);
    $senha = trim($_POST['senha']);
    $rsenha = trim($_POST['rsenha']);
 
 $boneco_maleta = true;
    // por padrão, essa condição é testada como verdadeira. "SE FOR VERDADEIRO O RETORNO."
    
if(!ValidarqtdCaracteres($nome, 3)){
    $boneco_maleta = false;
echo 'Nome deverá conter no minímo 3 caracteress <br>';
}

if(!ValidarqtdCaracteres($desc, 50)){
    $boneco_maleta = false;
    echo 'Descrição deverá ter no minímo 50 caracteres <br>';
}
if(!ValidarqtdCaracteres($senha, 6)){
    $boneco_maleta = false;
    echo 'Senha deverá ter no minímo 6 caracteres <br>';
}
else if(!ChecarSenhaRepetirSenha($senha, $rsenha)){
    $boneco_maleta = false;
    echo 'Os campos SENHA e REPETIR SENHA deverão ser iguais <br>';
}

if($boneco_maleta){
    echo 'Campos validados com sucesso';
}
}
?>