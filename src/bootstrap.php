<?php

session_start();
if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(64));
}

require_once __DIR__ . '/libs/helpers.php';
require_once __DIR__ . '/inc/flash.php';
require_once __DIR__ . '/inc/auth.php';
