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
                        </h5>
                        <form class="row" method="post" enctype="multipart/form-data">
                            <div class="col-md-8 mb-3">
                                <label for="title">Judul Artikel</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Judul Kegiatan" required>
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="kategori_id">Kategori Artikel</label>
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="" hidden>Pilih Kategori</option>
                                    <?php foreach ($dataKat as $row) : ?>
                                        <option value="<?= $row->id; ?>"><?= $row->kategori; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kategori_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="col-md-4 col-lg-3 col-form-label">Status Artikel</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="" hidden>Pilih Status Artikel</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image" class="col-md-4 col-lg-3 col-form-label">Thumbnail</label>
                                <!-- <div class="input-group"> -->
                                <div class="custom-file">
                                    <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
                                </div>
                                <!-- </div> -->
                                <span class="small"><strong style="font-size: 10px;line-height:0.1;">Ukuran Foto tidak melebihi 5 MB dan Rekomendasi Rasio Aspek 1:1, Format (JPG/PNG/GIF)</strong></span>
                            </div>

                            <div class="mb-3">
                                <label for="content">Konten Artikel</label>
                                <textarea class="tinymce-editor" name="content"></textarea>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="text-end mt-5">
                                <a href="<?= base_url('admin/artikel'); ?>" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->