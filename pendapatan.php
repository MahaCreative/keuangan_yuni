<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    require 'koneksi.php';
    require('sidebar.php'); ?>
    <!-- Main Content -->
    <div id="content">

        <?php require('navbar.php'); ?>



        <!-- DataTales Example -->
        <div class="col-sm-12">
            <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal"
                data-target="#myModalTambah"><i class="fa fa-plus"> Pemasukan</i></button><br>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="1">
                            <thead>
                                <tr>
                                    <th class="" style="font-size:10pt">ID</th>
                                    <th class="" style="font-size:10pt">Tanggal</th>
                                    <th class="" style="font-size:10pt">Jenis Barang</th>
                                    <th class="" style="font-size:10pt">Ukuran</th>
                                    <th class="" style="font-size:10pt">Jumlah</th>
                                    <th class="" style="font-size:10pt">Harga Satuan</th>
                                    <th class="" style="font-size:10pt">Jumlah Total</th>
                                    <th class="" style="font-size:10pt">Keterangan</th>
                                    <th class="" style="font-size:10pt">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class="" style="font-size:10pt">ID</th>
                                    <th class="" style="font-size:10pt">Tanggal</th>
                                    <th class="" style="font-size:10pt">Jenis Barang</th>
                                    <th class="" style="font-size:10pt">Ukuran</th>
                                    <th class="" style="font-size:10pt">Jumlah</th>
                                    <th class="" style="font-size:10pt">Harga Satuan</th>
                                    <th class="" style="font-size:10pt">Jumlah Total</th>
                                    <th class="" style="font-size:10pt">Keterangan</th>
                                    <th class="" style="font-size:10pt">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM pemasukan");
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td class="" style="font-size:10pt"><?= $data['id_pemasukan'] ?></td>
                                    <td class="" style="font-size:10pt"><?= $data['tgl_pemasukan'] ?></td>
                                    <td class="" style="font-size:10pt"><?= $data['jenis_barang'] ?></td>
                                    <td class="" style="font-size:10pt"><?= $data['ukuran'] ?></td>
                                    <td class="" style="font-size:10pt"><?= $data['jumlah'] ?></td>
                                    <td class="" style="font-size:10pt">Rp.
                                        <?= number_format($data['hrg_satuan'], 2, ',', '.'); ?></td>
                                    <td class="" style="font-size:10pt">Rp.
                                        <?= number_format($data['jml_total'], 2, ',', '.'); ?></td>
                                    <td class="" style="font-size:10pt"><?= $data['ket'] ?></td>
                                    <td class="" style="font-size:10pt">
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md"
                                            data-toggle="modal"
                                            data-target="#myModal<?php echo $data['id_pemasukan']; ?>"></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit Mahasiswa-->
                                <div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Data Pemasukan</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="proses-edit-pemasukan.php" method="get">

                                                    <?php
                                                        $id = $data['id_pemasukan'];
                                                        $query_edit = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
                                                        //$result = mysqli_query($conn, $query);
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                        ?>


                                                    <input type="hidden" name="id_pemasukan"
                                                        value="<?php echo $row['id_pemasukan']; ?>">

                                                    <div class="form-group">
                                                        <label>Id</label>
                                                        <input type="text" name="id_pemasukan" class="form-control"
                                                            value="<?php echo $row['id_pemasukan']; ?>" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="date" name="tgl_pemasukan" class="form-control"
                                                            value="<?php echo $row['tgl_pemasukan']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jenis Barang</label>
                                                        <input type="text" name="jenis_barang" class="form-control"
                                                            value="<?php echo $row['jenis_barang']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Ukuran</label>
                                                        <input type="text" name="ukuran" class="form-control"
                                                            value="<?php echo $row['ukuran']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="text" name="jumlah" class="form-control"
                                                            value="<?php echo $row['jumlah']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Harga Satuan</label>
                                                        <input type="number" name="hrg_satuan" class="form-control"
                                                            value="<?php echo $row['hrg_satuan']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah Total</label>
                                                        <input type="number" name="jml_total" class="form-control"
                                                            value="<?php echo $row['jml_total']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="ket" class="form-control"
                                                            value="<?php echo $row['ket']; ?>">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <a href="hapus-pemasukan.php?id_pemasukan=<?= $row['id_pemasukan']; ?>"
                                                            Onclick="confirm('Anda Yakin Ingin Menghapus?')"
                                                            class="btn btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Keluar</button>
                                                    </div>
                                                    <?php
                                                        }
                                                        //mysql_close($host);
                                                        ?>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Modal -->
                                <div id="myModalTambah" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- konten modal-->
                                        <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Pendapatan</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- body modal -->
                                            <form action="tambah-pendapatan.php" method="get">
                                                <div class="modal-body">
                                                    Tanggal :
                                                    <input type="date" class="form-control" name="tgl_pemasukan">
                                                    Jenis Barang :
                                                    <input type="text" class="form-control" name="jenis_barang">
                                                    Ukuran :
                                                    <input type="text" class="form-control" name="ukuran">
                                                    Jumlah :
                                                    <input type="text" class="form-control" name="jumlah">
                                                    Harga Satuan :
                                                    <input type="number" class="form-control" name="hrg_satuan">
                                                    Jumlah Total :
                                                    <input type="number" class="form-control" name="jml_total">
                                                    Keterangan :
                                                    <input type="text" class="form-control" name="ket">
                                                    </select>
                                                </div>
                                                <!-- footer modal -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Tambah</button>
                                            </form>
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>

                                </div>
                    </div>



                    <?php
                                }
                ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php require 'footer.php' ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require 'logout-modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>