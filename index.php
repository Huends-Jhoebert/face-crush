<?php include_once "website_body/header.php";

include_once "config/database.php";
$sql = "SELECT * FROM people ORDER BY RAND() LIMIT 2;";
$result = $conn->query($sql);
$results = $result->fetch_all(MYSQLI_ASSOC);

$face1Image = "admin/dashboard/" . $results[0]['image'];
$face2Image = "admin/dashboard/" . $results[1]['image'];
$face1Name = $results[0]['name'];
$face2Name = $results[1]['name'];
$face1Description = $results[0]['description'];
$face2Description = $results[1]['description'];

?>
<title>FACECRUSH</title>
<style>
    .__head {
        background-color: #1B2A47;
        margin-top: 5%;
    }



    .__img_container span {
        display: inline-block;
        margin-top: 10%;
        font-size: 100rem;
    }

    .__vs {
        font-size: 10rem;
        margin-top: 14%;
    }

    .__fire img {
        display: inline-block;
        width: 170px;
        width: 170px;
        position: absolute;
        left: 44%;
    }
</style>
</head>

<body>

    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="d-flex">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div style="margin-left: 10%;">
                <h1 class="text-white">FACECRUSH</h1>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row bg-light justify-content-center p-3 shadow-lg __img-container">
            <div class="d-flex justify-content-evenly">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card" style="width: 100%;">
                        <img src=" <?php echo $face1Image; ?>" class="card-img-top" height="300px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $face1Name; ?></h5>
                            <p class="card-text"><?php echo $face1Description; ?></p>
                            <a href="#" class="btn btn-primary" style="margin: 0 auto;">Bet 😍</a>
                        </div>
                    </div>
                </div>
                <span class="__fire"><img src="https://www.042nobs.com/wp-content/uploads/2019/07/source.gif" alt=""></span>
                <h1 class="__vs text-danger">VS</h1>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card" style="width: 100%;">
                        <img src=" <?php echo $face2Image; ?>" class="card-img-top" height="300px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $face2Name; ?></h5>
                            <p class="card-text"><?php echo $face2Description; ?></p>
                            <a href="#" class="btn btn-primary text-center">Bet 😍</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once "website_body/footer.php"; ?>