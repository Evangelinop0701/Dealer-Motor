<?php

if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}

$act = $_GET['act'];

switch ($act) {
    case 'read':?>

<div class="pagetitle">
    <h1>Dados Cliente</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Dados Cliente</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Staff') { ?>

                    <div class="row">

                        <div class="col-8">
                            <a href="cliente-input.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1"
                                id="btn"><i class="bi bi-plus fw-bold"></i>
                                Aumenta
                                Dados</a>
                        </div>

                        <div class="col-4">
                            <form action="modul/mod_cliente/aksi_cliente.php?act=import" method="POST"
                                class="ml-10 my-4 d-flex" method="POST" enctype="multipart/form-data">
                                <input class="form-control" type="file" name="file" required>
                                <button type="submit" class="btn btn-sm btn-secondary " id="btnn"><i
                                        class="bi bi-shift-fill ml-2"></i> IMPORT</button>
                            </form>
                        </div>

                    </div>

                    <?php } ?><br>
                    <table class="table table-striped table-bordered table-hover datatable shadow" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Cliente</th>
                                <th scope="col">Sexu</th>
                                <th scope="col">Data Moris</th>
                                <th scope="col">Suku</th>
                                <th scope="col">Postu</th>
                                <th scope="col">Municipiu</th>
                                <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Staff') {?>
                                <th scope="col">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $data = $cliente->show_dados_cliente();
        $no =1;
        foreach ($data as $row) {?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['naran_cliente'] ?></td>
                                <td><?= $row['sexu'] ?></td>
                                <td><?=$row['loron']; ?>,<?=$row['dataa']; ?> <?=$row['fulan']; ?> <?=$row['tinan']; ?>
                                </td>
                                <td><?= $row['naran_suku'] ?></td>
                                <td><?= $row['naran_postu'] ?></td>
                                <td><?= $row['naran_mun'] ?></td>
                                <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Staff') {?>
                                <td class="d-flex">
                                    <a href="cliente-update-<?=$row['id_cliente'];?>.html" class="py-0 m-1 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a>|
                                    <a href="modul/mod_cliente/aksi_cliente.php?act=delete&id=<?=$row['id_cliente'];?>"
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
        if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Staff') {?>

<div class="pagetitle">
    <h1>Dados Cliente</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="cliente.html">Dados Cleinte</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Cliente</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Cliente
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_cliente/aksi_cliente.php?act=input" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12 mt-4">
                            <label for="naran_cliente" class="form-label">Naran Cleinte</label>
                            <input type="text" name="naran_cliente" class="form-control" id="naran_cliente"
                                placeholder="Naran Cleinte" required>
                        </div>
                        <div class="col-12 my-0">
                            <label for="naran_cleinte" class="form-label">Sexu</label>
                            <select name="sexu" id="naran_cliente" class="form-control">
                                <option value="" selected hidden>-- Sexu --</option>
                                <option value="Feto">Mane</option>
                                <option value="Feto">Feto</option>
                            </select>
                            <div class="col-12">
                                <label for="naran" class="form-label">Naturalidade</label>
                                <select name="id_suku" class="form-select" id="select_box" required>
                                    <option value="">Munisipiu-Postu-Suku</option>
                                    <?php $data = $mps->showmps();
            foreach ($data as $row) {?>
                                    <option value="<?=$row['id_suku']?>">
                                        <?= $row['naran_mun']?> - <?= $row['naran_postu']?> - <?= $row['naran_suku']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="data_moris" class="form-label">Data Moris</label>
                                <input type="date" name="data_moris" class="form-control" id="data_moris" placeholder=""
                                    required>
                            </div>
                            <div class="col-12  mt-2">
                                <label for="hela_fatin" class="form-label">Hela Fatin</label>
                                <input type="text" name="hela_fatin" class="form-control" id="hela_fatin"
                                    placeholder="Hela Fatin" required>
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
<?php } else {
    echo "<script>window.location='erro.html';</script>";
} ?>
<?php break;


    case 'update':

        $id = $_GET['id'];
        $c = $cliente->show_form($id);

        ?>

<div class="pagetitle">
    <h1>Dados Cliente</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="cliente.html">Dados Cleinte</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Cliente</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Cliente
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_cliente/aksi_cliente.php?act=update&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12 mt-4">
                            <label for="naran_cliente" class="form-label">Naran Cleinte</label>
                            <input type="text" name="naran_cliente" class="form-control" id="naran_cliente"
                                placeholder="Naran Cleinte" value="<?=$c[0]['naran_cliente']?>" required>
                        </div>
                        <div class="col-12 my-0">
                            <label for="naran_cleinte" class="form-label">Sexu</label>
                            <select name="sexu" id="naran_cliente" class="form-control">
                                <option value="<?=$c[0]['sexu']?>" selected hidden><?=$c[0]['sexu']?></option>
                                <option value="Mane">Mane</option>
                                <option value="Feto">Feto</option>
                            </select>
                            <div class="col-12">
                                <label for="naran" class="form-label">Naturalidade</label>
                                <select name="id_suku" class="form-select" id="select_box" required>
                                    <option value="<?=$c[0]['id_suku']?>" selected hidden> <?= $c[0]['naran_mun']?> -
                                        <?= $c[0]['naran_postu']?> - <?= $c[0]['naran_suku']?></option>
                                    <?php $natu= $mps->showmps();
                                    foreach ($natu as $row) {?>
                                    <option value="<?=$row['id_suku']?>">
                                        <?= $row['naran_mun']?> - <?= $row['naran_postu']?> - <?= $row['naran_suku']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="data_moris" class="form-label">Data Moris</label>
                                <input type="date" value="<?=$c[0]['data_moris']?>" name="data_moris"
                                    class="form-control" id="data_moris" placeholder="" required>
                            </div>
                            <div class="col-12  mt-2">
                                <label for="hela_fatin" class="form-label">Hela Fatin</label>
                                <input type="text" name="hela_fatin" value="<?=$c[0]['hela_fatin']?>"
                                    class="form-control" id="hela_fatin" placeholder="Hela Fatin" required>
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

<?php break;?>
<?php } ?>