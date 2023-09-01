
insert into tb_usuario 
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Ana Maria','ana@gmail.com','senha123','2023/04/08');

insert into tb_usuario 
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Carlos Junior', 'carlos@gmail.com', '44510', '2021-02-25');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Alexandre Junior','ale@gmail.com','3323','2023-04-08');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Alimentação', 1);





insert into tb_categoria
(nome_categoria, id_usuario)
values
('Luz', 4 );

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Gás', 4);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Telefone', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Internet', 5);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Aluguel', 6);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Agua', 6);


insert into tb_categoria
(nome_categoria, id_usuario)
values
('Internet', 7);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Agua', 7);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Aluguel', 8);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Telefone', 8);




insert into tb_categoria
(nome_categoria, id_usuario)
values
('Viagens', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values('Empresa Colchão','4365242638','Rua dos Colchões',1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Salgado', '4525785954', 'Rua do Salgado', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Doce', '4524789565', 'Rua dos doces', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Cimento','4525878595','Rua do Cimento',5);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa da Janela', '4585878985', 'Rua da Janela', 5);


insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa da Porta', '7858654875', 'Rua da Porta', 6);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Tijolo', '4587859685', 'Rua dos Tijolos', 6);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Telhado', '4587859654', 'Rua do Telhado', 7);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Ventilador', '7854896535', 'Rua do Ventilador', 7 );

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa do Garfo', '8796548975', 'Rua dos Garfos', 8);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa da Colher', '8587459635', 'Rua dos Garfos', 8);





insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Empresa comer bem', '436584759684', 'Rua dos restaurantes', 2);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '2535', '1235', 4525.20, 1);


insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '5489', '5625', 4585.25, 4);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', '7856', '6585', 562.56, 4);


insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '5625', '963', 526.56, 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Caixa', '562', '859', 236.52, 5);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Banco do Brasil', '5685', '563', 125.56, 6);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '568', '635', 52.52, 6);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '5635', '525', 569.52, 7);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Santander', '6535', '6585', 95.85, 8);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '5254', '525', 85.65, 8);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Nubank', '5426', '5428', 352.65, 7);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', '4525', '3658', 65.52, 7);


insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Bradesco', '5243', '5425', 3654.45, 2);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2023-04-08', 45, null, 1, 1, 1, 1 );

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2023-04-08', 35.26, 'Pagamento adiantado', 2, 2, 2, 2);


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1,'2023-04-08', 25.26, 'Pagamento adiantado', 3, 3, 3, 4 );

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2,'2023-04-08', 52.26,'Pagamento', 4, 4, 5, 4 );


insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2023-04-12','25.30','Pagamento', 5, 5, 6, 5);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2023-04-12', 30.50, 'Pagamento', 6, 6, 7, 5);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2023-04-12', 85.10, 'Pagamento', 7, 7, 8, 6);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2023-04-12', 523.65, 'Pagamento', 8, 9, 9, 6);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2023-04-12', 875.56, 'Pagamento', 9, 12, 10, 7);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2023-04-12', 52.78, 'Pagamento', 10, 13, 11, 7);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(1, '2023-04-12', 3.50, 'Pagamento', 11, 10, 12, 8);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_empresa, id_conta, id_categoria, id_usuario)
values
(2, '2023-04-12', 985.45, 'Pagamento', 12, 11, 13, 8);

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Fernanda Alves', 'fernanda@gmail.com', '1234', '2023/04/11');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Helena Sousa','helena@gmail.com','2345','2023/04/11');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario,data_cadastro)
values
('Ana Luiza','analu@gmail.com','4588','2023/04/11');

insert into tb_usuario
(nome_usuario,email_usuario,senha_usuario,data_cadastro)
values
('Maria Clara','mariaclara@gmail.com','7896','2023/04/11');

insert into tb_usuario
(nome_usuario,email_usuario,senha_usuario,data_cadastro)
values
('Franciele Medeiros', 'fran@gmail.com','2548','2023/04/11');




