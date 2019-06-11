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
        <h2 style="margin-top:0px">Divisions Read</h2>
        <table class="table">
	    <tr><td>Division Name</td><td><?php echo $division_name; ?></td></tr>
	    <tr><td>Parent</td><td><?php echo $parent; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('divisions') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>