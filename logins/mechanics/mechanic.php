<?php

session_start();
if (!isset($_SESSION['mechanic_id'])) {
    header("Location: ../../index.php");
} else {

    require '../connection.php';

    $GLOBALS['mechanic_Id'] = $_SESSION['mechanic_id'];

    $query = "SELECT * FROM mechanics WHERE mechanic_id = $mechanic_Id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $mechanicName = $row['mechanic_name'];
    $mechanicCity = $row['city_id'];

    $cityQuery = mysqli_query($conn, "SELECT * FROM city WHERE city_id = $mechanicCity ");
    $cityResult = mysqli_fetch_array($cityQuery);

    /************************** TO INSERT THE IMAGE ******************************/

    if (isset($_POST['submit'])) {

        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $loc = $_FILES['file']['tmp_name'];

        if ($size > $_POST['MAX_FILE_SIZE']) {
            echo "File size is bigger then allowed";
        }

        // $extension = substr(basename($name),strrpos(basename($name),".")+1);

        // $allowedExtension = array("jpg", "jpeg", "png");

        // if(!in_array($extension,$allowedExtension)){
        //     echo "<script>alert('Extension not allowed');</script>";
        // }

        // $allowedTypes = array("image/jpg", "image/jpeg","image/png");
        // if(!in_array($type,$allowedTypes)){
        //     echo "<script>alert('File type not allowed');</script>";
        // }

        $imageName = time() . $name;

        $filedir = "./upload/";
        $filepath = $filedir . $imageName;

        if (move_uploaded_file($loc, $filepath)) {
            $mysqli = new mysqli("localhost", "root", "", "registration");
            $query = "UPDATE mechanics SET mechanic_image='$imageName' WHERE mechanic_id = '$mechanic_Id' ";
            if ($mysqli->query($query)) {
                echo "<script>alert('Registered!')</script>";
                header('location: mechanic.php');
            } else {
                echo "Failed" . $mysqli->error;
            }

        } else {
            echo "<script>alert('Some error in uploading file');</script>";
        }
    }

    // TO SUBMIT THE COMMENT

    if (isset($_POST['comment_submit'])) {
        if (!empty($_POST['comments'])) {
            $comments = $_POST['comments'];
            $commentsQuery = "INSERT INTO comments (comments, mechanic_name) VALUES ('$comments', '$mechanicName')";
            $comments_result = mysqli_query($conn, $commentsQuery);

        } else {
            echo "<script>alert('Please Fill in the comment Box to submit your comment.')</script>";
        }
    }

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Auto Mechanic Finder</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/styles.css">

    <!-- Twitter Bootstrap CSS -->
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
</head>

<body>
    <header>
        <?php include "../headers/header_for_mechanic.php";?>
    </header>
    <main class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 mechanics__profile">
                    <div class="col-md-4 image_on_left">
                        <div>
                            <?php if ($row['mechanic_image'] == '') {?>
                            <img class="col-md-9" src="../../images/mechanic.png" alt="">
                            <?php } else {?>


                            <img class="col-md-9" src="upload/<?php echo $row['mechanic_image']; ?>"
                                class="col-md-12" />
                            <?php }?>
                        </div>
                        <div class="col-xs-9">
                            <form enctype="multipart/form-data" action="" method="post"
                                onsubmit="if(flag==1) return false">

                                <input type="hidden" name="MAX_FILE_SIZE" id="maxSize" value="1002400" />
                                <input class="choose" name="file" id="files" type="file" accept=".jpg,.jpeg,.png" />
                                <output id="list"></output>

                                <div class="submit"><input class="col-xs-12" name="submit" type="submit"
                                        value="Update Profile Picture" /></div>
                            </form>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-8 detail_on_right">
                        <ul>
                            <li>Name:</li>
                            <li><?php echo $row['mechanic_name']; ?></li>
                        </ul>
                        <ul>
                            <li>Address:</li>
                            <li><?php echo $row['mechanic_shop_address']; ?></li>
                        </ul>
                        <ul>
                            <li>Email:</li>
                            <li><?php echo $row['email'] ?></li>
                        </ul>
                        <ul>
                            <li>City:</li>
                            <li><?php echo $cityResult['city_name'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="comments__of_users">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 user_feedBack_comments">
                    <h1>Users' Feed Back</h1>
                    <div>
                        <?php
$qry = mysqli_query($conn, "SELECT * FROM comments WHERE mechanic_name = '" . $mechanicName . "'");
    while ($row = mysqli_fetch_array($qry)) {
        if ($row['username'] == '') {?>
                        <span style="font-size: 24px;"><?php echo $row['mechanic_name']; ?></span>
                        <span style="color: yellow;">(You)</span>
                        <h4><?php echo $row['comments']; ?></h4>
                        <?php } else {?>
                        <span style="font-size: 24px;"><?php echo $row['username']; ?></span>
                        <span style="color: yellow;">(user)</span>
                        <h4><?php echo $row['comments']; ?></h4>
                        <a href="delete_user_comments.php?id=<?php echo $row['id']; ?>">delete</a>
                        <?php }?>
                        <hr>
                        <?php }
    ?>
                    </div>
                    <div>
                        <form action="" method="POST" type="text/enctype">
                            <span class="cmnter_name"><?php echo $mechanicName; ?></span>
                            <input type="text" name="comments" id="comments_textarea">
                            <button id="comment_submit" class="comment_submit" name="comment_submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <?php include "../footer.php";?>
    </footer>


    <!-- Twitter Bootstrap JS -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <script>
    allowedExtension = new Array("jpg", "jpeg", "png");

    function validateFile(extension, size) {
        flag = 0;
        error = "";
        for (i = 0; i < allowedExtension.length; i++) {
            if (extension == allowedExtension[i]) {
                maxSize = document.getElementById("maxSize").value
                if (size <= maxSize)
                    flag = 0;
                else {
                    flag = 1;
                    error = "File Size is Bigger";
                }

                break;
            } else {
                flag = 1;
                error = "File is not Supported";
            }
        }


        if (flag != 0) {
            return 'red';
        } else {
            return 'green';
        }
    }
    // Check for the various File API support.
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // files is a FileList of File objects. List some properties.
        f = files[0];
        ext = f.name.substring(f.name.lastIndexOf('.') + 1);
        size = f.size;
        classColor = validateFile(ext, size);
        st = '<li class=' + classColor + '><strong>' + f.name + '</strong> (' + f.type + ') - ' +
            f.size + ' bytes, last modified: ' +
            (f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a') +
            '</li>';
        if (error.length > 0) {
            st += "<li class=" + classColor + ">" + error + "</li>";
            //f.lastModifiedDate.toLocaleDateString()*/
            document.getElementById('list').innerHTML = '<ul>' + st + '</ul>';
        }
        document.getElementById('files').addEventListener('change', handleFileSelect, false);
    </script>



</body>

</html>

<?php
}
?>