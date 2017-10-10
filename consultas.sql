
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
			  b.id
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
			    b.claveLocalidad = l.idLocalidad




  
 

