<?php
if (!$user->get_sessi()) {
    echo "<script>   
            alert('ITA BOOT CEDAUK ALOGIN..!!');
            document.location='login.html';</script>";
}

$act = $_GET['act'];
if ($_SESSION['level'] == 'Admin') {

    switch ($act) {
        case 'showtrabalho':
            ?>

<div class="pagetitle">
    <h1>Dados Trabalhadores</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Dados Trabalhadores</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <!-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> -->
                    <a href="trabalho-input.html" class="btn btn-sm alert alert-success fw-bold my-4 py-1" id="btn"><i
                            class="bi bi-plus fw-bold"></i>
                        Aumenta
                        Dados</a>
                    <table
                        class="table table-striped table-responsive-sm table-bordered table-hover rounded datatable shadow">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Trabalhador</th>
                                <th scope="col">Sexu</th>
                                <th scope="col">Municipiu</th>
                                <th scope="col">Postu</th>
                                <th scope="col">Suku</th>
                                <th scope="col">Hela Fatin</th>
                                <th scope="col">No.Tlf</th>
                                <th class="col" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $data = $tbr->showtbr();
            $no =1;
            foreach ($data as $row) {?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['naran_tbdr'] ?></td>
                                <td><?= $row['sexu'] ?></td>
                                <td><?= $row['naran_mun'] ?></td>
                                <td><?= $row['naran_postu'] ?></td>
                                <td><?= $row['naran_suku'] ?></td>
                                <td><?= $row['hela_fatin'] ?></td>
                                <td><?= $row['no_tlf'] ?></td>
                                <td class="d-flex">
                                    <a href="trabalho-update-<?= $row['id_tbdor'];?>.html" class="py-0 my-0"><i
                                            class="fa fa-edit"></i> Hadia
                                    </a>|
                                    <a href="modul/mod_trabalho/aksi_trabalho.php?act=delete&id=<?=$row['id_tbdor'];?>"
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
        case 'input':?>
<div class="pagetitle">
    <h1>Stock Trabalhador</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="trabalhador.html">Dados Trabalhador</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Input Trabalhador</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Input Trabalhador
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_trabalho/aksi_trabalho.php?act=input" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran_tbdr" class="form-label mt-2">Naran Trabalhador</label>
                            <input type="text" name="naran_tbdr" class="form-control" id="naran_tbdr"
                                placeholder="Prense Naran Trabalhador" required>
                            <div class="invalid-feedback">Favor Prense Coluna</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label">Sexu</label>
                            <select name="sexu" id="kat" class="form-control" required>
                                <option value="" selected hidden> -- Sexu --</option>
                                <option value="Mane">Mane</option>
                                <option value="Feto">Feto</option>

                            </select>
                        </div>

                        <div class="col-12">
                            <label for="naturalidade" class="form-label">Naturalidade</label>
                            <select name="id_suku" id="naturalidade" class="form-control" required>
                                <option value="" selected hidden> Mun-Postu-Suku</option>
                                <?php $data = $mps->showmps();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_suku'] ?>">
                                    <?=$row['naran_mun'] ?>-<?=$row['naran_postu'] ?>-<?=$row['naran_suku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="invalid-feedback">Favor Hili Naturalidade</div>

                        <div class="col-12">
                            <label for="hela_fatin" class="form-label ">Hela Fatin</label>
                            <input type="text" name="hela_fatin" class="form-control" id="hela_fatin"
                                placeholder="Prense Hela fatin" required>
                            <div class="invalid-feedback">Favor prense Hela fatin</div>
                        </div>
                        <div class="col-12">
                            <label for="no_tlf" class="form-label ">No.Tlf</label>
                            <input type="text" name="no_tlf" class="form-control" id="no_tlf"
                                placeholder="Prense No Tlf" required>
                            <div class="invalid-feedback">Favor prense No Tlf</div>
                        </div>

                        <div class="col-12">
                            <label for="fupload" class="form-label ">Foto</label>
                            <input type="file" name="fupload" class="form-control" id="fupload"
                                placeholder="Prense No Tlf" required>
                            <div class="invalid-feedback">Favor prense No Tlf</div>
                        </div>
                        <div class="col-4 d-flex">
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
            $dt = $tbr->show_form($id);

            ?>


<div class="pagetitle">
    <h1>Stock Trabalhador</h1>
    <nav>
        <ol class="breadcrumb alert alert-success  py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="trabalhador.html">Dados Trabalhador</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Update Trabalhador</a></li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-header py-0" id="card-header">
                    <div class="card-title py-0 mt-2 text-white">
                        Form Update Trabalhador
                    </div>
                </div>
                <div class="card-body">
                    <form action="modul/mod_trabalho/aksi_trabalho.php?act=update&id=<?=$id;?>" method="POST"
                        class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

                        <div class="col-12">
                            <label for="naran_tbdr" class="form-label mt-2">Naran Trabalhador</label>
                            <input type="text" name="naran_tbdr" class="form-control" id="naran_tbdr"
                                placeholder="Prense Naran Trabalhador" value="<?=$dt[0]['naran_tbdr']?>" required>
                            <div class="invalid-feedback">Favor Prense Coluna</div>
                        </div>
                        <div class="col-12">
                            <label for="kat" class="form-label">Sexu</label>
                            <select name="sexu" id="kat" class="form-control" required>
                                <option value="<?=$dt[0]['sexu']; ?>" selected hidden><?=$dt[0]['sexu']; ?></option>
                                <option value="Mane">Mane</option>
                                <option value="Feto">Feto</option>

                            </select>
                        </div>

                        <div class="col-12">
                            <label for="naturalidade" class="form-label">Naturalidade</label>
                            <select name="id_suku" id="naturalidade" class="form-control" required>
                                <option value="<?=$dt[0]['id_suku']; ?>" selected hidden>
                                    <?=$dt[0]['naran_mun'] ?>-<?=$dt[0]['naran_postu'] ?>-<?=$dt[0]['naran_suku'] ?>
                                </option>
                                <?php $data = $mps->showmps();
            foreach ($data as $row) {?>
                                <option value="<?=$row['id_suku'] ?>">
                                    <?=$row['naran_mun'] ?>-<?=$row['naran_postu'] ?>-<?=$row['naran_suku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="invalid-feedback">Favor Hili Naturalidade</div>

                        <div class="col-12">
                            <label for="hela_fatin" class="form-label ">Hela Fatin</label>
                            <input type="text" name="hela_fatin" value="<?=$dt[0]['hela_fatin']; ?>"
                                class="form-control" id="hela_fatin" placeholder="Prense Hela fatin" required>
                            <div class="invalid-feedback">Favor prense Hela fatin</div>
                        </div>
                        <div class="col-12">
                            <label for="no_tlf" class="form-label ">No.Tlf</label>
                            <input type="text" name="no_tlf" value="<?=$dt[0]['no_tlf']; ?>" class="form-control"
                                id="no_tlf" placeholder="Prense No Tlf" required>
                            <div class="invalid-feedback">Favor prense No Tlf</div>
                        </div>

                        <div class="col-12">
                            <label for="fupload" class="form-label ">Foto</label>
                            <input type="file" name="fupload" class="form-control" id="fupload">
                            <img src="foto_trabalhador/<?=$dt[0]['foto'];?>" alt="foto_trabalhador/<?=$dt[0]['foto'];?>"
                                class="img-thumbnail mt-2"
                                style="width:100px; heigth:100px; border-radius:3px; border-width:3px;">
                            <br> <label style="font-size:11px;" class="fw-bold"><?=$dt[0]['foto'];?></label>

                            <input type="hidden" value="<?=$dt[0]['foto']?>" name="foto">
                        </div>
                        <div class="col-4 d-flex">
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
<?php } else {
    echo "<script>window.location='error.html'</script>";

} ?>