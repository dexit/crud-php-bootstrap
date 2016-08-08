<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP e MySQL - CRUD</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
</head>
<body>


  <nav class="navbar navbar-inverse navbar-fixed-top">
   <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Fechar</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="#">CRUD</a>
    </div>
   </div>
  </nav>

<br/><br/><br/>
<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Novo Cliente</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Clientes:</h3>
            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Novo Usuario -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Novo Cliente</h4>
            </div>

            <br/>
            <form class='form-horizontal' role='form'>

              <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Nome</label>
                <div class='col-md-6'>
                  <div class='form-group'>
                    <div class='col-md-11'>
                      <input class='form-control' id='nome' placeholder='Nome' type='text'>
                    </div>
                  </div>
                </div>
              </div>

              <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_email'>E-mail</label>
                <div class='col-md-4'>
                  <div class='form-group'>
                    <div class='col-md-11'>
                      <input class='form-control' id='email' placeholder='E-mail' type='text'>
                    </div>
                  </div>
                </div>
              </div>

              <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>RG</label>
                <div class='col-md-8'>
                  <div class='col-md-3'>
                    <div class='form-group internal'>
                      <input class='form-control' id='rg' placeholder='RG' type='text'>
                    </div>
                  </div>
                  <label class='control-label col-md-2' for='id_checkout'>CPF</label>
                  <div class='col-md-3'>
                      <div class='form-group internal'>
                      <input class='form-control' id='cpf' placeholder='CPF' type='text'>
                    </div>
                  </div>
                </div>
              </div>

              <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>Telefone</label>
                <div class='col-md-8'>
                  <div class='col-md-3'>
                    <div class='form-group internal'>
                      <input class='form-control' id='telefone' placeholder='(xxx) - xxxxxxxx' type='text'>
                    </div>
                  </div>
                  <label class='control-label col-md-2' for='id_checkout'>Celular</label>
                  <div class='col-md-3'>
                      <div class='form-group internal'>
                      <input class='form-control' id='celular' placeholder='(xxx) - xxxxxxxxx' type='text'>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">Gênero</label>
                <div class="col-sm-8">
                    <label class="radio-inline"> <input type="radio" name="genero" class="genero" id="generoM" value="M" checked> Masculino </label>
                    <label class="radio-inline"> <input type="radio" name="genero" class="genero" id="generoF" value="F"> Feminino </label>
                </div>
            </div>

            <!-- <div class='form-group'>
              <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Data Nasc.</label>
              <div class='col-md-4'>
                <div class='form-group'>
                  <div class='col-md-8'>
                    <input class='form-control' id='data_nascimento' placeholder='DD-MM-AAAA' type='text'>
                  </div>
                </div>
              </div>
            </div> -->

            <div class='form-group'>
              <label class='control-label col-md-2 col-md-offset-2' for='id_comments'>Observação</label>
              <div class='col-md-5'>
                <textarea class='form-control' id='observacao' placeholder='Obs.' rows='3'></textarea>
              </div>
            </div>


            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Adicionar</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update Cliente -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

              <form class='form-horizontal' role='form'>

                <div class='form-group'>
                  <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Nome</label>
                  <div class='col-md-6'>
                    <div class='form-group'>
                      <div class='col-md-11'>
                        <input class='form-control' id='update_nome' placeholder='Nome' type='text'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='control-label col-md-2 col-md-offset-2' for='id_email'>E-mail</label>
                  <div class='col-md-4'>
                    <div class='form-group'>
                      <div class='col-md-11'>
                        <input class='form-control' id='update_email' placeholder='E-mail' type='text'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>RG</label>
                  <div class='col-md-8'>
                    <div class='col-md-3'>
                      <div class='form-group internal'>
                        <input class='form-control' id='update_rg' placeholder='RG' type='text'>
                      </div>
                    </div>
                    <label class='control-label col-md-2' for='id_checkout'>CPF</label>
                    <div class='col-md-3'>
                        <div class='form-group internal'>
                        <input class='form-control' id='update_cpf' placeholder='CPF' type='text'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>Telefone</label>
                  <div class='col-md-8'>
                    <div class='col-md-3'>
                      <div class='form-group internal'>
                        <input class='form-control' id='update_telefone' placeholder='(xxx) - xxxxxxxx' type='text'>
                      </div>
                    </div>
                    <label class='control-label col-md-2' for='id_checkout'>Celular</label>
                    <div class='col-md-3'>
                        <div class='form-group internal'>
                        <input class='form-control' id='update_celular' placeholder='(xxx) - xxxxxxxxx' type='text'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Gênero</label>
                  <div class="col-sm-8">
                      <label class="radio-inline"> <input type="radio" name="genero" class="update_genero" id="update_generoM" value="M" checked> Masculino </label>
                      <label class="radio-inline"> <input type="radio" name="genero" class="update_genero" id="update_generoF" value="F"> Feminino </label>
                  </div>
              </div>

              <!-- <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Data Nasc.</label>
                <div class='col-md-4'>
                  <div class='form-group'>
                    <div class='col-md-8'>
                      <input class='form-control' id='data_nascimento' placeholder='DD-MM-AAAA' type='text'>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class='form-group'>
                <label class='control-label col-md-2 col-md-offset-2' for='id_comments'>Observação</label>
                <div class='col-md-5'>
                  <textarea class='form-control' id='update_observacao' placeholder='Obs.' rows='3'></textarea>
                </div>
              </div>


              </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Salvar</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->


<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
