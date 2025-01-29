<?php

$act = $_GET['act'];

switch ($act) {
    case 'read':?>
<div class="pagetitle">
    <h1>Munisipiu/Postu/Suku</h1>
    <nav>
        <ol class="breadcrumb alert alert-success py-1">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item "><a href="" class=" <?php if($act == $act) {
                echo "active";
            }?>">Munisipiu-Postu-Suku</a></li>
        </ol>
    </nav>
</div>


<!-- content modal municipiu -->
<div class="modal fade" id="municipiu" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hili file Extensi .CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="modul/mps/aksi.php?act=import" method="POST" class="ml-10 mt-4 d-flex" method="POST"
                    enctype="multipart/form-data">
                    <input class="form-control" type="file" name="file" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" id="btnnn">CLOSE</button>
                <button type="submit" class="btn btn-sm" id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                    IMPORT</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end content modal municipiu-->

<!-- content modal suku -->
<div class="modal fade" id="suku" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hili file Extensi .CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="modul/mps/aksi.php?act=import_suku" method="POST" class="ml-10 mt-4 d-flex" method="POST"
                    enctype="multipart/form-data">
                    <input class="form-control" type="file" name="file" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" id="btnnn">CLOSE</button>
                <button type="submit" class="btn btn-sm" id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                    IMPORT</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end content modal postu-->
<!-- content modalpostu -->
<div class="modal fade" id="postu" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hili file Extensi .CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="modul/mps/aksi.php?act=import_postu" method="POST" class="ml-10 mt-4 d-flex" method="POST"
                    enctype="multipart/form-data">
                    <input class="form-control" type="file" name="file" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" id="btnnn">CLOSE</button>
                <button type="submit" class="btn btn-sm" id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                    IMPORT</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end content modal postu-->



<section class="section profile">
    <div class="row">
        <div class="col-xl-6">

            <div class="card">
                <div class="card-body ">
                    <button type="button" class="btn btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#municipiu"
                        id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                        IMPORT</button>

                    <table class="table table-striped table-bordered table-hover datatable" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Municipiu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $mun = $mps->mun();
                            $no = 1;

                            foreach ($mun as $row) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['naran_mun']; ?></td>
                                <td class="d-flex">
                                    <a href="update-mun-<?=$row['id_mun'];?>.html" class="py-0 my-0">Hadia
                                    </a>|
                                    <a href="modul/mps/aksi.php?act=delete&id=<?=$row['id_mun'];?>"
                                        class="py-0 my-0">Hamos
                                    </a>
                                </td>
                            </tr>

                            <?php $no++; } ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>

        <div class="col-xl-6">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#postu"
                        id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                        IMPORT</button>
                    <table class="table table-striped table-bordered table-hover datatable" border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Naran Postu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        
                        $postu = $mps->postu();
                        $no = 1;
                        foreach ($postu as $row) {
                        ?>

                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_postu']; ?></td>
                                <td class="d-flex">
                                    <a href="update-postu-<?=$row['id_postu'];?>.html" class="py-0 my-0">Hadia
                                    </a>|
                                    <a href="modul/mps/aksi.php?act=delete&id=<?=$row['id_postu'];?>"
                                        class="py-0 my-0">Hamos
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <div class="col-xl-6">

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#suku"
                        id="btnn"><i class="bi bi-shift-fill ml-2"></i>
                        IMPORT</button>
                    <table class="table table-striped table-bordered table-responsive rounded-2 table-hover datatable"
                        border="">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Naran Suku</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        
                        $suku = $mps->suku();
                        $no = 1;
                        foreach ($suku as $row) {
                        ?>

                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_suku']; ?></td>
                                <td class="d-flex">
                                    <a href="update-suku-<?=$row['id_suku'];?>.html" class="py-0 my-0">Hadia
                                    </a>|
                                    <a href="modul/mps/aksi.php?act=delete&id=<?=$row['id_suku'];?>"
                                        class="py-0 my-0">Hamos
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</section>

<?php break ?>


<?php } ?>