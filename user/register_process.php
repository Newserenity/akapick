<?php
    require_once '../global/global.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $token = filter_input(INPUT_POST, 'token');

    if($email == "" || $password == ""){
        echo '<script> alert("Email or password is empty"); history.back(); </script>';
        echo "<script>location.href='./register.php'</script>";
	}

    if ($email && $password && hash_equals($token, $_SESSION['CSRF_TOKEN'])) {
        $username = current(explode('@', $email));
        // $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM members";
        $data = mysqli_query($connect, $query);
        $idx = mysqli_num_rows($data);
        
        $stmt = "INSERT INTO 
            members(idx, email, auth, username) VALUES(
                '".$idx."',
                '".$email."',
                '".$password."',
                '".$username."')";

        $result = mysqli_query($connect, $stmt);

        // mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $username);
        if ($result) {
            
            session_unset();
            session_destroy();

            return header('Location: ../auth/login.php');
        } else {

            echo '<script> alert("Email or password is empty"); history.back(); </script>';
            return header('Location: ../user/register.php');
        }
    } else {

        echo '<script> alert("Email or password is empty"); history.back(); </script>';
        return header('Location: ../user/register.php');
    }
?>