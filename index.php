<?php include_once "website_body/header.php";

include_once "config/database.php";
$sql = "SELECT * FROM people ORDER BY RAND() LIMIT 2;";
$result = $conn->query($sql);
$results = $result->fetch_all(MYSQLI_ASSOC);

$face1Image = "admin/dashboard/" . $results[0]['image'];
$face2Image = "admin/dashboard/" . $results[1]['image'];
$face1Id = $results[0]['id'];
$face2Id = $results[1]['id'];
$face1Name = $results[0]['name'];
$face2Name = $results[1]['name'];
$face1Rating = $results[0]['rating'];
$face2Rating = $results[1]['rating'];
$face1Description = $results[0]['description'];
$face2Description = $results[1]['description'];

?>

<link rel="stylesheet" href="css/style.css">
<title>FACECRUSH</title>
</head>

<body>

    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <a href="#" class="btn btn-primary text-white h4">TOP FACES</a>
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
            <div class="d-lg-flex justify-content-evenly __cards_container">
                <div class="col-sm-12 col-md-4 col-lg-4 shadow-lg">
                    <div class="card border-0" style="width: 100%;">
                        <img src=" <?php echo $face1Image; ?>" class="card-img-top" height="300px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $face1Name; ?></h5>
                            <p class="card-text"><?php echo $face1Description; ?></p>
                            <!-- <a href="rate.php?id=<?php echo $face1Id; ?>" class="btn btn-primary">Bet 😍</a> -->
                            <form style="display: inline-block;" action="rate.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $face1Id; ?>">
                                <input type="hidden" name="rating1" value="<?php echo $face1Rating ?>">
                                <input type="hidden" name="rating2" value="<?php echo $face2Rating ?>">
                                <input type="hidden" name="win" value="<?php echo true; ?>">
                                <button type="submit" class="btn btn-md btn-danger">Bet 😍</button>
                            </form>
                        </div>
                    </div>
                </div>
                <span class="__fire"><img src="https://www.042nobs.com/wp-content/uploads/2019/07/source.gif" alt=""></span>
                <h1 class="__vs text-danger">VS</h1>
                <div class="col-sm-12 col-md-4 col-lg-4 shadow-lg">
                    <div class="card border-0" style="width: 100%;">
                        <img src=" <?php echo $face2Image; ?>" class="card-img-top" height="300px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $face2Name; ?></h5>
                            <p class="card-text"><?php echo $face2Description; ?></p>
                            <!-- <a href="rate.php?id=<?php echo $face2Id; ?>" class="btn btn-primary text-center">Bet 😍</a> -->
                            <form style="display: inline-block;" action="rate.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $face2Id; ?>">
                                <input type="hidden" name="rating1" value="<?php echo $face1Rating ?>">
                                <input type="hidden" name="rating2" value="<?php echo $face2Rating ?>">
                                <input type="hidden" name="win" value="<?php echo false; ?>">
                                <button type="submit" class="btn btn-md btn-danger">Bet 😍</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once "website_body/footer.php"; ?>