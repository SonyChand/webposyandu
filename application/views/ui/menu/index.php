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
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input type="text" name="menu" class="form-control" placeholder="Nama Menu">
                                                <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <input type="text" name="link" class="form-control" placeholder="Link Menu">
                                                    <?= form_error('link', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="icon" class="form-control" placeholder="Ikon (bisa dikosongkan)">
                                                    <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <select name="for" id="for" class="form-select">
                                                        <option value="" hidden>Akses Menu</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Admin dan Advokat</option>
                                                        <option value="3">Semua Role (Admin, Advokat dan Klien)</option>
                                                    </select>
                                                    <?= form_error('for', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="status" id="status" class="form-select">
                                                        <option value="" hidden>Status Menu</option>
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
                        <?= $this->session->flashdata('menu'); ?>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Menu
                                        </th>
                                        <th>Link</th>
                                        <th>Ikon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->menu ?></td>
                                            <td><?= $row->link ?></td>
                                            <td><?= $row->icon ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('ui/ubah') . $title . '/' . $row->id ?>">
                                                    <span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Ubah</span>
                                                </a>
                                                <a href="<?= base_url('ui/hapus') . $title . '/' . $row->id ?>" onclick="return confirm('Apakah anda yakin')">
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