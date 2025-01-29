<?php
if (!$user->get_sessi()) {
    header('location:login.html');
}

if ($_SESSION['level'] == 'Admin') {
    ?>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if($_GET['module'] == 'home') {
                echo " ";
            } elseif ($_GET['module'] == 'dashboard') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="dashboard.html">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'd_sasan') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="d_sasan.html">
                <i class="bi bi-table"></i>
                <span>Dados Sasan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'stock') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="stock.html">
                <i class="bi bi-table"></i>
                <span>Stock Sasan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'kategoria') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="kategoria.html">
                <i class="bi bi-table"></i>
                <span>Kategoria</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'trabalhador') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="trabalhador.html">
                <i class="bi bi-people-fill"></i>
                <span> Trabalhadores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'transaksi') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="transaksi.html">
                <i class="bi bi-card-list"></i>
                <span>Transaksaun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'cliente') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="cliente.html">
                <i class="bi bi-people-fill"></i>
                <span> Dados Clientes</span>
            </a>
        </li>
    </ul>
</aside>

<?php } elseif ($_SESSION['level'] == "Kasir") { ?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if($_GET['module'] == 'home') {
                echo " ";
            } elseif ($_GET['module'] == 'dashboard') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="dashboard.html">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'd_sasan') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="d_sasan.html">
                <i class="bi bi-table"></i>
                <span>Dados Sasan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'stock') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="stock.html">
                <i class="bi bi-table"></i>
                <span>Stock Sasan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'transaksi') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="transaksi.html">
                <i class="bi bi-card-list"></i>
                <span>Transaksaun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'cliente') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="cliente.html">
                <i class="bi bi-people-fill"></i>
                <span> Dados Clientes</span>
            </a>
        </li>
    </ul>
</aside>

<?php } elseif ($_SESSION['level'] == "Staff") {  ?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if($_GET['module'] == 'home') {
                echo " ";
            } elseif ($_GET['module'] == 'dashboard') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="dashboard.html">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'd_sasan') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="d_sasan.html">
                <i class="bi bi-table"></i>
                <span>Dados Sasan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($_GET['module'] == 'cliente') {
                echo " ";
            } else {
                echo "collapsed";
            } ?>" href="cliente.html">
                <i class="bi bi-people-fill"></i>
                <span>Registo Cliente</span>
            </a>
        </li>
    </ul>
</aside>
<?php } ?>