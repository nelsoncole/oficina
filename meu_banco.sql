
drop database oficina;
insert into cidades(nome_cidade,UF,cod_ibge)value("Lubango", "Huila","01");

insert into clientes(nome, dtnascimento, cpf,sexo,rg,orgaoexpedidor,email,
cep,endereco,numero,complemento,bairro,telefone,celular,id_cidade)
value("Nelson Cole","1994-04-30",1,1,1,"","nelsoncole72@gmail.com",
1,"",123,"","","942302639","942188931",1);

insert into users(name,email,password,id_cliente)value("nelsoncole", "200097","$2y$12$ixJG5aHdD0qVEGVmN5D0hO8pZe1id0fIsJyJ2ILHIZC4cAiXBFIDC",1);



