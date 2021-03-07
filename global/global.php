<?php
    ini_set('display_errors', 'Off');
    date_default_timezone_set('Asia/Tokyo');

    $connect = mysqli_connect(
        'localhost',
        'yasmuchin',
        'samilfuck12!',
        'yasmuchin'
    ) or die;


    ini_set('session.gc.maxlifetime', 1440);
    session_set_cookie_params(1440);

    session_start();
?>