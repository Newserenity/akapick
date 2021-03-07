<?php

    require_once '../global/global.php';

    $user = $_SESSION['user'];
    $idx = $user['idx'];

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $token = filter_input(INPUT_POST, 'token');

    if (!array_key_exists('user', $_SESSION)) {
        echo "<script>location.href='./login.php'</script>";
    } else {
        if($email == "" || $password == ""){
            echo '<script> alert("Email or password is empty"); history.back(); </script>'; 
        }
    }

    if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        $username = current(explode('@', $email));

        $stmt = "UPDATE members SET 
            email = '".$email."',
            auth = '".$password."',
            username = '".$username."' WHERE
            idx = '".$idx."'"; 

        $result = mysqli_query($connect, $stmt);

        if ($result) {
            echo '<script> alert("User info is changed");</script>';

            session_unset();
            session_destroy();
            echo "<script>location.href='../auth/login.php'</script>";
        } else {
            echo '<script> alert("fail");</script>';
        }
    } else {
        session_unset();
        session_destroy();

        echo '<script> alert("Session or Token Expired");</script>';
    }

    mysqli_stmt_close($stmt);