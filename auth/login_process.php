<?php
    require_once '../global/global.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $token = filter_input(INPUT_POST, 'token');

    // $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if($email == "" || $password == ""){
		echo '<script> alert("Email or password is empty"); history.back(); </script>';
	}

    if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        $stmt = "SELECT * FROM 
            members WHERE 
            (email = '".$email."')";

        $result = mysqli_query($connect, $stmt);

        if ($result) {
            $user = mysqli_fetch_array($result);
        } else {
            echo '<script> alert("Email or Password not match");</script>';
            echo "<script>location.href='./login.php'</script>";
        }
    } else {
        echo '<script> alert("Session or Token Expired");</script>';
        echo "<script>location.href='./login.php'</script>";
    }
    if ($user) {
        if ($password == $user['auth']) {
            $_SESSION['user'] = $user;
            echo "<script>location.href='../index.php'</script>";
        } else {
            echo '1'.$password_hash; // 값을 넣을때마다 바뀜
            echo '2'.$user['auth'];
        }
    }

    echo '<script> alert("Email or Password not match");</script>';
    echo "<script>location.href='./login.php'</script>";
?>