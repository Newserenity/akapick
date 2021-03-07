<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKAPICK</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans+KR:400,500&display=swap&subset=korean">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/css/uikit.min.css">
    <link rel="stylesheet" href="../style.css">

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.11/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.11/dist/js/uikit-icons.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="../index.js"></script>

</head>
<body>
    <div id="app">
        <nav id="nav" role="navigation" class="uk-navbar-container uk-navbar-transparent uk-padding uk-padding-remove-vertical uk-margin-bottom" uk-navbar>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="/">Home</a></li>
                    <?php if (array_key_exists('user', $_SESSION)): ?>
                        <li><a href="/user/update.php">My Page</a></li>
                        <li><a href="/post/write.php">Write</a></li>
                        <li><a href="/auth/logout.php">Logout</a></li>
                    <?php else : ?>
                        <li><a href="/user/register.php">Register</a></li>
                        <li><a href="/auth/login.php">Login</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>
        <main id="main" role="main">
    
</body>
</html>