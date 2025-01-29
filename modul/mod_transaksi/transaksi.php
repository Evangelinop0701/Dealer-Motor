<?php

if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}

if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Kasir') {

    $act = $_GET['act'];

    switch ($act) {
        case 'show_transaksi':?>


<div class="pagetitle">
    <h1>Dados Transaksaun</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Dados Transaksaun</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <a href="transaksi-input.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Cliente</th>
                                <th scope="col">Naran Sasan</th>
                                <th scope="col">Presu Kada Motor</th>
                                <th scope="col">Total Hola</th>
                                <th scope="col">Total Presu</th>
                                <th scope="col">Data Hola</th>
                                <th class="col" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $data = $transaksi->show_transaksi();
            $no =1;
            foreach ($data as $row) {

                $tp = $row['total_hola'] * $row['presu_kada_m'];
                $transaksi->total_presu($row['id_faan'], $tp);
                ?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_cliente']; ?></td>
                                <td><?=$row['naran_sasan']; ?></td>
                                <td><i> $ </i><?=$row['presu_kada_m']; ?> <i>USD</i></td>
                                <td><?=$row['total_hola']; ?></td>
                                <td><i>$</i> <?= $tp; ?> <i>USD</i></td>
                                <td><?=$row['loron']; ?>,<?=$row['dataa']; ?> <?=$row['fulan']; ?> <?=$row['tinan']; ?>
                                </td>
                                <td class="d-flex">

                                    <a href="hadia-transaksi-<?=$row['id_faan'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a>|
                                    <a href="modul/mod_transaksi/aksi_transaksi.php?act=delete&id=<?=$row['id_faan'];?>"
                                        class="py-0 my-0"><i class="fa fa-trash"></i> Hamos
                                    </a>
                                </td>
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
        case 'input': ?>

<div class="pagetitle">
    <h1>Transaksaun</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="transaksi.html">Transaksaun</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Transaksaun</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Transakaaun
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_transaksi/aksi_transaksi.php?act=input" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Cliente</label>
                            <select name="id_cliente" id="naran" class="form-control" required>
                                <option value="" selected hidden> -- Hili Clinte--</option>
                                <?php $data = $cliente->show_dados_cliente();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_cliente']?>">
                                    <?= $row['naran_cliente']?>
                                </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor hili Naran Cliente</div>
                        </div>

                        <div class="col-12">
                            <label for="data_faan" class="form-label">Data Faan</label>
                            <input type="date" min="0" name="data_faan" class="form-control" id="data_faan" required>
                            <div class="invalid-feedback">Favor Prense Stock</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label mt-2">Naran Sasan</label>
                            <select name="id_stock" id="kat" class="form-control" required>
                                <option value="" selected hidden> -- Hili Naran Sasan --</option>
                                <?php $data = $stock->show_stock();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_stock']?>"><b class="fw-bold"><?= $row['naran_sasan']?></b>|
                                    <?= $row['modelu']?>
                                </option>
                                <?php } ?>

                            </select>
                            <div class="invalid-feedback">Favor Hili Naran Sasan</div>
                            <div class="col-12  mt-2">
                                <label for="total_hola" class="form-label  mt-2">Total Hola</label>
                                <input type="number" min="0" name="total_hola" class="form-control" id="total_hola"
                                    placeholder="Prense Total hola" required>
                                <div class="invalid-feedback">Favor Prense Coluna</div>
                            </div>
                            <div class="col-4 d-flex mt-2">
                                <button class="btn btn-primary btn-sm w-100 m-1" name="submit"
                                    type="submit">Save</button>
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
            $dados = $transaksi->show_transaksi_form($id);

            ?>

<div class="pagetitle">
    <h1>Transaksaun</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="transaksi.html">Transaksaun</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Transaksaun</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Transakaaun
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_transaksi/aksi_transaksi.php?act=update&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran" class="form-label mt-2">Naran Cliente</label>
                            <select name="id_cliente" id="naran" class="form-control" required>
                                <?php $data = $cliente->show_dados_cliente();
            foreach ($data as $row) {

                if ($naran == $row['id_cliente']) {?>
                                <option value="<?=$row['id_cliente']?>" selected>
                                    <?= $row['naran_cliente']?>
                                </option>
                                <?php } else { ?>
                                <option value="<?=$row['id_cliente']?>" selected>
                                    <?= $row['naran_cliente']?>
                                </option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">Favor hili Naran Cliente</div>
                        </div>

                        <div class="col-12">
                            <label for="data_faan" class="form-label">Data Faan</label>
                            <input type="date" min="0" value="<?= $dados[0]['data_faan']; ?>" name="data_faan"
                                class="form-control" id="data_faan" required>
                            <div class="invalid-feedback">Favor Prense Stock</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label mt-2">Naran Sasan</label>
                            <select name="id_stock" id="kat" class="form-control" required disabled>
                                <option value="<?=$dados[0]['id_stock']?>"><?= $dados[0]['naran_sasan']; ?> |
                                    <?= $dados[0]['modelu']; ?></option>
                            </select>
                            <div class="invalid-feedback">Favor Hili Naran Sasan</div>
                            <div class="col-12  mt-2">
                                <label for="total_hola" class="form-label  mt-2">Total Hola</label>
                                <input type="number" min="0" name="total_hola" value="<?= $dados[0]['total_hola']; ?>"
                                    class="form-control" id="total_hola" required disabled>
                                <div class="invalid-feedback">Favor Prense Coluna</div>
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
<?php break;
        case 'det_transaksi': ?>
<div class="pagetitle">
    <h1>Dados Transaksaun</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="transaksi.html">Transaksaun</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Detalho Transaksaun</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <br>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Cliente</th>
                                <th scope="col">Naran Sasan</th>
                                <th scope="col">Presu Kada Motor</th>
                                <th scope="col">Total Hola</th>
                                <th scope="col">Total Presu</th>
                                <th scope="col">Data Hola</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $date = date('Y-m-d');
            $data = $transaksi->show_transaksi_dt($date);
            $no =1;
            foreach ($data as $row) {

                $tp = $row['total_hola'] * $row['presu_kada_m'];
                $transaksi->total_presu($row['id_faan'], $tp);
                ?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_cliente']; ?></td>
                                <td><?=$row['naran_sasan']; ?></td>
                                <td><i> $ </i><?=$row['presu_kada_m']; ?> <i>USD</i></td>
                                <td><?=$row['total_hola']; ?></td>
                                <td><i>$</i> <?= $tp; ?> <i>USD</i></td>
                                <td><span
                                        class="my-0 py-0 p-1 bg-danger text-white rounded-1"><?=$row['data_faan']; ?></span>
                                </td>
                            </tr>
                            <?php $no++;
            } ?>
                            <!-- <tr>
                                <td colspan="3" class="text-center bg-dark text-uppercase fs-6 text-white fw-bold">total
                                    presu
                                    motor</td>
                                <td class="text-center bg-success text-uppercase fs-6 fw-bold"></td>
                                <td class="text-center bg-info text-uppercase fs-6 fw-bold"></td>
                                <td class="text-center bg-warning text-uppercase fs-6 fw-bold">4342</td>
                                <td class="text-center bg-primary text-uppercase fs-6 fw-bold"></td>
                            </tr> -->

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</section>
<?php break; ?>
<?php } ?>

<?php } else {
    echo "<script>window.location ='error.html';</script>";
} ?>