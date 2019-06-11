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
        <h2 style="margin-top:0px">Plafon Read</h2>
        <table class="table">
	    <tr><td>Plafon</td><td><?php echo $plafon; ?></td></tr>
	    <tr><td>Pendidikan</td><td><?php echo $pendidikan; ?></td></tr>
	    <tr><td>Masa Kerja</td><td><?php echo $masa_kerja; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Uang Dinas</td><td><?php echo $uang_dinas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('plafon') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>