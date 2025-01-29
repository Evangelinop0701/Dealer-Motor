<?php

if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}
$act = $_GET['act'];
switch ($act) {
    case 'profile':?>
<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Profile</a></li>
        </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="foto_trabalhador/<?=$foto;?>" alt="Profile" class="rounded-circle">
                    <h2><?= $name; ?></h2>
                    <h3><?= $level; ?></h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#profile-overview">Overview</button>
                        </li>

                        <!-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-settings">Settings</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#profile-change-password">Change Password</button>
                        </li> -->

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Naran Kompletu</div>
                                <div class="col-lg-9 col-md-8"><?=$name; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Sexu</div>
                                <div class="col-lg-9 col-md-8"><?= $sexu; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Municipiu</div>
                                <div class="col-lg-9 col-md-8"><?= $mun; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Postu</div>
                                <div class="col-lg-9 col-md-8"><?=$postu; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Suku</div>
                                <div class="col-lg-9 col-md-8"><?= $suku; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Hela Fatin</div>
                                <div class="col-lg-9 col-md-8"><?= $hela; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8"><?= $no_tlf; ?></div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <!-- Profile Edit Form -->
                            <form>
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="assets/img/profile-img.jpg" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                                    class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="fullName" type="text" class="form-control" id="fullName"
                                            value="Kevin Anderson">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="about" class="form-control" id="about"
                                            style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="company" type="text" class="form-control" id="company"
                                            value="Lueilwitz, Wisoky and Leuschke">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="job" type="text" class="form-control" id="Job"
                                            value="Web Designer">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="address" type="text" class="form-control" id="Address"
                                            value="A108 Adam Street, New York, NY 535022">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" id="Phone"
                                            value="(436) 486-3538 x29071">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="email" class="form-control" id="Email"
                                            value="k.anderson@example.com">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="twitter" type="text" class="form-control" id="Twitter"
                                            value="https://twitter.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="facebook" type="text" class="form-control" id="Facebook"
                                            value="https://facebook.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="instagram" type="text" class="form-control" id="Instagram"
                                            value="https://instagram.com/#">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                        Profile</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                            value="https://linkedin.com/#">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-settings">

                            <!-- Settings Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                        Notifications</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                            <label class="form-check-label" for="changesMade">
                                                Changes made to your account
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                            <label class="form-check-label" for="newProducts">
                                                Information on new products and services
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="proOffers">
                                            <label class="form-check-label" for="proOffers">
                                                Marketing and promo offers
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="securityNotify" checked
                                                disabled>
                                            <label class="form-check-label" for="securityNotify">
                                                Security alerts
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End settings Form -->

                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form>

                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control"
                                            id="currentPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewpassword" type="password" class="form-control"
                                            id="renewPassword">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>
<?php break;


    case 'read':
        if ($_SESSION['level'] == 'Admin') {
            ?>


<div class="pagetitle">
    <h1>Dados Users</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Dados Users</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <a href="users-input.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran User</th>
                                <th scope="col">Sexu</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Level Users</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                        $data = $user->showdados();
            $no=1;

            foreach ($data as $row) { ?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_tbdr']; ?></td>
                                <td><?=$row['sexu']; ?></td>
                                <td><?=$row['username']; ?></td>
                                <td><?=$row['passwords']; ?></td>
                                <td><?=$row['level']; ?></td>
                                <td class="d-flex">
                                    <a href="user-update-<?=$row['id_user'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a>|
                                    <a href="modul/mod_user/aksi_user.php?act=delete&id=<?=$row['id_user'];?>"
                                        class="py-0 my-0"><i class="fa fa-trash"></i> Hamos
                                    </a>
                                </td>
                            </tr>

                            <?php $no++;
            }?>


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</section>
<?php } else {
    echo "<script>
window.location = 'error.html';
</script>";
} ?>

<?php break;


    case 'input':
        if ($_SESSION['level'] == 'Admin') {
            ?>

<div class="pagetitle">
    <h1>Dados Users</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="users.html">Dados Users</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Users</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Users
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_user/aksi_user.php?act=input" method="POST" class="row g-3 needs-validation"
                        enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Users</label>
                            <select name="id_tbdr" id="naran" class="form-control" required>
                                <option value="" selected hidden> -- Hili Clinte--</option>
                                <?php $data = $tbr->showtbr();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_tbdor']?>">
                                    <?= $row['naran_tbdr']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" min="0" name="username" class="form-control" id="username"
                                placeholder="Username" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="passwords" class="form-label  mt-2">Password</label>
                            <input type="password" min="0" name="passwords" class="form-control" id="passwords"
                                placeholder="Password" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="" class="form-label  mt-2">Level Users</label>
                            <select name="level" id="naran" class="form-control" required>
                                <option value="" selected hidden> -- Level Users --</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Staff">Staff</option>

                            </select>
                        </div>


                        <div class="col-4 d-flex mt-2">
                            <button class="btn btn-primary btn-sm w-100 m-1" name="submit" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm w-100 m-1" name="" type="reset">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else {
    echo "<script>
window.location = 'error.html';
</script>";
} ?>
<?php break;


    case 'update':
        $id = $_GET['id'];
        $dados = $user->showdados_form($id);
        ?>

<div class="pagetitle">
    <h1>Dados Users</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="users.html">Dados Users</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Users</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Users
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_user/aksi_user.php?act=update&id=<?= $id; ?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Users</label>
                            <select name="id_tbdr" id="naran" class="form-control" required>
                                <option value="" selected hidden><?= $dados[0]['naran_tbdr'] ?></option>

                                <?php $data = $tbr->showtbr();
        foreach ($data as $row) {?>
                                <option value="<?=$row['id_tbdor']?>"><?= $row['naran_tbdr']?></option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" min="0" name="username" class="form-control" id="username"
                                placeholder="Username" value="<?= $dados[0]['username']; ?>" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="passwords" class="form-label  mt-2">Password</label>
                            <input type="password" min="0" value="<?= $dados[0]['pass']; ?>" name="passwords"
                                class="form-control" id="passwords" placeholder="Password" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="" class="form-label  mt-2">Level Users</label>
                            <select name="level" id="naran" class="form-control" required>
                                <option value="" selected hidden><?=$dados[0]['level'] ?></option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Staff">Staff</option>

                            </select>
                        </div>


                        <div class="col-4 d-flex mt-2">
                            <button class="btn btn-primary btn-sm w-100 m-1" name="submit" type="submit">Update</button>
                            <button class="btn btn-danger btn-sm w-100 m-1" onclick="self.history.back()" name=""
                                type="reset">Cansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php break;
    case 'updatepass':

        $id = $_GET['id'];
        $dados = $user->showdados_form($id);

        ?>
<div class="pagetitle">
    <h1>Dados Users</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="users.html">Dados Users</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Users</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Users
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_user/aksi_user.php?act=updatepass&id=<?=$id; ?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Users</label>
                            <select name="id_tbdr" id="naran" class="form-control" required disabled>
                                <option value="" selected><?= $dados[0]['naran_tbdr'] ?></option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" min="0" name="username" class="form-control" id="username"
                                placeholder="Username" value="<?= $dados[0]['username']; ?>" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="passwords" class="form-label  mt-2">Password</label>
                            <input type="password" min="0" value="<?= $dados[0]['pass']; ?>" name="passwords"
                                class="form-control" id="passwords" placeholder="Password" required>
                        </div>
                        <div class="col-12  mt-2">
                            <label for="" class="form-label  mt-2">Level Users</label>
                            <select name="level" id="naran" class="form-control" disabled>
                                <option value="" selected><?=$dados[0]['level'] ?></option>

                            </select>
                        </div>


                        <div class="col-4 d-flex mt-2">
                            <button class="btn btn-primary btn-sm w-100 m-1" name="submit" type="submit">Update</button>
                            <button class="btn btn-danger btn-sm w-100 m-1" onclick="self.history.back()" name=""
                                type="reset">Cansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php break; ?>

<?php } ?>