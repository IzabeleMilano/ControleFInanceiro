
function ValidarMeusDados() {
  var nome = $("#nome").val();
  var email = $("#email").val();

  if (nome.trim() == "") {
    alert("Preencher o campo NOME");
    $("#nome").focus();
    $("#divNome").addClass("has-error");
    return false;
  } else {
    $("#divNome").removeClass("has-error").addClass("has-success");
   
  }

  if (email.trim() == "") {
    alert("Preencher o campo EMAIL");
    $("#email").focus();
    $("#divEmail").addClass("has-error");
    return false;
  } else {
    $("#divEmail").removeClass("has-error").addClass("has-success");
  }
}

function ValidarCategoria() {
  if ($("#nomecategoria").val().trim() == "") {
    alert("Preencher o campo NOME DA CATEGORIA");
    $("#nomecategoria").focus();
    $("#divNome").addClass("has-error");
    return false;
  } else {
    $("#divNome").removeClass("has-error").addClass("has-success");
  }
}

function ValidarEmpresa() {
  if ($("#nomeempresa").val().trim() == "") {
    alert("Preencher o campo NOME DA EMPRESA");
    $("#nomeempresa").focus();
    $("#divEmpresa").addClass("has-error");
    return false;
  }else {
    $("#divEmpresa").removeClass("has-error").addClass("has-success");
  }
}

function ValidarConta() {
  if ($("#banco").val().trim() == "") {
    alert("Preencher o NOME DO BANCO");
    $("#banco").focus();
    $("#divBanco").addClass("has-error");
    return false;
  }else {
    $("#divBanco").removeClass("has-error").addClass("has-success");
  }
  if ($("#agencia").val().trim() == "") {
    alert("Preencher o NÚMERO DA AGÊNCIA");
    $("agencia").focus();
    $("#divAgencia").addClass("has-error");
    return false;
  }else {
    $("#divAgencia").removeClass("has-error").addClass("has-success");
  }
  if ($("#numero").val().trim() == "") {
    alert("Preencher o NÚMERO DA CONTA");
    $("numero").focus();
    $("#divNumero").addClass("has-error");
    return false;
  } else {
    $("#divNumero").removeClass("has-error").addClass("has-success");
  }
  if ($("#saldo").val().trim() == "") {
    alert("Preencher o SALDO");
    $("saldo").focus();
    $("#divSaldo").addClass("has-error");
    return false;
  } else {
    $("#divSaldo").removeClass("has-error").addClass("has-success");
  }
}

function ValidarMovimento() {
  if ($("#tipo").val() == "") {
    alert("Selecione o TIPO DE MOVIMENTO");
    $("tipo").focus();
    $("#divTipo").addClass("has-error");
    return false;
  } else{
    $("#divTipo").removeClass("has-error").addClass("has-success");
  }
  if ($("#data").val() == "") {
    alert("Selecione uma DATA");
    $("data").focus();
    $("#divData").addClass("has-error");
    return false;
  } else{
    $("#divData").removeClass("has-error").addClass("has-success");
  }
  if ($("#valor").val().trim() == "") {
    alert("Preencher o VALOR");
    $("valor").focus();
    $("#divValor").addClass("has-error");
    return false;
  }else {
    $("#divValor").removeClass("has-error").addClass("has-success");
  }
  if ($("#categoria").val() == "") {
    alert("Selecione uma CATEGORIA");
    $("categoria").focus();
    $("#divCategoria").addClass("has-error");
    return false;
  } else {
    $("#divCategoria").removeClass("has-error").addClass("has-success");
  }
  if ($("#empresa").val().trim() == "") {
    alert("Preencher o campo EMPRESA");
    $("empresa").focus();
    $("#divEmpresa").addClass("has-error");
    return false;
  } else {
    $("#divEmpresa").removeClass("has-error").addClass("has-success");
  }
  if ($("#conta").val().trim() == "") {
    alert("Selecione uma CONTA");
    $("conta").focus();
    $("#divConta").addClass("has-error");
    return false;
  }else {
    $("#divConta").removeClass("has-error").addClass("has-success");
  }
}

function ValidarConsultaPeriodo() {
  if ($("#data_inicial").val().trim() == "") {
    alert("Preencher a DATA INICIAL");
    $("data_inicial").focus();
    $("#divInicial").addClass("has-error");
    return false;
  }else {
    $("#divInicial").removeClass("has-error").addClass("has-success");
  }
  if ($("#data_final").val().trim() == "") {
    alert("Preenche a DATA FINAL");
    $("data_final").focus();
    $("#divFinal").addClass("has-error");
    return false;
  }else {
    $("#divFinal").removeClass("has-error").addClass("has-success");
  }
}
function ValidarLogin() {
  if ($("#email").val().trim() == "") {
    alert("Preencher o EMAIL");
    $("email").focus();
    $("#divEmail").addClass("has-error");
    return false;
  }else {
    $("#divEmail").removeClass("has-error").addClass("has-success");
  }
  if ($("#senha").val().trim() == "") {
    alert("Preencher a SENHA");
    $("senha").focus();
    $("#divSenha").addClass("has-error");
    return false;
  }else {
    $("#divSenha").removeClass("has-error").addClass("has-success");
  }
}
function ValidarCadastro() {
  if ($("#nome").val().trim() == "") {
    alert("Preencher o NOME");
    $("nome").focus();
    $("#divNome").addClass("has-error");
    return false;
  }else{
    $("#divNome").removeClass("has-error").addClass("has-success");
  }
  if ($("#email").val().trim() == "") {
    alert("Preencher o EMAIL");
    $("email").focus();
    $("#divEmail").addClass("has-error");
    return false;
  } else {
    $("#divEmail").removeClass("has-error").addClass("has-success");
  }
  if ($("#senha").val().trim() == "") {
    alert("Preencher a SENHA");
    $("senha").focus();
    $("#divSenha").addClass("has-error");
    return false;
  }else{
    $("#divSenha").removeClass("has-error").addClass("has-success");
  }
  if ($("#senha").val().trim().length < 6) {
    alert("A senha deverá conter no minímo 6 caracteres");
    $("senha").focus();
    return false;
  }
  if($("#senha").val().trim() != $("#rsenha").val().trim()){
    alert("Os campos SENHA e REPETIR SENHA deverão ser iguais");
    $('rsenha').focus();
    $("#divRsenha").addClass("has-error");
    return false;
  }else{
    $("#divRsenha").removeClass("has-error").addClass("has-success");
  }
}

//if ($("#nomecategoria").val().trim() == "")
//se , usando o JQuary eu quero selecionar o elemento que tenha o ID (nomecategoria) var(recuperar o valor) tirando o excesso de espaço do campo com o ID(nomecategoria) se ele for == ''
// $ -> menciona a biblioteca JQuery

//criar function
//botão: onclick (ao clicar)="return NomeDaFunção()" PS: ao clicar no botão, ele retorna o q está no VALIDARMEUSDADOS, se retornar falso, não vai pro servidor.
//criar os ID's
//jogar no HEAD(referência de todos os arquivos que estão sendo utilizados)
