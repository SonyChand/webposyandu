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

                <!-- Card with titles, buttons, and links -->
                <div class="card">
                    <img src="<?= base_url('assets/img/blog/') . $oneData->image ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $oneData->title ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $oneData->kategori ?> | <?= $oneData->nama ?> | <?= date('d M Y', $oneData->last_updated) ?></h6>
                        <p class="card-text">
                            <?= $oneData->content ?>
                        </p>
                        <!-- <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div><!-- End Card with titles, buttons, and links -->


            </div>
        </div>
    </section>

</main><!-- End #main -->