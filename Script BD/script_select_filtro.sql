select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%n%';

select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like 'C%';

select nome_usuario, data_cadastro
from tb_usuario
where nome_usuario like '%R';

select nome_usuario, data_cadastro
from tb_usuario
where data_cadastro between '2023-04-10' and '2023-04-20';

select banco_conta, agencia_conta, saldo_conta
from tb_conta
where id_usuario = 4;

select nome_usuario, tipo_movimento, date_format(data_movimento, "%d/%m/%Y") as data_movimento, valor_movimento, banco_conta, nome_empresa, nome_categoria
from tb_movimento
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.id_usuario
inner join tb_conta
on tb_conta.id_conta = tb_movimento.id_conta
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.id_categoria
where tb_movimento.tipo_movimento = 1;


select sum(valor_movimento) as total
from tb_movimento
where tipo_movimento = 1
and id_usuario = 1