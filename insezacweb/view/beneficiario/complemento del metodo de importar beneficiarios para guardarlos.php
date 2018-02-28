/*else{
           $verificaBen=$this->model->VerificaBeneficiario($ben->curp);
           if($verificaBen==null){
            //Datos de registro
            $consult = $this->model->ObtenerIdMunicipio($claveMunicipio);
            $ben->idMunicipio=$consult->idMunicipio;
            $ben->idRegistro=$this->model->RegistraDatosRegistro($ben);
            $this->model->ImportarBeneficiario($ben);
            $this->numRegistros=$this->numRegistros+1;
          }else{
            $obtenerIdBeneficiario=$this->model->ObtenerIdBeneficiario($ben->curp);
            $idRegistro=$this->model->ObtenerIdRegistro($obtenerIdBeneficiario->idBeneficiario);
            $ben->idRegistro=$idRegistro->idRegistro;
            $this->model->RegistraActualizacion($ben);
            $this->model->Actualizar($ben);
            $this->numActualizados=$this->numActualizados+1;*/
          //}