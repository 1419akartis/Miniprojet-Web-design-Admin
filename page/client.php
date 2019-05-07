<!DOCTYPE html>
<html>
  <head>
      <?php include('../include/headPage.php') ?>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <?php include('../include/headerPage.php') ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include('../include/menuPage.php') ?>

      <?php 
        require('traitement/function.php');
        $client = selectclient();
      ?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Insertion Medicament</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
              </div><!-- /.box -->
            </div>
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Client</h3>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Mot de passe</th>
                    </tr>
                    <?php
                      while($donnee = mysqli_fetch_assoc($client)){
                    ?>
                    <tr>
                      <td><?php echo $donnee['idclient'];?></td>
                      <td><?php echo $donnee['nom'];?></td>
                      <td><?php echo $donnee['email'];?></td>
                      <td><?php echo $donnee['mdp'];?></td>
                    </tr>
                    <?php
                        }
                    ?> 
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <?php include('../include/footerPage.php') ?>
  </body>
</html>