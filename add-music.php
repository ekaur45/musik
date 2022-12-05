<?php
session_start();
$isLoggedIn = false;;
if(isset($_SESSION["logged_in"])){
    $isLoggedIn = $_SESSION["logged_in"];
}
if(!$isLoggedIn){
    header("location: login.php");
}
$id = null;;
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
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
    <?php include_once "db/connection.php"; ?>

</head>

<body>
    <div>
        <?php include_once "menu.php"; ?>
    </div>
    <div class="container">
        <div class="alert alert-success" role="alert" id="music-alert" style="display: none;">
            Music has been added
        </div>
        <script>

        </script>
        <?php if (isset($_SESSION["IS_FILE_UPLOADED"]) && $_SESSION["IS_FILE_UPLOADED"] == true) : ?>

            <script>
                $("#music-alert").show(150);
                setTimeout(() => {
                    $("#music-alert").hide(150);
                }, 3000);
            </script>
            <?php $_SESSION["IS_FILE_UPLOADED"] = false; ?>
        <?php endif; ?>
        <div class="card mb-3">
            <div class="card-header">
                Add music
            </div>

            <div class="card-body">
                <form id="addMusicForm" class="row" method="post"  action="service/add.musik.php">
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="col-md-3">
                        <label for="musicFile1">Music file</label>
                        <input type="file" name="musicFile1" id="musicFile1" class="form-control file" accept=".mp3,audio/*" placeholder="Music file">
                    </div>
                    <div class="col-md-3">
                        <label for="thumnail1">Thumbnail file</label>
                        <input type="file" name="thumnail1" id="thumnail1" accept="image/*" class="form-control file" placeholder="Music file">
                    </div>
                    <input type="hidden" name="musik" id="musik-hid"/>
                    <input type="hidden" name="thumbnail" id="thumbnail-hid"/>
                    <div class="col-md-2">
                        <label for="" class="text-white">.</label>
                        <button type="submit" class="btn w-100 btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Music List
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Name

                            </th>
                            <th>
                                Music
                            </th>
                            <th>
                                Thumbnail
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <?php $query = "select * from user_music where userid = " . $id . ";";
                        $result = $conn->query($query);
                        $no = 0;
                        if ($result->num_rows > 0) : ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td>
                                        <?php echo ++$no;?>
                                    </td>
                                    <td>
                                        <?php echo $row["name"]; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo $row["fileLocation"]; ?>" target="_blank"><?php echo $row["fileLocation"]; ?></a>
                                    </td>
                                    <td>
                                        <img style="width:65px" src="<?php echo $row["picLocation"];?>" alt="">
                                    </td>
                                    <td>                                       
                                        <form action="service/delete.musik.php" method="post">
                                            <input type="hidden" name="_id" value="<?php echo $row["id"];?>"/>
                                            <button class="btn btn-link text-danger">Delete</button>
                                        </form> 
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php include_once "./src/footer.php"; ?>
</body>
<script>
    $(".file").on('change',function(){
        debugger
        console.log($(this));
        let fileInputName = $(this)[0].name;
        var formData = new FormData();
        formData.append("file", $(this)[0].files[0]);
        $.ajax({
            method: "POST",
            url: "service/upload.file.php",
            data: formData,
            contentType:null,
            enctype: 'multipart/form-data',
            success: function(data) {
                if(fileInputName =="musicFile1"){
                    $("#musik-hid").val(data);
                }else{
                    $("#thumbnail-hid").val(data);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        })
    });
    // $("#addMusicForm").on("submit", function(e) {
    //     e.preventDefault();
    //     let musicname = $("#musicFile1")[0].name;
    //     let musicFile = $("#musicFile1")[0].files[0];
    //     let thumbnailName = $("#thumnail1")[0].name;
    //     let thumbnailFile = $("#thumnail1")[0].files[0];
    //     let name = $("#name").val();
    //     var formData = new FormData();
    //     formData.append("files[]", musicFile,"files[]");
    //     formData.append("files[]", thumbnailFile,"files[]");
    //     formData.append("name", name);
    //     $.ajax({
    //         method: "POST",
    //         url: "service/upload.file.php",
    //         data: formData,
    //         contentType:null,
    //         enctype: 'multipart/form-data',
    //         success: function(data) {
    //             alert(data)
    //         },
    //         cache: false,
    //         contentType: false,
    //         processData: false
    //     })
    // })
</script>

</html>