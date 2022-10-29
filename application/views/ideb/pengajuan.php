
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("ideb/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Status Pengajuan Berhasil Diubah!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Status Pengajuan Gagal Diubah!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("ideb/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("ideb/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Pengajuan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pengajuan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengajuan Slik</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pengaju</th>
                                                <th>Nama Lengkap Debitur</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>NIK</th>
                                                <th>Alamat</th>
                                                <th>Alasan Verifikasi</th>
                                                <th>Status Pengajuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                        $no = 0;
                                        foreach($pengajuan as $i)
                                        :
                                        $no++;
                                        $id_pengajuan = $i['id_pengajuan'];
                                        $id_user = $i['id_user'];
                                        $nama_lengkap = $i['nama_lengkap'];
                                        $nama_lengkap_debitur = $i['nama_lengkap_debitur'];
                                        $tgl_diajukan = $i['tgl_diajukan'];
                                        $nik = $i['nik'];
                                        $alamat_debitur = $i['alamat_debitur'];
                                        $id_status_pengajuan = $i['id_status_pengajuan'];
                                        $alasan_verifikasi = $i['alasan_verifikasi'];
                                       

                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $nama_lengkap ?></td>
                                                <td><?= $nama_lengkap_debitur ?></td>
                                                <td><?= $tgl_diajukan ?></td>
                                                <td><?= $nik ?></td>
                                                <td><?= $alamat_debitur ?></td>
                                                <td><?php if($alasan_verifikasi == NULL) { ?>
                                                    <a href="" class="btn btn-danger">
                                                        Belum Ada
                                                    </a>
                                                    <?php } else {?>
                                                    <?=$alasan_verifikasi?>
                                                    <?php } ?>
                                                </td>
                                                <td><?php if($id_status_pengajuan == 1){ ?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Menunggu Konfirmasi
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_pengajuan == 2) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Pengajuan Diterima
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_pengajuan == 3) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-info" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Pengajuan Ditolak
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#setuju<?= $id_pengajuan ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#tidak_setuju<?= $id_pengajuan ?>"
                                                                class="btn btn-danger"><i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            <!-- Modal Setuju -->
                                            <div class="modal fade" id="setuju<?= $id_pengajuan ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Setujui 
                                                                Pengajuan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url()?>Pengajuan/acc_pengajuan_ideb/2"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_pengajuan"
                                                                            value="<?php echo $id_pengajuan?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />
                                                                        <p>Apakah kamu yakin ingin Menyetujui Pengajuan
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan</label>
                                                                            <textarea class="form-control"
                                                                                id="alasan_verifikasi"
                                                                                name="alasan_verifikasi"
                                                                                rows="3"></textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Tidak Setuju -->
                                            <div class="modal fade" id="tidak_setuju<?= $id_pengajuan ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan
                                                                
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url()?>Pengajuan/acc_pengajuan_ideb/3"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_pengajuan"
                                                                            value="<?php echo $id_pengajuan?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />

                                                                        <p>Apakah kamu yakin ingin Menolak Pengajuan
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan</label>
                                                                            <textarea class="form-control"
                                                                                id="alasan_verifikasi"
                                                                                name="alasan_verifikasi"
                                                                                rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("ideb/components/js.php") ?>
</body>

</html>