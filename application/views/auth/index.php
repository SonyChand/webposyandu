<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="<?= base_url('assets/backend/nice/assets') ?>/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Ubah Text Nya ya</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                    <p class="text-center small">Enter your email & password to login</p>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="row g-3" action="" method="POST">

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->