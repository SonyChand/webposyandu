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
                                                    <label for="menu_id" class="form-label">Menu</label>
                                                    <select id="menu_id" class="form-select" name="menu_id" required>
                                                        <option value="" hidden>
                                                            Pilih Menu
                                                        </option>
                                                        <?php foreach ($dataTabModal as $row) : ?>
                                                            <option value="<?= $row->id; ?>"><?= $row->menu; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="title" class="form-label">Nama Submenu</label>
                                                    <input type="text" class="form-control" name="title" id="title" required>
                                                    <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="url_i" class="form-label">Link 1</label>
                                                    <input type="text" class="form-control" name="url_i" id="url_i" required>
                                                    <?= form_error('url_i', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="url_ii" class="form-label">Link 2</label>
                                                    <input type="text" class="form-control" name="url_ii" id="url_ii" required>
                                                    <?= form_error('url_ii', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
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
                        <?= $this->session->flashdata('submenu'); ?>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Menu
                                        </th>
                                        <th>Nama Submenu</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->menu ?></td>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->url_i . $row->url_ii ?></td>
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