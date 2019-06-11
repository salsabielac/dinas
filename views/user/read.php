<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Detail Pegawai
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i><a href="<?php echo site_url('user') ?>"> Daftar Pegawai</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-eye"></i> Detail Pegawai
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <table class="table">
        <tr><td>Name</td><td><?php echo $name; ?></td></tr>
        <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>Password</td><td><?php echo $password; ?></td></tr>
        <tr><td>Id Jabatan</td><td><?php echo $id_jabatan; ?></td></tr>
        <tr><td>Id Unit Kerja</td><td><?php echo $id_unit_kerja; ?></td></tr>
        <tr><td>Id Golongan</td><td><?php echo $id_golongan; ?></td></tr>
        <tr><td>Uang Dinas</td><td><?php echo $uang_dinas; ?></td></tr>
        <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
        <tr><td>Role</td><td><?php echo $role; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
</body>
</html>