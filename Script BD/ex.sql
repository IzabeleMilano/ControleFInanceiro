-- RELATORIO UM

select nome_usuario, nome_categoria
from tb_categoria 
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario
order by nome_usuario;



-- RELATORIO DOIS

select nome_usuario, nome_empresa, telefone_empresa, endereco_empresa
from tb_empresa as emp 
inner join tb_usuario as usu
on emp.id_usuario = usu.id_usuario
order by emp.telefone_empresa;

-- RELATORIO TRÊS

select nome_usuario, banco_conta, saldo_conta, numero_conta, email_usuario
from tb_conta as conta
inner join tb_usuario as usu
on conta.id_usuario = usu.id_usuario
order by conta.saldo_conta;

-- RELATORIO QUATRO

select date_format(data_cadastro, "%d/%m/%Y") as 'Data', date_format(data_movimento, "%d/%m/%Y") as 'Data Movimento', 
tipo_movimento, valor_movimento, nome_usuario
from tb_movimento as mov
inner join tb_usuario as usu
on mov.id_usuario = usu.id_usuario
order by usu.data_cadastro;

-- RELATORIO CINCO

select data_movimento, tipo_movimento, valor_movimento, nome_usuario, nome_categoria
from tb_movimento as mov
inner join tb_usuario as usu
on mov.id_usuario = usu.id_usuario
inner join tb_categoria as cat
on usu.id_usuario = cat.id_usuario;

-- RELATORIO SEIS

select nome_categoria, nome_empresa, nome_usuario, data_movimento, valor_movimento, email_usuario
from tb_movimento as mov
inner join tb_usuario as usu
on mov.id_usuario = usu.id_usuario
inner join tb_empresa as emp
on emp.id_usuario = mov.id_usuario
inner join tb_categoria as cat
on cat.id_usuario = mov.id_usuario;


-- RELATORIO SETE
select date_format(data_movimento, "%d/%m/%Y") as 'Data de movimento',
banco_conta, numero_conta, nome_categoria, nome_empresa, nome_usuario, valor_movimento
from tb_movimento as mov
inner join tb_usuario as usu
on usu.id_usuario = mov.id_usuario
inner join tb_empresa as emp
on emp.id_usuario = mov.id_usuario
inner join tb_categoria as cat
on cat.id_usuario = mov.id_usuario
inner join tb_conta as conta
on conta.id_usuario = mov.id_usuario
order by data_movimento;

select 

