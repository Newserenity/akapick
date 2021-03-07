<?php 

    require_once '../global/global.php';

    session_unset();
    session_destroy();

    echo "<script>location.href='../index.php'</script>";
?>