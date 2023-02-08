<section id="ligamos" class="hidden-md-down py-8 ">
    <div class="container">
        <div class="text-center text-sm-left row">
            <div class="col-md-9 pb-3">
            <h3 class="font-weight-bold text-title">SOLICITE SUA COTAÇÃO</h3>
            <span class="text-muted"> Solicite sua cotação que entraremos em contato o mais rapído possível. </span> </div>
            <div class="col-md-3">
            <button  type="button" data-toggle="modal" data-target="#exampleModal" class="text-center btn btn-danger btn-lg p-4 mb-3 radius">SOLICITAR COTAÇÃO</button>
            </div>
        </div> 
    </div>
</section>

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 99999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex flex-column px-3 pt-3">           
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
        </button>       
        <h4 class="font-weight-bold modal-title" id="exampleModalLabel">SOLICITE SUA COTAÇÃO</h4>
         <span class="text-muted">Preencha o formulario abaixo que um consultor de segurança entrará em contato</span>        
      </div>
      <div class="text-muted modal-body py-0">
         	 <form action="http://gpi.ddns.me:9093/control/captacao.php" data-toggle="validator" role="form" method="post">
              <div class="content py-3">
                       <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="nome" placeholder=" SEU NOME" required>
                                </div>
                               <div class="form-group row" >
                                    <div class="col-md-3 col-4 pr-0">
                                        <input type="text" class="form-control form-control-lg" name="ddd" placeholder="DDD" maxlength="2" required>
                                    </div>
                                        <div class="col-md-9 col-8">
                                            <input type="text" class="form-control form-control-lg" name="telefone" placeholder="SEU TELEFONE" maxlength="9" required>
                                        </div>
                                </div>
                                <div class=" form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="SEU E-MAIL" required>
                                </div>
                                 <div class="form-group">
                                    <select id="interesse" name="interesse" required="" class="custom-select form-control form-control-lg">
                                  <option value="alarme Residencial">ALARME RESIDÊNCIAL</option>
                                  <option value="alarme Comercial">ALARME COMERCIAL</option>
                                </select>
                                </div>
                                <div class=" form-group">
                                    <textarea class="form-control form-control-lg  text-area" rows="5" name="mensagem"  placeholder="DIGITE SUA MENSAGEM" id="mensagem"></textarea>
                                </div>                                                                 
                                      <input name="tipo_form" value="index.php" type="hidden">
                                       <input type="hidden" name="acao" value="form_grupoVolpato"> 
                                          <input type="hidden" name="origem" value="form-modal">  
                                          <input name="origem" value="www.volpato.rs/obrigado.php" type="hidden"> 
                                          <input type="submit" name="Submit" class="submit btn btn-danger btn-lg btn-block" value="Solicitar Cotação">
                    </div>
                </form>
      </div>
        
</div>
  </div>
</div>





