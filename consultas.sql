
    <?php foreach($this->model->ListarDatosPersonales() as $r): ?>
               <tr>
                 <th><?php echo $r->curp; ?></th>
                 <th><?php echo $r->primerApellido; ?></th>
                 <th><?php echo $r->segundoApellido; ?></th>
                 <th><?php echo $r->nombres; ?></th>
                 <th><?php echo $r->curp; ?></th>
                 <th>Edit</th>
                 <th>Borrar</th>
                 <th>Ver</th>
                <?php endforeach; ?>


  select b.idBeneficiario, 
  b.curp, 
  b.primerApellido, 
  b.segundoApellido,
  b.nombres, 
  idOf.identificacion AS nombreId
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



			  select
			  b.idBeneficiario, 
			  b.curp, 
			  b.primerApellido, 
			  b.segundoApellido,
			  b.nombres, 
			  idOf.identificacion as nomTipoI, 
			  tV.tipoVialidad,
			  b.nombreVialidad,
			  b.noExterior,
			  b.noInterior,
			  a.nombreAsentamiento,
			  l.localidad,
 			  b.entreVialidades,
  			  b.descripcionUbicacion,
                          b.estudioSocioeconomico,
			  eC.estadoCivil, 
			  b.jefeFamilia
			  o.ocupacion, 
			  iM.ingresoMensual,
			  b.integrantesFamilia,
			  b.dependientesEconomicos,
			  v.vivienda, 
  			  b.noHabitantes,
			  b.viviendaElectricidad,
			  b.viviendaAgua,
			  b.viviendaDrenaje,
			  b.viviendaGas,
			  b.viviendaTelefono,
  			  b.viviendaInternet
			  nE.nivelEstudios, 
			  sS.seguridadSocial,
			  d.discapacidad, 
			  gV.grupoVulnerable,
			  b.beneficiarioColectivo
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
			  b.idEstadoCivil = eC.idEstadoCivil AND  
                          b.idOcupacion = o.idOcupacion AND
                          b.idIngresoMensual = iM.idIngresoMensual AND 
                          b.idVivienda =  v.idVivienda AND
                         b.idNivelEstudios = nE.idNivelEstudios AND
                         b.idSeguridadSocial = sS.idSeguridadSocial AND  
                         b.idDiscapacidad = d.idDiscapacidad AND 
                         b.idGrupoVulnerable =gV.idGrupoVulnerable AND 
                         b.idAsentamientos = a.idAsentamientos AND  
                         b.idLocalidad = l.idLocalidad;

 			select
			  b.idBeneficiario, 
			  b.curp, 
			  b.primerApellido, 
			  b.segundoApellido,
			  b.nombres, 
			  idOf.identificacion as nomTipoI, 

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




 select b.idBeneficiario, b.curp, b.primerApellido,  b.segundoApellido, b.nombres,  idOf.identificacion as nomTipoI, tV.tipoVialidad, b.nombreVialidad, b.noExterior, b.noInterior, a.nombreAsentamiento, l.localidad,b.entreVialidades, b.descripcionUbicacion, b.estudioSocioeconomico, eC.estadoCivil, b.jefeFamilia, o.ocupacion, iM.ingresoMensual, b.integrantesFamilia, b.dependientesEconomicos, v.vivienda, b.noHabitantes, b.viviendaElectricidad, b.viviendaAgua, b.viviendaDrenaje, b.viviendaGas,  b.viviendaTelefono, b.viviendaInternet, nE.nivelEstudios,  sS.seguridadSocial, d.discapacidad, gV.grupoVulnerable,  b.beneficiarioColectivo  from identificacionOficial idOf, tipoVialidad tV, estadoCivil eC, ocupacion o, vivienda v,nivelEstudio nE, seguridadSocial sS,  discapacidad d,  grupoVulnerable gV, asentamientos a, localidades l,  ingresoMensual iM, beneficiarios  b where  b.idIdentificacion = idOf.idIdentificacion AND b.idTipoVialidad = tV.idTipoVialidad AND b.idEstadoCivil = eC.idEstadoCivil AND  b.idOcupacion = o.idOcupacion AND  b.idIngresoMensual = iM.idIngresoMensual AND b.idVivienda =  v.idVivienda AND  b.idNivelEstudios = nE.idNivelEstudios AND   b.idSeguridadSocial = sS.idSeguridadSocial AND   b.idDiscapacidad = d.idDiscapacidad AND b.idGrupoVulnerable =gV.idGrupoVulnerable AND  b.idAsentamientos = a.idAsentamientos AND  b.idLocalidad = l.idLocalidad;






 insert into identificacionOficial values (1,"curp");

 insert into tipoVialidad values (1,"calle");


insert into estadoCivil values (1,"SOLTERO");


insert into ocupacion values (1,"obrero");


 insert into ingresoMensual values (1,"asalariado");



 insert into vivienda values (1,"propia");


insert into nivelEstudio values (1,"secundaria");


insert into seguridadSocial values (1,"IMSS");

 insert into discapacidad values (1,"NO HAY");


 insert into grupoVulnerable values (1,"NO HAY");


 insert into grupoVulnerable values (3,"Madre solteras");


 insert into asentamientos values (1,"villanueva","villanueva","urbano",1);


 insert into localidades values (1,"villanueva","villanueva","urbano");

INSERT INTO `beneficiarios`  VALUES ( 'ass', 'sdds', 'sdds', 'sds', '1', '1', 'sdsd', '3', '3', '1', '1', 'cxxc', 'xccx', '1', '1', '1', '1', '1', 'a', 'a', '1', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '1', '1', '1', '3', 'a');






where  b.idIdentificacion = idOf.idIdentificacion AND
 b.idTipoVialidad = tV.idTipoVialidad AND 
b.idEstadoCivil = eC.idEstadoCivil AND  
b.idOcupacion = o.idOcupacion AND  
b.idIngresoMensual = iM.idIngresoMensual AND 
b.idVivienda =  v.idVivienda AND  
b.idNivelEstudios = nE.idNivelEstudios AND  
 b.idSeguridadSocial = sS.idSeguridadSocial AND   
b.idDiscapacidad = d.idDiscapacidad AND
 b.idGrupoVulnerable =gV.idGrupoVulnerable AND 
 b.idAsentamientos = a.idAsentamientos AND  
b.idLocalidad = l.idLocalidad;

  
 
(`idBeneficiario`, `curp`, `primerApellido`, `segundoApellido`, `nombres`, `idIdentificacion`, `idTipoVialidad`, `nombreVialidad`, `noExterior`, `noInterior`, `idAsentamientos`, `idLocalidad`, `entreVialidades`, `descripcionUbicacion`, `estudioSocioeconomico`, `idEstadoCivil`, `jefeFamilia`, `idOcupacion`, `IDingresoMensual`, `integrantesFamilia`, `dependientesEconomicos`, `vivienda`, `noHabitantes`, `viviendaElectricidad`, `viviendaAgua`, `viviendaDrenaje`, `viviendaGas`, `viviendaTelefono`, `viviendaInternet`, `nivelEstudios`, `tipoSeguridadSocial`, `discapacidad`, `grupoVulnerable`, `beneficiarioColectivo`)


insert into beneficiarios(curp,primerApellido,segundoApellido,
nombres,idIdentificacion,idNivelEstudios,idSeguridadSocial,
idDiscapacidad)values(?,?,?,?,
?,?,?,?)



