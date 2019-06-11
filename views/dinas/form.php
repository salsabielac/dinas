<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Edit Perjalanan Dinas
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-table"></i><a href="<?php echo site_url('dinas') ?>"> Daftar Perjalanan Dinas</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Edit Perjalanan Dinas
                    </li>
                </ol>
            </div>
        </div>
         <!-- /.row -->

         
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">No Transaksi <?php echo form_error('no_transaksi') ?></label>
            <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" placeholder="No Transaksi" value="<?php echo $no_transaksi; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Hotel <?php echo form_error('nama_hotel') ?></label>
            <input type="text" class="form-control" name="nama_hotel" id="nama_hotel" placeholder="Nama Hotel" value="<?php echo $nama_hotel; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Alamat Hotel <?php echo form_error('alamat_hotel') ?></label>
            <input type="text" class="form-control" name="alamat_hotel" id="alamat_hotel" placeholder="Alamat Hotel" value="<?php echo $alamat_hotel; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Lama Hari <?php echo form_error('lama_hari') ?></label>
            <input type="text" class="form-control" name="lama_hari" id="lama_hari" placeholder="Lama Hari" value="<?php echo $lama_hari; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('dinas') ?>" class="btn btn-default">Cancel</a>
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