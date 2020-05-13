<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e7dd35dda.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfWuOEUAAAAAGoJWPYMmIi3H47-jNT9-5_lqwFC"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container-fluid">
    <div class="alert alert-info mt-1" role="alert">
       Bootstrap 4 works fine!
    </div>
        <?php echo $subview; ?>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>