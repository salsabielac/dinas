<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Detail Perjalanan Dinas
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i><a href="<?php echo site_url('dinas') ?>"> Daftar Perjalanan Dinas</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-eye"></i> Detail Perjalanan Dinas
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <table class="table">
        <tr><td>No Transaksi</td><td><?php echo $no_transaksi; ?></td></tr>
        <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
        <tr><td>Nama Hotel</td><td><?php echo $nama_hotel; ?></td></tr>
        <tr><td>Alamat Hotel</td><td><?php echo $alamat_hotel; ?></td></tr>
        <tr><td>Lama Hari</td><td><?php echo $lama_hari; ?></td></tr>
        <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
        <tr><td>Total</td><td><?php echo $total; ?></td></tr>
        <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('dinas') ?>" class="btn btn-default">Cancel</a></td></tr>
    </div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
</body>
</html>