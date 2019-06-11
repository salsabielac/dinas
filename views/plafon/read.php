<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Detail Plafon
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('home') ?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i><a href="<?php echo site_url('plafon') ?>"> Daftar Plafon</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-eye"></i> Detail Plafon
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <table class="table">
        <tr><td>Plafon</td><td><?php echo $plafon; ?></td></tr>
        <tr><td>Pendidikan</td><td><?php echo $pendidikan; ?></td></tr>
        <tr><td>Masa Kerja</td><td><?php echo $masa_kerja; ?></td></tr>
        <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
        <tr><td>Uang Dinas</td><td><?php echo $uang_dinas; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('plafon') ?>" class="btn btn-default">Cancel</a></td></tr>
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