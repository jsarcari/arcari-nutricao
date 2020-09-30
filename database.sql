drop table if exists paciente;
drop table if exists consulta;

create table paciente(
	idPaciente	 		 serial not null,
	nomePaciente 		 char(60) not null,
	sexoPaciente		 char(1) not null,
	nascimentoPaciente	 date not null,
	primary key (idPaciente)
);

create table consulta(
	idConsulta			 serial not null,
	idPaciente			 integer not null,
	dataConsulta		 date not null,
	pesoPaciente		 numeric not null,
	alturaPaciente		 numeric not null,
	gorduraPaciente		 numeric,
	foreign key (idPaciente) references paciente,
	primary key (idConsulta)
);

create function calculaImc(peso numeric, altura numeric)
returns numeric as $$
begin
	return peso/(altura*altura);
End;
$$ language plpgsql