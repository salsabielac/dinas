<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Dinas Read</h2>
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
	</table>
        </body>
</html>