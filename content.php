<?php

if (!$user->get_sessi()) {
    header('location: login.html');
} elseif ($_GET['module'] == 'home') {
    include "home.php";
} elseif ($_GET['module'] == 'dashboard') {
    include "home.php";

} elseif ($_GET['module'] == 'd_sasan') {
    include "modul/mod_sasan/dados_sa.php";

} elseif ($_GET['module'] == 'stock') {
    include "modul/mod_stock/stock.php";
} elseif ($_GET['module'] == 'transaksi') {
    include "modul/mod_transaksi/transaksi.php";
} elseif ($_GET['module'] == 'kategoria') {
    include "modul/mod_kategoria/kategoria.php";
} elseif ($_GET['module'] == 'trabalhador') {
    include "modul/mod_trabalho/trabalho.php";
} elseif ($_GET['module'] == 'users') {
    include "modul/mod_user/user.php";
} elseif ($_GET['module'] == 'mps') {
    include "modul/mps/mps.php";
} elseif ($_GET['module'] == 'cliente') {
    include "modul/mod_cliente/cliente.php";
} elseif ($_GET['module'] == 'error') {
    include "error-404.php";
}
