<?php

if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}

if ($_SESSION['level'] == 'Admin') {

    $act = $_GET['act'];

    switch ($act) {
        case 'show_kate':?>
<div class="pagetitle">
    <h1>Dados Kategoria Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Kategoria</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <a href="kategoria-input.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategoria</th>
                                <th class="col" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $data = $kt->show_kategoria();
            $no =1;
            foreach ($data as $row) {?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['kategoria']; ?></td>
                                <td class="d-flex">
                                    <a href="kategoria-update-<?=$row['id_kategoria'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i>Hadia
                                    </a>|
                                    <a href="modul/mod_kategoria/aksi_kategoria.php?act=delete&id=<?=$row['id_kategoria'];?>"
                                        class="py-0 my-0"><i class="fa fa-trash"></i> Hamos
                                    </a>
                                </td>
                            </tr>

                            <?php  $no++;
            } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</section>
<?php break;
        case 'input':?>
<div class="pagetitle">
    <h1>Dados Kategoria</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="kategoria.html">Kategoria</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Kategoria</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Kategoria
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_kategoria/aksi_kategoria.php?act=input" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Kategoria</label>
                            <input type="text" name="kategoria" class="form-control" id="naran"
                                placeholder="Prense Kategoria" required>
                            <div class="invalid-feedback">Favor prense Kategoria</div>
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



<?php break;
        case 'update':

            $id = $_GET['id'];

            $data = $kt->show_kategoria_form($id);

            ?>
<div class="pagetitle">
    <h1>Dados Kategoria</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="kategoria.html">Kategoria</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Kategoria</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Kategoria
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_kategoria/aksi_kategoria.php?act=update&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Kategoria</label>
                            <input type="text" value="<?= $data[0]['kategoria']?>" name="kategoria" class="form-control"
                                id="naran" placeholder="Prense Kategoria" required>
                            <div class="invalid-feedback">Favor prense Kategoria</div>
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
<?php break; ?>

<?php } ?>

<?php } elseif ($_SESSION['level'] == 'Kasir') {
    echo "<script>window.location='error.html'</script>";
} elseif ($_SESSION['level'] == 'Staff') {
    echo "<script>window.location='error.html'</script>";
} ?>