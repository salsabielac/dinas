<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Daftar Pegawai
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Daftar Pegawai
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('user/create'),'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '')
                                    {
                                    ?>
                                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Nip</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Id Jabatan</th>
                            <th>Id Unit Kerja</th>
                            <th>Id Golongan</th>
                            <th>Uang Dinas</th>
                            <th>Deskripsi</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr><?php
                        foreach ($user_data as $user)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $user->name ?></td>
                            <td><?php echo $user->nip ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php echo $user->password ?></td>
                            <td><?php echo $user->id_jabatan ?></td>
                            <td><?php echo $user->id_unit_kerja ?></td>
                            <td><?php echo $user->id_golongan ?></td>
                            <td><?php echo $user->uang_dinas ?></td>
                            <td><?php echo $user->deskripsi ?></td>
                            <td><?php echo $user->role ?></td>
                            <td style="text-align:center" width="200px">
                                <?php
                                echo anchor(site_url('user/read/'.$user->id),'Read');
                                echo ' | ';
                                echo anchor(site_url('user/update/'.$user->id),'Update');
                                echo ' | ';
                                echo anchor(site_url('user/delete/'.$user->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                            <?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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