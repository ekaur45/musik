<?php
session_start();
$isLoggedIn = false;;
if(isset($_SESSION["logged_in"])){
    $isLoggedIn = $_SESSION["logged_in"];
}

$q = "";
if (sizeof($_GET) && isset($_GET['q']) && !empty($_GET["q"])) {
    $q = $_GET["q"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "./src/head.php"; ?>
</head>

<body>
    <div>
        <?php include_once "menu.php"; ?>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Search / filter</div>

                    <form class="card-body">
                        <div class="d-flex">

                            <input type="text" class="form-control" name="q" placeholder="Search" value="<?php echo $q; ?>" />
                            <button class="btn btn-primary ms-3" type="submit">Search</button>
                            <?php if ($q) : ?>
                                <button class="btn btn-danger ms-3" type="reset" onclick="location.href='index.php'">Clear</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">


            <?php
            include_once "db/connection.php";
            //var_export( sizeof($_GET));

            $query = "select * from user_music um join users u on um.userid = u.id  where um.name like '%" . $q . "%' order by um.id desc;";
            //echo $query;
            $result = $conn->query($query);
            if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-">

                                <a data-music_name="<?php echo $row["fileLocation"]; ?>" class="music" target="_blank" style="cursor:pointer;">

                                    <img class="w-100" src="<?php echo $row["picLocation"]; ?>" alt="">
                                    <div class="d-flex flex-column bottom-0 w-100 ps-2 pe-2">

                                        <span>
                                            <?php echo $row["name"]; ?>
                                        </span>
                                        <span>
                                            Auhtor: <?php echo $row["fIrstName"]; ?> <?php echo $row["lastName"]; ?>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php
            else :
            ?>
                <div class="col-md-12">

                    <div class="alert alert-primary" role="alert">
                        No Music Found. <?php if ($q) echo "Searched query '<b>" . $q . "</b>'"; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="bottom-0 music-player position-absolute w-100">
    <audio preload="auto" controls id="music-player">
					<source src="https://www.w3schools.com/html/horse.mp3">
		</audio>
    </div>
    <?php include_once "./src/footer.php"; ?>
    <script>
        $(document).ready(function() {
            $('audio').audioPlayer();
            $('.music').on('click', function() {
                let name = $(this).data("music_name");
                $("#music-player").attr("src",name);
                $(".audioplayer-playpause").click()
            })
        })

     
    </script>
</body>

</html>