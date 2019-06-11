<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Plafon
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('home') ?>">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-table"></i><a href="<?php echo site_url('plafon') ?>"> Daftar Plafon</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Plafon
                    </li>
                </ol>
            </div>
        </div>
         <!-- /.row -->

         <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Plafon <?php echo form_error('plafon') ?></label>
            <input type="text" class="form-control" name="plafon" id="plafon" placeholder="Plafon" value="<?php echo $plafon; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Masa Kerja <?php echo form_error('masa_kerja') ?></label>
            <input type="text" class="form-control" name="masa_kerja" id="masa_kerja" placeholder="Masa Kerja" value="<?php echo $masa_kerja; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Uang Dinas <?php echo form_error('uang_dinas') ?></label>
            <input type="text" class="form-control" name="uang_dinas" id="uang_dinas" placeholder="Uang Dinas" value="<?php echo $uang_dinas; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('plafon') ?>" class="btn btn-default">Cancel</a>
    </form>

     </div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
</body>
</html>