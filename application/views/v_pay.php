<div id="home" class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0">Fra & Co. Law Firm</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#layanan_hukum" class="nav-link">Layanan Hukum</a>
                    <!-- <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Hukum Perdata</a>
                                <a href="quote.html" class="dropdown-item">Hukum Pidana</a>
                                <a href="team.html" class="dropdown-item">Hukum Bisnis</a>
                                <a href="testimonial.html" class="dropdown-item">Hukum Keluarga</a>
                                <a href="404.html" class="dropdown-item">Hukum Adat</a>
                            </div> -->
                </div>
                <div class="nav-item dropdown">
                    <a href="#jenis_konsultasi" class="nav-link">Jenis Konsultasi</a>
                </div>

                <a href="#about_us" class="nav-item nav-link">About Us</a>
                <a href="#our_team" class="nav-item nav-link">Our Team</a>
                <a href="#testimoni" class="nav-item nav-link">Testimoni</a>


            </div>
            <a href="" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">Login</a>
        </div>
    </nav>
    <div class="container-xxl bg-primary hero-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Pembayaran
                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url(); ?>">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="estimasiBiaya" class="form-label">Nama Rekening</label>
                            </div>
                            <div class="col-sm-10 text-info fw-bold">
                                <label for="form-label ">Jenny</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="estimasiBiaya" class="form-label">Nomor Rekening</label>
                            </div>
                            <div class="col-sm-10 text-info fw-bold">
                                <label for="form-label ">BNI - 4564560110</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="estimasiBiaya" class="form-label">Biaya</label>
                            </div>
                            <div class="col-sm-10 text-info fw-bold">
                                <label for="form-label ">Rp. <?= number_format($this->session->userdata('biaya'), 0, ',', '.') ?>,-</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="estimasiBiaya" class="form-label">Sisa Waktu</label>
                            </div>
                            <div class="col-sm-10 text-info fw-bold">
                                <label for="sisaWaktu" id="sisaWaktu"></label>
                            </div>
                        </div>
                        <div class="float-end">
                            <span>Sudah melakukan pembayaran? </span>
                            <a target="_blank" href="https://api.whatsapp.com/send/?phone=6281312157307&text=<?= $this->session->userdata('teks') ?>">Konfirmasi Pembayaran</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Set the countdown timer
    var countdown_start = <?= $this->session->userdata('mulai') ?>;
    var hours = 2;
    var minutes = 0;
    var seconds = 0;

    // Update the timer every second
    var intervalId = setInterval(function() {
        var current_time = new Date().getTime() / 1000;
        var elapsed_time = current_time - countdown_start;
        var remaining_time = 2 * 60 * 60 - elapsed_time; // 2 hours in seconds

        if (remaining_time <= 0) {
            // Timer has reached 0, send data to database
            sendDataToDatabase();
            clearInterval(intervalId);
        } else {
            hours = Math.floor(remaining_time / 3600);
            minutes = Math.floor((remaining_time % 3600) / 60);
            seconds = Math.floor(remaining_time % 60);
        }

        // Update the timer display
        document.getElementById("sisaWaktu").innerHTML = `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
    }, 1000);

    function padZero(number) {
        return (number < 10 ? "0" : "") + number;
    }

    // Function to send data to database when timer reaches 0
    function sendDataToDatabase() {
        // Your code to send data to database goes here
        document.getElementById("sisaWaktu").innerHTML = `Kadaluarsa`;
    }
</script>

<!-- Team End -->