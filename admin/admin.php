<?php include_once "../website_body/header.php" ?>
<link rel="stylesheet" href="admin.css">
<title>Admin</title>
</head>

<body>

    <div class="container __main-container p-3">
        <h3 class="text-white text-center">ADMIN</h3>
        <div class="__form-container text-white">
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary" name="loginBtn">Log in</button>
            </form>
        </div>
    </div>

</body>

<?php include_once "../website_body/footer.php" ?>