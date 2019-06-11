<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Edit Pegawai
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-table"></i><a href="<?php echo site_url('user') ?>"> Daftar Pegawai</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Pegawai
                    </li>
                </ol>
            </div>
        </div>
         <!-- /.row -->

         
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Id Jabatan <?php echo form_error('id_jabatan') ?></label>
            <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Id Unit Kerja <?php echo form_error('id_unit_kerja') ?></label>
            <input type="text" class="form-control" name="id_unit_kerja" id="id_unit_kerja" placeholder="Id Unit Kerja" value="<?php echo $id_unit_kerja; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Id Golongan <?php echo form_error('id_golongan') ?></label>
            <input type="text" class="form-control" name="id_golongan" id="id_golongan" placeholder="Id Golongan" value="<?php echo $id_golongan; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Uang Dinas <?php echo form_error('uang_dinas') ?></label>
            <input type="text" class="form-control" name="uang_dinas" id="uang_dinas" placeholder="Uang Dinas" value="<?php echo $uang_dinas; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Role <?php echo form_error('role') ?></label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
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