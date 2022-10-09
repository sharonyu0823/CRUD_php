<?php
session_start();

unset($_SESSION['user']);

header('Location: basepage-no-admin.php');
