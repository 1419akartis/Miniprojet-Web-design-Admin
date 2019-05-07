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
      $souscat= souscat();
      $cat= cat();
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
                  <h3 class="box-title">Insertion Sous-Categorie</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="traitement/traitinsertsouscat.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                <p><label for="password" class="form-control">Categorie</label></p>
                <select name="categorie" class="form-control">
                  <?php
                    while($donneecat = mysqli_fetch_assoc($cat)){
                  ?>
                    <option class="form-control" value="<?php echo $donneecat['id'];?>"><?php echo $donneecat['nom'];?></option>
                    <?php
                    }
                  ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="email">Nom</label>
                    <input name="nom" type="text" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Inserer</button>
                  </div>
                </div>
                </form>
              </div><!-- /.box -->
            </div>
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Sous-Categorie</h3>
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
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                    <?php
                      while($donnee = mysqli_fetch_assoc($souscat)){
                    ?>
                    <tr>
                      <td><?php echo $donnee['id'];?></td>
                      <td><?php echo $donnee['nom'];?></td>
                      <th><button class="btn btn-sm btn-default"><i class="fa fa-home"></i></button></th>
                      <th><button><i class="delete"></i></button></th>
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