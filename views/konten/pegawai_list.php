<?php 
    $this->load->view('etc/comp');
    $session_data = $this->session->userdata('logged_in');
?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Daftar Pegawai
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Unit Kerja</th>
                                        <th>Golongan</th>
                                        <th>Uang Dinas</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ekstra_object as $key): ?>
                                    <tr>
                                        <td><?php echo $key->nip ?></td>
                                        <td><?php echo $key->name ?></td>
                                        <td><?php echo $key->email ?></td>
                                        <td><?php echo $key->id_jabatan ?></td>
                                        <td><?php echo $key->id_unit_kerja ?></td>
                                        <td><?php echo $key->id_golongan ?></td>
                                        <td><?php echo $key->uang_dinas ?></td>
                                        <td><?php echo $key->deskripsi ?></td>
                                        <td>
                                            <a href="<?=site_url()?>/ekstra/update/<?php echo $key->id ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></a>
                                            <a href="<?=site_url()?>/ekstra/delete/<?php echo $key->id ?>"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class=" glyphicon glyphicon-trash"></span></button></p></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
