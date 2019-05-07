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
        $medic = select();
        $typemedic= typemedic();
      $mode= mode();
      $destine= destine();
      $cat= cat();
      $souscat= souscatByIdcat(1);
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
                <form role="form" action="traitement/ajoutreussie.php" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                    <label for="name">Reference</label>
                    <input name="reference" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Nom</label>
                    <input name="nom" type="text" class="form-control">
                  </div>

                  <div class="form-group">
                  <p><label for="password" class="form-control">Type</label></p>
                  <select name="categorie" class="form-control">
                    <?php
                      while($donnee = mysqli_fetch_assoc($typemedic)){
                    ?>
                      <option class="form-control" value="<?php echo $donnee['nom'];?>"><?php echo $donnee['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Unite</label>
                    <input name="unite" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Quantite</label>
                    <input name="quantite" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Description</label>
                    <input name="descmedicament" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <p><label for="password" class="form-control">Mode Administration</label></p>
                  <select name="modeadministration" class="form-control">
                    <?php
                      while($donneemode = mysqli_fetch_assoc($mode)){
                    ?>
                      <option class="form-control" value="<?php echo $donneemode['nom'];?>"><?php echo $donneemode['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <p><label for="password" class="form-control">Categorie</label></p>
                  <select name="modeadministratiion" class="form-control">
                    <?php
                      while($donneecat = mysqli_fetch_assoc($cat)){
                    ?>
                      <option class="form-control" value="<?php echo $donneecat['nom'];?>"><?php echo $donneecat['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <p><label for="password" class="form-control">Sous Categorie</label></p>
                  <select name="modeadministratiion" class="form-control">
                    <?php
                      while($donneesouscat = mysqli_fetch_assoc($souscat)){
                    ?>
                      <option class="form-control" value="<?php echo $donneesouscat['nom'];?>"><?php echo $donneesouscat['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Conseillé pour femme enceinte ?</label>
                    <input name="femmeenceinte" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Conseillé pour l'allaitement</label>
                    <input name="allaitement" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                  <div class="form-group">
                    <p><label for="password" class="form-control">Designé pour qui?</label></p>
                  <select name="pourqui" class="form-control">
                    <?php
                      while($donneedestine = mysqli_fetch_assoc($destine)){
                    ?>
                      <option class="form-control" value="<?php echo $donneedestine['nom'];?>"><?php echo $donneedestine['nom'];?></option>
                      <?php
                      }
                    ?>
                  </select>
                  </div>
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
                  <h3 class="box-title">Medicament</h3>
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
                      <th>IDType</th>
                      <th>Reference</th>
                      <th>Nom</th>
                      <th>Idcat</th>
                      <th>Idsouscat</th>
                      <th>Unite</th>
                      <th>Desriptioin</th>
                      <th>Prix</th>
                    </tr>
                    <?php
                      while($donnee = mysqli_fetch_assoc($medic)){
                    ?>
                    <tr>
                      <td><?php echo $donnee['id'];?></td>
                      <td><?php echo $donnee['idtype'];?></td>
                      <td><?php echo $donnee['reference'];?></td>
                      <td><?php echo $donnee['nom'];?></td>
                      <td><?php echo $donnee['idcat'];?></td>
                      <td><?php echo $donnee['idsouscat'];?></td>
                      <td><?php echo $donnee['unite'];?></td>
                      <td><?php echo $donnee['descmedicament'];?></td>
                      <td><?php echo $donnee['prix'];?></td>
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