<?php


class CadastroDao
{
    public function ValidarCadastro($nome, $email, $senha, $valsenha)
    {
        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($valsenha) == '') {
            return 0;
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return 6;
        }
        
        
        if (strlen($senha) < 6) {
            return 4;
        }
        if (!($senha == $valsenha)) {
            return 5;
        }
        
        
    }

}


