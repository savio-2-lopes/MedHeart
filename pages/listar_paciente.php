<?php include "../Include/header.php"; ?>
<?php include "../Include/sidebar.php"; ?>

<?php

include("../conexao/conexao.php");

$sql = "SELECT `id`,`nome`,`telefone` FROM registro_paciente";

$query = mysqli_query($conexao, $sql);
// $numrows = mysql_num_rows($query);

$row1 = mysqli_fetch_all($query);

function mysqli_fetch_all($query)
{
  $all = array();
  while ($all[] = mysqli_fetch_assoc($query)) {
    $temp = $all;
  }
  return $temp;
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Banco de Dados do Paciente <small></small></h1>
    <ol class="breadcrumb">
      <li>
        <a href="#"><i class="fa fa-dashboard"></i>Home</a>
      </li>
      <li class="active">Paciente - Lista</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border ">
            <i class="fa fa-user"></i>
            <h3 class="box-title">Banco de Dados do Paciente</h3>
          </div>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Pacientes Registrados</h4>
                </div>

                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome Completo</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="Email" name="email" class="form-control" placeholder="" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço</label>
                      <input type="text" name="endereco" class="form-control" placeholder="" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Telefone</label>
                      <input type="text" name="telefone" class="form-control" placeholder="" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Gênero</label>
                      <select name="genero" class="form-control" placeholder="" required="">
                        <option value="" disabled selected="selecione">Selecione Categoria</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outros">Outros</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Data de Nascimento</label>
                      <input type="date" name="data_nascimento" class="form-control" placeholder="" required="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tipo de Sanguineo</label>
                      <select name="tipo_sanguineo" class="form-control" id="c" placeholder="" required="">
                        <option value="" disabled selected="selected">Selecionando Categorias</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                      </select>
                    </div>

                    <td>
                      <b> Upload de Imagens</b>
                      </font>
                      <input type="file" name="imageupload" id="fileToUpload" required="">
                    </td>

                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <td>
            <a class="popup" onclick="myFunction()">
              <button type="button" class="btn btn-default">Excel</button>
            </a>
          </td>

          &nbsp;&nbsp;&nbsp;

          <td>
            <button type="button" onclick="window.print();" class="btn btn-default">Imprimir</button>
          </td>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID Paciente</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Opção</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($row1 as $row) {
                ?>

                  <tr>
                    <td>
                      <?php echo $row['id']; ?>
                    </td>

                    <td>
                      <?php echo $row['nome']; ?>
                    </td>

                    <td>
                      <?php echo $row['telefone']; ?>
                    </td>

                    <td>
                      <a href="editar_paciente1.php?id=
                <?php echo $row['id']; ?>">
                        <span class="btn btn-success bg-green">
                          <i class="fa fa-edit"></i>
                          Editar
                        </span>
                      </a>

                      <a href="info.php?id=
                <?php echo $row['id']; ?>">
                        <span class="btn btn-primary bg-orange">
                          <i class="fa fa-info"></i>
                          Informações
                        </span>

                        &nbsp;&nbsp;

                        <a href="historico_caso.php">
                          <span class="btn  btn-primary disabled">
                            <i class="fa fa-history"></i>
                            Historico
                          </span>

                          &nbsp;&nbsp;

                          <a class="popup" onclick="myFunction()"><span class="btn btn-primary">
                              <i class="fa fa-money"></i>
                              Formas de Pagamento

                              <a href="delete.php?id=<?php echo $row['id']; ?>">
                                <span class="btn btn-danger">
                                  <i class="fa fa-trash-o"></i>
                                  Delete
                                </span>
                              </a>
                    </td>
                  </tr>

                <?php }  ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<?php include "../Include/footer.php"; ?>