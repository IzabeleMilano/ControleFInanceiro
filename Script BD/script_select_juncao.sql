select nome_usuario, email_usuario
from tb_usuario;

select nome_categoria, nome_usuario
from tb_categoria
inner join tb_usuario
on tb_categoria.id_usuario = tb_usuario.id_usuario;


select nome_usuario, email_usuario
from tb_usuario;

select nome_categoria, nome_usuario
from tb_usuario
inner join tb_categoria
on tb_usuario.id_usuario = tb_categoria.id_usuario;

select nome_usuario, nome_empresa
from tb_empresa
inner join tb_usuario
on tb_usuario.id_usuario = tb_empresa.id_usuario;

select nome_usuario, banco_conta, agencia_conta, numero_conta, saldo_conta
from tb_conta
inner join tb_usuario
on tb_conta.id_usuario = tb_usuario.id_usuario;


select nome_usuario, tipo_movimento, data_movimento, valor_movimento, banco_conta, nome_empresa, nome_categoria
from tb_movimento
inner join tb_usuario
on tb_usuario.id_usuario = tb_movimento.id_usuario
inner join tb_conta
on tb_conta.id_conta = tb_movimento.id_conta
inner join tb_empresa
on tb_empresa.id_empresa = tb_movimento.id_empresa
inner join tb_categoria
on tb_categoria.id_categoria = tb_movimento.id_categoria;

