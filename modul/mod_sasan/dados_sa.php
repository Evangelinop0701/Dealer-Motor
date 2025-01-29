<?php

$act = $_GET['act'];
switch ($act) {

    case 'showdados':?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Dados Sasan</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <?php if ($_SESSION['level'] == 'Admin') {?>
                    <a href="input_sasan.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>
                    <?php } ?><br>

                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Sasan</th>
                                <th scope="col">Modelu</th>
                                <th scope="col">Tinan Produz</th>
                                <th scope="col">CC</th>
                                <?php if ($_SESSION['level'] == 'Admin') {?>
                                <th class="col" scope="col">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                $data = $sasan->showdados();
        $no = 1;

        foreach ($data as $row) {?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><a href="detalho-<?=$row['id_sasan']?>.html"><?= $row['naran_sasan']; ?></a></td>
                                <td><?= $row['modelu']; ?></td>
                                <td><?= $row['tinan_produz']; ?></td>
                                <td><?= $row['cc_motor']; ?></td>
                                <?php if ($_SESSION['level'] == 'Admin') {?>
                                <td class="d-flex">
                                    <a href="hadia_sasan-<?=$row['id_sasan'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a> |
                                    <a href="modul/mod_sasan/aksi_sa.php?act=delete&id=<?=$row['id_sasan'];?>&file=<?=$row['foto']?>"
                                        class="py-0 my-0"><i class="fa fa-trash"></i> Hamos
                                    </a>
                                </td>
                                <?php } ?>

                            </tr>
                            <?php $no++;
        } ?>


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</section>

<?php break;

    case 'input':
        if ($_SESSION['level'] == 'Admin') {?>

<div class="pagetitle">
    <h1>Dados Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="d_sasan.html">Dados Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Sasan</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Sasan
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_sasan/aksi_sa.php?act=input" method="POST" class="row g-3 needs-validation"
                        enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Sasan</label>
                            <input type="text" name="naran_sasan" class="form-control" id="naran"
                                placeholder="Naran Sasan" required autofocus>
                            <div class="invalid-feedback">Favor prense Naran Sasan</div>
                        </div>

                        <div class="col-12">
                            <label for="modelu" class="form-label">Modelu</label>
                            <input type="text" name="modelu" placeholder="modelu" class="form-control" id="modelu"
                                required>
                            <div class="invalid-feedback">Favor Prense Modelu</div>
                        </div>
                        <div class="col-12">
                            <label for="tinan_produz" class="form-label">Tinan Produsaun</label>
                            <input type="number" min="0" name="tinan_produz" placeholder="Tinan Produsaun"
                                class="form-control" id="tinan_produz" required>
                            <div class="invalid-feedback">Favor Prense Tinan Produz</div>
                        </div>
                        <div class="col-12">
                            <label for="cc_motor" class="form-label">CC Motor</label>
                            <input type="text" name="cc_motor" placeholder="Kw/h" class="form-control" id="cc_motor"
                                required>
                            <div class="invalid-feedback">Favor Prense Tinan Produz</div>
                        </div>
                        <div class="col-12">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="fupload" class="form-control" id="foto">
                        </div>

                        <div class="col-4 d-flex m-1">
                            <button class="btn btn-primary btn-sm w-100 m-1" name="submit" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm w-100 m-1" name="" type="reset">Reset</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php } elseif ($_SESSION['level'] == 'Kasir') {
    echo "<script>window.location='error.html'</script>";
} elseif ($_SESSION['level'] == 'Staff') {
    echo "<script>window.location='error.html'</script>";
} ?>
<?php break;


    case 'edit':
        $id = $_GET['id'];
        $data = $sasan->showForm($id);

        if ($_SESSION['level'] == 'Admin') {?>
<div class="pagetitle">
    <h1>Dados Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="d_sasan.html">Dados Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Hadia dados Sasan</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Edit Sasan
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_sasan/aksi_sa.php?act=edit&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Sasan</label>
                            <input type="text" name="naran_sasan" class="form-control" id="naran" placeholder=""
                                value="<?=$data[0]['naran_sasan']?>" required>
                            <div class="invalid-feedback">Favor prense Naran Sasan</div>
                        </div>

                        <div class="col-12">
                            <label for="modelu" class="form-label">Modelu</label>
                            <input type="text" value="<?=$data[0]['modelu']?>" name="modelu" placeholder="modelu"
                                class="form-control" id="modelu" required>
                            <div class="invalid-feedback">Favor Prense Modelu</div>
                        </div>
                        <div class="col-12">
                            <label for="tinan_produz" class="form-label">Tinan Produsaun</label>
                            <input type="number" min="0" name="tinan_produz" placeholder="" class="form-control"
                                id="tinan_produz" value="<?=$data[0]['tinan_produz']?>" required>
                            <div class="invalid-feedback">Favor Prense Tinan Produz</div>
                        </div>
                        <div class="col-12">
                            <label for="cc_motor" class="form-label">CC Motor</label>
                            <input type="text" name="cc_motor" value="<?=$data[0]['cc_motor']?>" placeholder="Kw/h"
                                class="form-control" id="cc_motor" required>
                            <div class="invalid-feedback">Favor Prense Tinan Produz</div>
                        </div>
                        <div class="col-12">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="fupload" value="<?=$data[0]['foto']?>" class="form-control"
                                id="foto">

                            <img src="foto_motor/<?=$data[0]['foto'];?>" alt="foto_motor/<?=$data[0]['foto'];?>"
                                class="img-thumbnail mt-2"
                                style="width:100px; heigth:100px; border-radius:3px; border-width:3px;">
                            <br> <label style="font-size:11px;" class="fw-bold"><?=$data[0]['foto'];?></label>

                            <input type="hidden" value="<?=$data[0]['foto']?>" name="foto">
                        </div>

                        <div class="col-4 d-flex m-1">
                            <button class="btn btn-primary btn-sm w-100 m-1" name="submit" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm w-100 m-1" type="reset"
                                onclick="self.history.back()">Cansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } elseif ($_SESSION['level'] == 'Kasir') {
    echo "<script>window.location='error.html'</script>";
} elseif ($_SESSION['level'] == 'Staff') {
    echo "<script>window.location='error.html'</script>";
} ?>

<?php break;
    case 'detalho':
        $id = $_GET['id'];
        $data = $sasan->detalho_sasan($id);

        ?>

<div class="pagetitle">
    <h1>Detalho Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="d_sasan.html">Dados Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Detalho Sasan</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card mb-3" style="max-width:560px;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="foto_motor/<?=$data[0]['foto'];?>" alt="foto_motor/<?=$data[0]['foto'];?>"
                            class="img-fluid rounded-start"
                            style="width:540px; heigth:100px; border-radius:3px; border-width:3px;">
                    </div>
                    <div class="col gx-6">
                        <div class="card-body">
                            <h5 class="card-title mt-4 py-2  text-center alert alert-success">Detahlo Motor</h5>
                            <hr>
                            <h5 class="card-title py-0">Product Name: <?=$data[0]['naran_sasan']?></h5>
                            <p class="card-title py-0">Mdelu: <?=$data[0]['modelu']?></p>
                            <p class="card-title py-0">Kwh: <?=$data[0]['cc_motor']?> CC</p>
                            <p class="card-title py-0">Tinan Produz: <?=$data[0]['tinan_produz']?> CC</p>
                            <hr>
                            <p class="card-text fs-5">
                                <?php

                                echo "<p align=''><div class='alert'>$loron_ohin, ";
        echo data_tl(date("Y m d"));
        echo "</p>";

        ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php break; ?>

<?php } ?>