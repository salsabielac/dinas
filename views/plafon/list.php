<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Daftar Plafon
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('home') ?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Daftar Plafon
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('plafon/create'),'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('plafon/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '')
                                    {
                                    ?>
                                    <a href="<?php echo site_url('plafon'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered" style="margin-bottom: 10px">
                    <tr>
                        <th>No</th>
                        <th>Plafon</th>
                        <th>Pendidikan</th>
                        <th>Masa Kerja</th>
                        <th>Jabatan</th>
                        <th>Uang Dinas</th>
                        <th>Action</th>
                    </tr><?php
                    foreach ($plafon_data as $plafon)
                    {
                    ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $plafon->plafon ?></td>
                        <td><?php echo $plafon->pendidikan ?></td>
                        <td><?php echo $plafon->masa_kerja ?></td>
                        <td><?php echo $plafon->jabatan ?></td>
                        <td><?php echo $plafon->uang_dinas ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('plafon/read/'.$plafon->id),'Read');
                            echo ' | ';
                            echo anchor(site_url('plafon/update/'.$plafon->id),'Update');
                            echo ' | ';
                            echo anchor(site_url('plafon/delete/'.$plafon->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                        <?php echo anchor(site_url('plafon/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
</body>
</html>