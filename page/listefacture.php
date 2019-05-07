<?php
    session_start() ;
    require('traitement/function.php');
    // $fact = selectAllfacture();
    $colonne = isset($_GET['trie'])  ? $_GET['trie']   : "idfact";
    $deb = isset($_GET['deb']) ? $_GET['deb'] : 0;
    $fact = getListFacturePaginationTrie($deb,$colonne);
    // $idcat1 = getNbProuduitVenduParDateParCateg(2,"2019-01-19","2019-01-25");
    // $idcat2 = getNbProuduitVenduParDateParCateg(3,"2019-01-19","2019-01-25");
    // $idcat3 = getNbProuduitVenduParDateParCateg(4,"2019-01-19","2019-01-25");
    // $fact = getListFacturePagination(0);

?>
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

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Facture</h3>
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
                      <th>Date</th>
                      <th>Id Client</th>
                      <th>Etat</th>
                      <th>Id Meth Paye</th>
                      <th>Total</th>
                      <th>Deja Paye</th>
                      <th>Reste</th>
                      <th>Action</th>
                    </tr>
                    <?php
                        // foreach($_SESSION['panier'] as $id=>$article_achet�){
                            $i=0;
                            while($donnee = mysqli_fetch_assoc($fact)){
                      ?>
                        <tr>

                          <td><?php echo $donnee['datefact'];?></td>
                          <td><?php echo $donnee['idclient'];?></td>
                          <td><?php echo $donnee['etat'];?></td>
                          <td><?php echo $donnee['idmeth'];?></td>
                          <td><?php echo $donnee['total'];?></td>
                          <td><?php echo $donnee['dejapaye'];?></td>
                          <td><?php echo $donnee['reste'];?></td>
                          <!-- <input type="hidden" name="idclient<?php echo $i+1;?>" value="<?php echo $donnee['idclient'];?>">
                          <td><input type="submit" value="Detail"></td> -->
                          <td><a href="historiquefacture.php?idclient=<?php echo $donnee['idclient'];?>"><button>Detail</button></a></td>
                        </tr>
                        <?php
                            $i++;
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