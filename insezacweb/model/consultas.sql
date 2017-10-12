
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

