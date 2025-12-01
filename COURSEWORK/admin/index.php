<?php
$title = 'Student For Room';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';