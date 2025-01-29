<!-- <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Default Solid Color</h5>
            <div class="alert alert-info  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Info Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis
                    laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div> -->

<?php
$date = date('Y-m-d');

$stock_manual = $stock->stock_manual();
$stock_metik = $stock->stock_metik();
$total_cliente_mun = $cliente->show_total_cl();



$data =  $transaksi->incum($date);

$cont = $data['Conta'];
$total = $data['Total'];


?>

<div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Rendimentu Kada Loron</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar fs-1 my-0 text-success fw-bold"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="fs-2"><?= $data['Total'];?></h6>
                                <span class="text-success small pt-1 fw-bold"></span> <span
                                    class="text-muted small pt-2 ps-1"><a href="dt-transaksi.html"
                                        class="alert alert-danger rounded-1 p-1 py-0 text-success"><i
                                            class="bi bi-eye text-success"></i>
                                        Detalho</a></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Revenue <span>| This Month</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>$3,264</h6>
                                <span class="text-success small pt-1 fw-bold">8%</span> <span
                                    class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Customers <span>| This Year</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>1244</h6>
                                <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                    class="text-muted small pt-2 ps-1">decrease</span>

                            </div>
                        </div>

                    </div>
                </div>

            </div> -->

        </div>
    </div>
    <hr>
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb alert alert-success text-uppercase fw-bold fs-5  py-1">
                <li class="breadcrumb-item active">Stock Motor</li>

            </ol>
        </nav>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Stock Kategoria Motor</h5>

                <!-- Doughnut Chart -->
                <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#doughnutChart'), {
                        type: 'doughnut',
                        data: {
                            labels: [
                                'Motor Manual',
                                'Motor Automatico',
                            ],
                            datasets: [{
                                label: 'Total Stock',
                                data: [<?=$stock_manual['Total_manual'] ?>,
                                    <?= $stock_metik['Total_metik'] ?>
                                ],
                                backgroundColor: [
                                    'rgb(255, 99, 132)',

                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                });
                </script>
                <!-- End Doughnut CHart -->

            </div>
        </div>
    </div>
    <div class="col-lg-8">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Stock Motor</h5>

                <!-- Bar Chart -->
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                            labels: [
                                <?php
                                                                $data =  $stock->show_stock();
                            foreach ($data as $row) {
                                echo '"'.$row['naran_sasan'].'",';
                            } ?>
                            ],
                            datasets: [{
                                label: 'Total Stock',
                                data: [<?php
                                                        $dat =  $stock->show_stock();
                            foreach ($dat as $row) {
                                echo '"'.$row['stock'].'",';
                            } ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
                </script>
                <!-- End Bar CHart -->

            </div>
        </div>
    </div>
</div>
<hr>
<div class="pagetitle">
    <nav>
        <ol class="breadcrumb alert alert-success text-uppercase fw-bold fs-5  py-1">
            <li class="breadcrumb-item active">Dados Cliente cada munisipiu</li>

        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Dados Cliente</h5>

                <!-- Line Chart -->
                <canvas id="lineChart" style="max-height: 400px;"></canvas>
                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#lineChart'), {
                        type: 'line',
                        data: {
                            labels: [
                                <?php foreach ($total_cliente_mun as $row) {
                                    echo '"'.$row['naran_mun'].'",';
                                } ?>
                            ],
                            datasets: [{
                                label: 'Total Cliente',
                                data: [<?php foreach ($total_cliente_mun as $row) {
                                    echo '"'.$row['Total_m'].'",';

                                } ?>],
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
                </script>
                <!-- End Line CHart -->

            </div>
        </div>
    </div>
</div>