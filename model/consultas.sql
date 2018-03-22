


insert into asentamientos values("1234","VILLANUEVA","ZACATECAS","EL VERGEL",1);

insert into localidades values ("1235","VILLANUEVA","ZACATECAS","RURAL");

insert into  municipio  values("12356","VILLANUEVA",12,"Activo");

insert into direccion values(1,"TI","Dedicada al emprendimiento","Juan","Activo");


insert into usuarios values (1,"juan","b8b22bf5f97416b3960f3366247d18741c943d22",1,1);

insert into identificacionOficial values(1,"CURP");

insert into nivelEstudio values(1,"Secundaria");


insert into seguridadSocial values(1,"IMSS");

insert into discapacidad values(1,"IMSS");


insert into discapacidad values(2,"No hay");

insert into tipoVialidad values (1,"Calle");


insert into  localidades values("12ADD","Villanueva", "Zacatecas","Urbano");


insert into asentamientos values(1,"Villanueva","Zacatecas","Adjuntas",1);

insert ingresoMensual values(1,"Nomina");

insert into grupoVulnerable values(1,"Huichol");

insert into estadoCivil values(1,"Soltero");

insert into ocupacion values(1,"Obrero");
 

 insert into ocupacion values(1,"Obrero");

insert into vivienda values(1,"Casa");


insert into programa (1,"Seguridad");

insert into subprograma values(1,"Subprograma","Programa",1);

insert into caracteristicasApoyo values(1,"Caracteristica",1);

insert into programaSocial values(1,1,"nombrePrograma",1); 

  insert into periodicidad values(1,"semestral");






insert into apoyos values(1,1,1,1,1,1,1000,2,"1995/11/12",1,1);



  select b.idBeneficiario, 
  b.curp, 
  b.primerApellido, 
  b.segundoApellido,
  b.nombres, 
  idOf.identificacion, 
  tV.tipoVialidad, 
  eC.estadoCivil, 
  o.ocupacion, 
  iM.ingresoMensual,
  v.vivienda, 
  nE.nivelEstudios, 
  sS.seguridadSocial,
  d.discapacidad, 
  gV.grupoVunerable,
  a.nombreAsentamiento, 
  l.localidad 
  from identificacionOficial idOf, 
  tipoVialidad tV, estadoCivil eC, 
  ocupacion o, vivienda v, 
  nivelEstudio nE,
  seguridadSocial sS, 
  discapacidad d, 
  grupoVulnerable gV, 
  asentamientos a, localidades l, 
  ingresoMensual iM, beneficiarios  b
    where  b.idIdentificacion = idOf.idIdentificacion AND   
   	b.idTipoVialidad = tV.idTipoVialidad AND 	
	b.estadoCivil = eC.idEstadoCivil AND 
    b.ocupacion = o.idOcupacion AND 
    b.ingresoMensual = iM.idIngresoMensual AND 
    b.vivienda =  v.idVivienda AND   
    b.nivelEstudios = nE.idNivelEstudios AND  
    b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
    b.discapacidad = d.idDiscapacidad AND  
   	b.grupoVulnerable =gV.idGrupoVulnerable AND 
    b.claveAsentamiento = a.idAsentamientos AND 
    b.claveLocalidad = l.idLocalidad;


        select b.idBeneficiario, 
        b.curp, 
        b.primerApellido, 
        b.segundoApellido,
        b.nombres, 
        idOf.identificacion
        from identificacionOficial idOf, 
        tipoVialidad tV, estadoCivil eC, 
        ocupacion o, vivienda v, 
        nivelEstudio nE,
        seguridadSocial sS, 
        discapacidad d, 
        grupoVulnerable gV, 
        asentamientos a, localidades l, 
        ingresoMensual iM, beneficiarios  b
          where  b.idIdentificacion = idOf.idIdentificacion AND   
          b.idTipoVialidad = tV.idTipoVialidad AND  
        b.estadoCivil = eC.idEstadoCivil AND 
          b.ocupacion = o.idOcupacion AND 
          b.ingresoMensual = iM.idIngresoMensual AND 
          b.vivienda =  v.idVivienda AND   
          b.nivelEstudios = nE.idNivelEstudios AND  
          b.tipoSeguridadSocial = sS.idSeguridadSocial AND  
          b.discapacidad = d.idDiscapacidad AND  
          b.grupoVulnerable =gV.idGrupoVulnerable AND 
          b.claveAsentamiento = a.idAsentamientos AND 
          b.claveLocalidad = l.idLocalidad;

