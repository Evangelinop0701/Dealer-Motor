<?php


if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}


$name = $user->dtalho_user('naran_tbdr', $id);
$foto = $user->dtalho_user('foto', $id);
$level = $user->dtalho_user('level', $id);
$sexu = $user->dtalho_user('sexu', $id);
$mun = $user->dtalho_user('naran_mun', $id);
$postu = $user->dtalho_user('naran_postu', $id);
$suku = $user->dtalho_user('naran_suku', $id);
$hela = $user->dtalho_user('hela_fatin', $id);
$no_tlf = $user->dtalho_user('no_tlf', $id);
$id_user = $user->dtalho_user('id_user', $id);

?>

<header id="header" class="header fixed-top d-flex align-items-center">


    <div class="d-flex align-items-center justify-content-between">
        <a href="home.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">SM-Dealer Motor</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <?php if ($_SESSION['level'] == 'Admin') {?>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-house-add"></i><span class="d-none d-md-block dropdown-toggle ps-2 ps-1">MPS</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="mps.html">
                            <i class="bi bi-people"></i>
                            <span>Mps</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>


            </li>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-gear-wide-connected"></i><span
                        class="d-none d-md-block dropdown-toggle ps-2">Setting</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users.html">
                            <i class="bi bi-people"></i>
                            <span>Dados Users</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                </ul>


            </li>

            <?php } ?>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><i class="bi bi-person"></i>
                        <?= $name; ?>
                    </span>
                    <!-- <span> <img src="foto_trabalhador/<?php //$foto;?>" alt="Profile" class="rounded-circle"> </span> -->
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $name; ?></h6>
                        <span><?=$level; ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="profile-<?=$id; ?>.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="user-update-<?=$id_user;?>.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php } else {?>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="updatepass-<?=$id_user;?>.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php } ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>