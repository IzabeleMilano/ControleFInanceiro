

select nome_usuario, nome_categoria , usu.id_usuario
from tb_categoria as cat
inner join tb_usuario as usu
where usu.nome_usuario like 'A%'
and usu.id_usuario > 3;

-- RELATORIO DOIS
select nome_usuario, nome_categoria
from tb_categoria
inner join tb_usuario
on tb_usuario.id_usuario = tb_categoria.id_usuario
where tb_categoria.id_usuario = 1;

-- RELATORIO TRES
select nome_categoria, nome_empresa, nome_usuario, data_movimento, valor_movimento
from tb_movimento as mov
inner join tb_usuario as usu
on usu.id_usuario = mov.id_usuario
inner join tb_empresa as emp
on emp.id_usuario = mov.id_usuario
inner join tb_categoria as cat
on cat.id_usuario = mov.id_usuario
where mov.tipo_movimento = 1;

-- RELATORIO QUATRO
select conta.banco_conta, conta.numero_conta, cat.nome_categoria, emp.nome_empresa, usu.nome_usuario, mov.data_movimento, mov.valor_movimento
from tb_movimento as mov
inner join tb_usuario as usu
on usu.id_usuario = mov.id_usuario
inner join tb_empresa as emp
on emp.id_usuario = mov.id_usuario
inner join tb_categoria as cat
on cat.id_usuario = mov.id_usuario
inner join tb_conta as conta
on conta.id_usuario = mov.id_usuario
where mov.tipo_movimento = 1
and mov.id_usuario in (1,2);




