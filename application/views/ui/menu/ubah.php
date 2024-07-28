<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><?= $crumb ?></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title ?></h5>

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post">
                            <input type="hidden" name="id" value="<?= $oneData->id ?>">
                            <div class="col-md-6">
                                <label for="menu" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="menu" id="menu" value="<?= $oneData->menu ?>" required>
                                <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" name="link" id="link" value="<?= $oneData->link ?>" required>
                                <?= form_error('link', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="icon" class="form-label">Ikon</label>
                                <input type="text" class="form-control" name="icon" id="icon" value="<?= $oneData->icon ?>" required>
                                <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="order" class="form-label">Urutan</label>
                                <input type="text" class="form-control" name="order" id="order" value="<?= $oneData->order ?>" required>
                                <?= form_error('order', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="for" class="form-label">Akses</label>
                                <select id="for" class="form-select" name="for" required>
                                    <option value="<?= $oneData->for ?>" hidden>
                                        <?php if ($oneData->for == 1) : ?>
                                            Admin
                                        <?php elseif ($oneData->for == 2) : ?>
                                            Admin dan Advokat
                                        <?php else : ?>
                                            Semua Role (Admin, Advokat dan Klien)
                                        <?php endif; ?>
                                    </option>
                                    <option value="1">Admin</option>
                                    <option value="2">Admin dan Advokat</option>
                                    <option value="3">Semua Role (Admin, Advokat dan Klien)</option>
                                </select>
                                <?= form_error('for', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Status</label>
                                <select id="inputState" class="form-select" name="status" required>
                                    <option value="<?= $oneData->status ?>" hidden>
                                        <?php if ($oneData->status == 1) : ?>
                                            Aktif
                                        <?php else : ?>
                                            Nonaktif
                                        <?php endif; ?>
                                    </option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="text-end mt-5">
                                <a href="<?= base_url('ui/menu') ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->