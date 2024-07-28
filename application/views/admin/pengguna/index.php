<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><?= ucwords($this->uri->segment(1)) ?></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?>
                            <button class="float-end btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#basicModal">
                                <span class="badge bg-primary text-white"><i class="bi bi-plus-square me-1"></i> Tambah <?= $title ?></span>
                            </button>

                        </h5>

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah <?= $title ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="no_hp" class="form-label">No Handphone</label>
                                                    <input type="tel" class="form-control" name="no_hp" id="no_hp" required>
                                                    <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" class="form-select" name="jenis_kelamin" required>
                                                        <option value="" hidden>
                                                            Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                    <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="role" class="form-label">Akses Pengguna</label>
                                                    <select id="role" class="form-select" name="role" required>
                                                        <option value="" hidden>
                                                            Pilih Akses
                                                        </option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Advokat</option>
                                                        <option value="3">Klien</option>
                                                    </select>
                                                    <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select id="status" class="form-select" name="status" required>
                                                        <option value="" hidden>
                                                            Pilih Status
                                                        </option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Nonaktif</option>
                                                    </select>
                                                    <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="submit<?= $title ?>" class="btn btn-outline-success" value="Tambah">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Basic Modal-->
                        <!-- Table with stripped rows -->
                        <?= $this->session->flashdata('pengguna'); ?>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Email
                                        </th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Terakhir Login</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->email ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td>
                                                <?php
                                                if ($row->role == 1) {
                                                    echo "Admin";
                                                } elseif ($row->role == 2) {
                                                    echo "Advokat";
                                                } else {
                                                    echo "Klien";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row->jenis_kelamin ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/ubah') . $title . '/' . $row->id ?>">
                                                    <span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Ubah</span>
                                                </a>
                                                <a href="<?= base_url('admin/hapus') . $title . '/' . $row->id ?>" onclick="return confirm('Apakah anda yakin')">
                                                    <span class="badge bg-danger"><i class="bi bi-trash me-1"></i> Hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->