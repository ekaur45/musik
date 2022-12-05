<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include_once "./src/head.php"; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form class="card" action="service/create.service.php" method="POST">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                    <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="text" name="firstName" class="form-control" placeholder="First name" autocomplete="FALSE" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="text" name="lastName" class="form-control" placeholder="Last name" autocomplete="FALSE" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="FALSE" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="FALSE" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex flex-column">
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                        <a href="login.php" type="submit" class="btn btn-link">Login to account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once "./src/footer.php"; ?>
</body>
</html>