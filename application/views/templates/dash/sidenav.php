<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <?php

    if ($user->image == 'default') {
        if ($user->jenis_kelamin == 'L') {
            $fotoprofil = base_url('assets/img/user/default/') . 'L.jpg';
        } else {
            $fotoprofil = base_url('assets/img/user/default/') . 'P.jpg';
        }
    } else {
        $fotoprofil = base_url('assets/img/user/') . $user->image;
    }

    ?>
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/backend/nice/assets') ?>/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/backend/nice/assets') ?>/img/messages-1.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/backend/nice/assets') ?>/img/messages-2.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/backend/nice/assets') ?>/img/messages-3.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= $fotoprofil ?>" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user->nama ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $user->nama ?></h6>
                        <?php
                        if ($user->role == 1) {
                            $namaRole = 'Admin';
                        } elseif ($user->role == 2) {
                            $namaRole = 'Advokat';
                        } else {
                            $namaRole = 'Klien';
                        }
                        ?>
                        <span><?= $namaRole ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profil') ?>">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profil') ?>">
                            <i class="bi bi-gear"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
        if ($user->role == 1) {
            $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                'status' => 1
            ])->result_array();
        } elseif ($user->role == 2) {
            $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                'status' => 1,
                'for >=' => $user->role
            ])->result_array();
        } else {
            $nav = $this->db->order_by('order', 'ASC')->get_where('menu', [
                'status' => 1,
                'for' => 3
            ])->result_array();
        }
        ?>
        <!-- Nav Item - Dashboard -->
        <?php foreach ($nav as $n) : ?>
            <?php $submenu = $this->db->get_where('submenu', ['status' => 1, 'menu_id' => $n['id']]); ?>
            <?php if ($submenu->num_rows() == 0) : ?>
                <?php if ($title == $n['menu']) : ?>

                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() . $n['link']; ?>">
                            <i class="bi <?= $n['icon']; ?>"></i>

                        <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?= base_url() . $n['link']; ?>">
                            <i class="bi <?= $n['icon']; ?>"></i>
                        <?php endif; ?>
                        <span><?= $n['menu']; ?></span></a>
                    <?php else : ?>


                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse<?= $n['id']; ?>" aria-expanded="true" aria-controls="collapse<?= $n['id']; ?>">
                            <i class="bi <?= $n['icon']; ?>"></i>
                            <span><?= $n['menu']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="collapse<?= $n['id']; ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                            <?php foreach ($submenu->result_array() as $s) : ?>
                                <li>
                                    <?php if ($this->uri->segment(2) == $s['url_ii']) : ?>
                                        <a href="<?= base_url($s['url_i'] . $s['url_ii']); ?>" class="active">
                                            <i class="bi bi-circle"></i><span><?= $s['title']; ?></span>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url($s['url_i'] . $s['url_ii']); ?>">
                                            <i class="bi bi-circle"></i><span><?= $s['title']; ?></span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                <?php endif; ?>
                </li>
            <?php endforeach; ?>






    </ul>

</aside><!-- End Sidebar-->