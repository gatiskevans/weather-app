<?php

require_once 'vendor/autoload.php';

include 'Search/locationForm.php';

if (isset($_GET['submit'])) {
    if ($_GET['location'] === '' || is_numeric($_GET['location'])) {
        $_GET['location'] = 'Riga';
    }
    include 'Search/table.php';
}