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
                                <label for="nama" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $oneData->nama ?>" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="<?= $oneData->email ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="no_hp" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $oneData->no_hp ?>" required>
                                <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" class="form-select" name="jenis_kelamin" required>
                                    <option value="<?= $oneData->jenis_kelamin ?>" hidden>
                                        <?php if ($oneData->jenis_kelamin == "L") : ?>
                                            Laki-laki
                                        <?php else : ?>
                                            Perempuan
                                        <?php endif; ?>
                                    </option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label">Akses Pengguna</label>
                                <select id="role" class="form-select" name="role" required>
                                    <option value="<?= $oneData->role ?>" hidden>
                                        <?php
                                        if ($oneData->role == 1) {
                                            echo "Admin";
                                        } elseif ($oneData->role == 2) {
                                            echo "Advokat";
                                        } else {
                                            echo "Klien";
                                        }
                                        ?>
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
                                <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->