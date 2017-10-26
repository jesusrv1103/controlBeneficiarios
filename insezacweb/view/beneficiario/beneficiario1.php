
            <form action="?c=Beneficiario&a=Guardar" method="post" class="form-horizontal row-border">

              <input  name="idBeneficiario"  value="<?php echo $beneficiario->idBeneficiario != null ? $beneficiario->idBeneficiario : 0;  ?>"/>
                <?php echo $beneficiario->curp;?>
         

             
            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="?c=Programa" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
       