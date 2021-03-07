<?php
    require_once '../global/global.php';

    if (!array_key_exists('user', $_SESSION)) {
        echo "<script>location.href='./login.php'</script>";
    }

    $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
    output_add_rewrite_var('token', $_SESSION['CSRF_TOKEN']); 
?>

<?php
    require_once '../layout/top.php';
?>

<div id="main__form-post">
    <form action="./write_process.php" method="POST">
        <input type="text" name="title" placeholder="Title" class="uk-input uk-article-title">
        <hr>
        <div class="editor uk-align-center">
            <textarea name="content"></textarea>
            <div id="editor">
                <p>This is some sample content.</p>
            </div>
        </div>
        <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
    </form>
</div>

<?php
    require_once '../layout/bottom.php';
?>