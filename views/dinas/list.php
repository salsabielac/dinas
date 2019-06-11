<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Daftar Perjalanan Dinas
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Daftar Perjalanan Dinas
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('dinas/create'),'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('dinas/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '')
                                    {
                                    ?>
                                    <a href="<?php echo site_url('dinas'); ?>" class="btn btn-default">Reset</a>
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
                        <th>No Transaksi</th>
                        <th>Nip</th>
                        <th>Nama Hotel</th>
                        <th>Alamat Hotel</th>
                        <th>Lama Hari</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr><?php
                    foreach ($dinas_data as $dinas)
                    {
                    ?>
                    <tr>
                        <td width="80px"><?php echo ++$start ?></td>
                        <td><?php echo $dinas->no_transaksi ?></td>
                        <td><?php echo $dinas->nip ?></td>
                        <td><?php echo $dinas->nama_hotel ?></td>
                        <td><?php echo $dinas->alamat_hotel ?></td>
                        <td><?php echo $dinas->lama_hari ?></td>
                        <td><?php echo $dinas->harga ?></td>
                        <td><?php echo $dinas->total ?></td>
                        <td><?php echo $dinas->deskripsi ?></td>
                        <td style="text-align:center" width="200px">
                            <?php
                            echo anchor(site_url('dinas/read/'.$dinas->id),'Read');
                            echo ' | ';
                            echo anchor(site_url('dinas/update/'.$dinas->id),'Update');
                            echo ' | ';
                            echo anchor(site_url('dinas/delete/'.$dinas->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                        <?php echo anchor(site_url('dinas/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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