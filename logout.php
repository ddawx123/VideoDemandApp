<?php
if (!isset($_COOKIE['login_signature']) || !isset($_COOKIE['login_nickname']) || !isset($_COOKIE['logintime_encrypt'])) {
    header('Location: ./login.php?callback='.urlencode($_SERVER['REQUEST_URI']));
    exit();
}
else if (!file_exists(dirname(__FILE__).'/tmp/'.$_COOKIE['login_signature'].'.dat')) {
    setcookie('login_signature', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    setcookie('login_nickname', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    setcookie('logintime_encrypt', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    unset($_COOKIE['login_signature']);
    unset($_COOKIE['login_nickname']);
    unset($_COOKIE['logintime_encrypt']);
    header('Location: ./login.php?callback='.urlencode($_SERVER['REQUEST_URI']));
    exit();
}
else {
    setcookie('login_signature', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    setcookie('login_nickname', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    setcookie('logintime_encrypt', '', time() - 3600, '/', $_SERVER['HTTP_HOST']);
    unset($_COOKIE['login_signature']);
    unset($_COOKIE['login_nickname']);
    unset($_COOKIE['logintime_encrypt']);
    header('Location: ./index.php');
    exit();
}