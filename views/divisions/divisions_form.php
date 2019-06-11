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
        <h2 style="margin-top:0px">Divisions <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Division Name <?php echo form_error('division_name') ?></label>
            <input type="text" class="form-control" name="division_name" id="division_name" placeholder="Division Name" value="<?php echo $division_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Parent <?php echo form_error('parent') ?></label>
            <input type="text" class="form-control" name="parent" id="parent" placeholder="Parent" value="<?php echo $parent; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('divisions') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>