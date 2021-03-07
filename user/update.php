<?php

    require_once '../global/global.php';

    if (!array_key_exists('user', $_SESSION)) {
        echo "<script>location.href='./login.php'</script>";
    }

    $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
    output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']);

    $user = $_SESSION['user'];
?>

<?php
    require_once '../layout/top.php';
?>

<div id="main__form-auth" class="uk-padding uk-position-fixed uk-position-center">
    <div>UPDATE</div>
    <form action="./update_process.php" method="POST">
        <input value="<?=$user["email"]?>" type="text" name="email" placeholder="Email" class="uk-input">
        <input type="password" name="password" placeholder="Password" class="uk-input">

        <input type="submit" value="submit" class="uk-button uk-button-default uk-width-1-1">

    </form>

</div>

<?php
    require_once '../layout/bottom.php';
?>