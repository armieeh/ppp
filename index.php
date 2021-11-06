    <?php 
  include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html>
	<?php include 'head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">

  	
    <?php include 'header.php';
          include 'sidebar.php';
    ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $data = mysqli_query($koneksi, "SELECT * FROM users WHERE id_role= 3"); 
                $hitung = mysqli_num_rows($data);
                echo $hitung;
                ?>
                </h3>

                <p>Student's</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="data_siswa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <?php   

                  $ttl_saldo= mysqli_query($koneksi,"SELECT sum(saldo) as jumlah FROM tabungan  ");


                  


                 ?>





                <h3><?php  foreach ($ttl_saldo as $key) {
                     echo number_format( $key['jumlah'],0,".",".");
                   } ?></h3>

                <p>Saldo</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="data_tabungan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $date = date("Y-m-d");
                $data = mysqli_query($koneksi,"SELECT*FROM data_penyetoran WHERE tanggal = '$date'");
               
               ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($data); ?>
                </h3>

                <p>Total Use</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>



    </div>

<!-- js -->
<?php include 'js.php'; ?>
</body>
</html>