<?php include_once "website_body/header.php";

include_once "config/database.php";
$sql = "SELECT * FROM people ORDER BY RAND() LIMIT 2;";
$result = $conn->query($sql);
$results = $result->fetch_all(MYSQLI_ASSOC);

$sql1 = "SELECT * FROM people ORDER BY rating DESC LIMIT 10";
$result1 = $conn->query($sql1);
$results1 = $result1->fetch_all(MYSQLI_ASSOC);

$face1Image = "admin/dashboard/" . $results[0]['image'];
$face2Image = "admin/dashboard/" . $results[1]['image'];
$face1Id = $results[0]['id'];
$face2Id = $results[1]['id'];
$face1Name = $results[0]['name'];
$face2Name = $results[1]['name'];
$face1Rating = $results[0]['rating'];
$face2Rating = $results[1]['rating'];
$face1Description = $results[0]['course_yr'];
$face2Description = $results[1]['course_yr'];

?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<title>FACECRUSH - Boy Version</title>
</head>

<body>

    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <button class="btn btn-primary text-white h4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">TOP FACES</button>
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
            <!-- <a class="btn btn btn-success align-self-center home-btn" href="index.php" style="margin-left: 280%;"><i class="bi bi-arrow-left-circle-fill"></i></a> -->
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
                                <input type="hidden" name="id1" value="<?php echo $face1Id; ?>">
                                <input type="hidden" name="id2" value="<?php echo $face2Id; ?>">
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
                                <input type="hidden" name="id1" value="<?php echo $face1Id; ?>">
                                <input type="hidden" name="id2" value="<?php echo $face2Id; ?>">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="exampleModalLabel">TOP FACES (MALE VERSION)</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($results1 as $key => $data) : ?>
                        <h5 class="border border-1 border-light p-2 bg-light shadow-sm mb-3">
                            <?php echo $data["name"]; ?>
                        </h5>
                    <?php endforeach; ?>
                    <!-- <h5 class="border border-1 border-light p-2 bg-light shadow-sm mb-3">Asdasd</h5>
                    <h5 class="border border-1 border-light p-2 bg-light shadow-sm">Asdasd</h5> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once "website_body/footer.php"; ?>