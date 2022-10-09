<?php

session_start();  // 啟用 session



unset($_SESSION['member']);




header('Location: 00-basepage-no-admin.php');
