<?php


if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}
if (isset($ret)) {

    switch ($ret) {
        case 0:
            echo ' <div class="alert alert-warning">
Preencher o(s) campo(s) obrigatório(s)</a>.
</div>';
            break;
        case 1:
            echo ' <div class="alert alert-success">
Ação realizada com sucesso</a>.
</div>';
            break;
        case -1:
            echo ' <div class="alert alert-danger">
Ocorreu um erro na operação. Tente mais tarde.</a>.
</div>';
            break;

        case 4:
            echo '<div class="alert alert-danger"> A senha deve ter no minímo 6 caracteres.</a>.</div>';

            break;

        case 5:
            echo '<div class="alert alert-danger"> A senha e Repetir Senha devem ser iguais.</a></div>';

            break;

        case 6:
            echo '<div class="alert alert-danger"> Digite um email válido.</a></div>';

            break;

        case -4:
            echo '<div class="alert alert-danger"> O registro não poderá ser excluido pois está em uso.</a></div>';

            break;
        case -5:
            echo '<div class="alert alert-danger"> Email já cadastrado.</a></div>';

            break;
        case -6:
            echo '<div class="alert alert-danger"> Usuario não encontrado.</a></div>';

            break;
    }
}
