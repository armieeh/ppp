  
<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php'; ?>
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


</head>
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
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <?php 

      include 'koneksi.php';
        $siswa=mysqli_query($koneksi,"SELECT * FROM tabungan");



       ?>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Siswa</th>
                    <th>Saldo</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $key =1;    
                      foreach ($siswa as  $value) {
                    ?>

                        <tr>
                          <td><?php echo $key++ ?></td>
                          <td><?php echo $value['id_user'] ?></td>
                          <td><?php echo number_format($value['saldo'],0,". ","."); ?></td>
                        </tr>


                        <?php
                      }

                     ?>
                 
                  </tbody>
                  <?php   

                  $ttl_saldo= mysqli_query($koneksi,"SELECT sum(saldo) as jumlah FROM tabungan  ");

                 ?>
                  <tfoot>
                  <tr>
                    <th colspan="2">Total Saldo</th>
                    <?php  foreach ($ttl_saldo as $key) { ?>
                    <th><?php  echo number_format( $key['jumlah'],0,".","."); ?>
                    </th><?php } ?>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>



    </div>

<!-- js -->
<?php include 'js.php'; ?>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>