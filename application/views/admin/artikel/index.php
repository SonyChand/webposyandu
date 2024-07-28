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
                            <a class="float-end btn bg-primary text-white" href="<?= base_url($this->uri->segment(1) . '/' . 'tambah' . $title) ?>">
                                <span class="badge bg-primary text-white"><i class="bi bi-plus-square me-1"></i> Tambah <?= $title ?></span>
                            </a>
                        </h5>


                        <?= $this->session->flashdata('artikel'); ?>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Judul
                                        </th>
                                        <th>Kategori</th>
                                        <th>Dibuat</th>
                                        <th>Diubah</th>
                                        <th>Thumbnail</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->kategori ?></td>
                                            <td>
                                                <?= date('d F Y', $row->date_created) ?>
                                            </td>
                                            <td>
                                                <?= date('d F Y', $row->last_updated) ?>
                                            </td>
                                            <td>
                                                <img src="<?= base_url('assets/img/blog/') . $row->image ?>" alt="Thumbnail <?= $row->title ?>" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->status == 1) {
                                                    echo 'Publish';
                                                } else {
                                                    echo 'Draft';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url($this->uri->segment(1) . '/preview') . $title . '/' . $row->slug ?>">
                                                    <span class="badge bg-primary"><i class="bi bi-eye me-1"></i> Preview</span>
                                                </a>
                                                <a href="<?= base_url($this->uri->segment(1) . '/ubah') . $title . '/' . $row->slug ?>">
                                                    <span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Ubah</span>
                                                </a>
                                                <a href="<?= base_url($this->uri->segment(1) . '/hapus') . $title . '/' . $row->slug ?>" onclick="return confirm('Apakah anda yakin')">
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