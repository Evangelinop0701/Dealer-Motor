<?php

$act = $_GET['act'];
switch ($act) {
    case 'show_stock':?>

<div class="pagetitle">
    <h1>Stock</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="d_sasan.html" class="active">Stock Sasan</a></li>

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
                    <a href="input_stock.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>

                    <?php } ?>
                    <br>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Motor</th>
                                <th scope="col">Kategoria Motor</th>
                                <th scope="col">Presu Kada Motor</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Total Presu</th>
                                <?php if ($_SESSION['level'] == 'Admin') { ?>
                                <th class="col" scope="col">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        $data = $stock->show_stock();

        $no =1;

        foreach ($data as $key => $row) {

            $total_p = $row['stock'] * $row['presu_kada_m'];

            ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$row['naran_sasan']?></td>
                                <td><?=$row['kategoria']?></td>
                                <td><?=$row['presu_kada_m']?> <i>USD</i></td>
                                <td><?=$row['stock']?> <?php if ($_SESSION['level'] == "Admin") { ?>

                                    <a href="update_stock-<?=$row['id_stock']?>.html" style="font-size:10px;"
                                        class="btn btn-success btn-sm fw-bold py-0"><i class="fa fa-plus"></i> Add
                                        Stock</a>
                                    <?php } else {

                                    } ?>
                                </td>
                                <td><?= $total_p; ?> <i>USD</i></td>
                                <?php if ($_SESSION['level'] == "Admin") { ?>
                                <td class="d-flex">

                                    <a href="hadia_stock-<?=$row['id_stock'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a> |
                                    <a href="modul/mod_stock/aksi_stock.php?act=delete&id=<?=$row['id_stock'];?>"
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
    <h1>Stock Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="stock.html">Stock Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Stock</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Stock
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_stock/aksi_stock.php?act=input" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Sasan</label>
                            <select name="id_sasan" id="naran" class="form-control" required>
                                <option value="" selected hidden> -- Hili Sadan --</option>
                                <?php $data = $sasan->showdados();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_sasan']?>"><b class="fw-bold"><?= $row['naran_sasan']?></b>|
                                    <?= $row['modelu']?>
                                </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor hili Naran Sasan</div>
                        </div>

                        <div class="col-12">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="0" name="stock" class="form-control" id="stock" required>
                            <div class="invalid-feedback">Favor Prense Stock</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label mt-2">Kategoria</label>
                            <select name="id_kategoria" id="kat" class="form-control" required>
                                <option value="" selected hidden> -- Kategoria --</option>
                                <?php $data = $kt->show_kategoria();
            foreach ($data as $row) {?>
                                <option value="<?= $row['id_kategoria']?>">
                                    <?= $row['kategoria']?>
                                </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor Hili Kategoria</div>
                            <div class="col-12  mt-2">
                                <label for="presu_kada_m" class="form-label  mt-2">Presu Kada Motor</label>
                                <input type="number" min="0" name="presu_kada_m" class="form-control" id="presu_kada_m"
                                    required>
                                <div class="invalid-feedback">Favor Prense Presu</div>
                            </div>
                            <div class="col-4 d-flex mt-2">
                                <button class="btn btn-primary w-100 m-1" name="submit" type="submit">Save</button>
                                <button class="btn btn-danger w-100 m-1" name="" type="reset">Reset</button>
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
    case 'update_stock':
        $id = $_GET['id'];
        $data = $stock->show_dados_stock($id);
        if ($_SESSION['level'] == 'Admin') {?>

<div class="pagetitle">
    <h1>Stock Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="stock.html">Stock Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Add Stock</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Stock
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_stock/aksi_stock.php?act=update_stock&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>


                        <div class="col-12">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="0" name="stock" class="form-control"
                                value="<?=$data[0]['stock']?>" id="stock" required>
                            <div class="invalid-feedback">Favor Prense Stock</div>
                        </div>
                        <input type="hidden" name="id_stock" value="<?=$data[0]['id_stock']?>">


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
<?php } elseif ($_SESSION['level'] == 'Kasir') {
    echo "<script>window.location='error.html'</script>";
} elseif ($_SESSION['level'] == 'Staff') {
    echo "<script>window.location='error.html'</script>";
} ?>
<?php break;

    case 'update':

        $id = $_GET['id'];

        $dados = $stock->show_dados_form($id);
        if ($_SESSION['level'] == 'Admin') {?>
<div class="pagetitle">
    <h1>Stock Sasan</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="stock.html">Stock Sasan</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Stock</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Stock
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_stock/aksi_stock.php?act=update&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Sasan</label>
                            <select name="id_sasan" id="naran" class="form-control" required>
                                <option value="" selected hidden><?=   $dados[0]['naran_sasan']?> |
                                    <?=    $dados[0]['modelu']?>
                                </option>
                                <?php $data = $sasan->showdados();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_sasan']?>"><b class="fw-bold"><?= $row['naran_sasan']?></b>|
                                    <?= $row['modelu']?>
                                </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor hili Naran Sasan</div>
                        </div>

                        <div class="col-12">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="0" name="stock" class="form-control"
                                value="<?=$dados[0]['stock']?>" id="stock" required>
                            <div class="invalid-feedback">Favor Prense Stock</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label mt-2">Kategoria</label>
                            <select name="id_kategoria" id="kat" class="form-control" required>
                                <option value="" selected hidden><?=$dados[0]['kategoria']?></option>
                                <?php $data = $kt->show_kategoria();
            foreach ($data as $row) {?>
                                <option value="<?= $row['id_kategoria']?>">
                                    <?= $row['kategoria']?>
                                </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor Hili Kategoria</div>
                            <div class="col-12  mt-2">
                                <label for="presu_kada_m" class="form-label  mt-2">Presu Kada Motor</label>
                                <input type="number" value="<?= $dados[0]['presu_kada_m']; ?>" min="0"
                                    name="presu_kada_m" class="form-control" id="presu_kada_m" required>
                                <div class="invalid-feedback">Favor Prense Presu</div>
                            </div>
                            <div class="col-4 d-flex mt-2">
                                <button class="btn btn-primary btn-sm w-100 m-1" name="submit"
                                    type="submit">Update</button>
                                <button class="btn btn-danger btn-sm w-100 m-1" onclick="self.history.back()" name=""
                                    type="reset">Cansela</button>
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

<?php break; ?>
<?php } ?>