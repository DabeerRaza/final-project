<?php

session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['mechanic_id']) || $_GET['mechanic_Id'] == '') {
    header("Location: user.php");
} else {

    //  GENERAL CONNECTION
    $conn = mysqli_connect('localhost', 'root', '', 'registration');

    // USER DETAILS

    $username = $_SESSION['user'];

    // MECHAINC ID

    $mechanic_Id = $_GET['mechanic_Id'];

    $mechanicQuery = "SELECT * FROM mechanics WHERE mechanic_id = $mechanic_Id";
    $mechanicResult = mysqli_query($conn, $mechanicQuery);
    $mechanicRow = mysqli_fetch_array($mechanicResult);

    $mechanicName = $mechanicRow['mechanic_name'];

    $mechanicCity = $mechanicRow['city_id'];

    $cityQuery = mysqli_query($conn, "SELECT * FROM city WHERE city_id = $mechanicCity ");
    $cityResult = mysqli_fetch_array($cityQuery);

    // TO SUBMIT THE COMMENTS

    if (isset($_POST['comment_submit'])) {
        if (!empty($_POST['comments'])) {
            $comments = $_POST['comments'];
            $mechanic_name = $mechanicRow['mechanic_name'];
            $commentsQuery = "INSERT INTO comments (username, comments, mechanic_name) VALUES ('$username', '$comments', '$mechanic_name')";
            $comments_result = mysqli_query($conn, $commentsQuery);
        }
    }

    // REQUEST TO MECHANIC

    if (isset($_POST['request_submit'])) {

        $request_check = mysqli_query($conn, "SELECT * FROM user_request_to_mechanic WHERE username = '" . $username . "' AND mechanic_name = '" . $mechanicName . "' ");
        $request_result = mysqli_fetch_array($request_check);
        $userName = $request_result['username'];
        $mechanic_Name = $request_result['mechanic_name'];
        $userRequestStatus = $request_result['user_request_status'];


        if (($userName == $username) && ($mechanic_Name == $mechanicName)) {
            if ($userRequestStatus == 'pending') {
                echo "<script>alert('Your request is pending ');</script>";
            } else if ($userRequestStatus == 'rejected') {
                echo "<script>alert('Your request is rejected ');</script>";
            } else if ($userRequestStatus == 'approved') {
                echo "<script>alert('Your request is approved ');</script>";
            }
        } else {
            // $mechanic_name = $mechanicRow['mechanic_name'];
            $status = "INSERT INTO user_request_to_mechanic (username, mechanic_name, user_request_status) VALUES ('$username','$mechanicName','pending')";
            $statusResult = mysqli_query($conn, $status);
            echo "<script>alert('Your request is sent to mechanic ');</script>";
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Online Auto Mechanic Finder</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="../../style/styles.css">

        <!-- Twitter Bootstrap CSS -->
        <link rel="stylesheet" href="../../style/bootstrap.min.css">
    </head>

    <body>
        <header>
            <?php include("../headers/header_for_user.php"); ?>
        </header>
        <main class="main_body">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 mechanics__profile">
                        <div class="col-md-3 image_on_left">
                            <div>
                                <?php
                                if ($mechanicRow['mechanic_image'] == '') { ?>
                                    <img class="col-md-12" src="../../images/mechanic.png" alt="mechanic profile picture">
                                <?php } else { ?>
                                    <img class="col-md-12" src="../mechanics/upload/<?php echo $mechanicRow['mechanic_image']; ?>" alt="mechanic profile picture">
                                <?php } ?>
                            </div>
                            <div class="col-xs-12 rqstBtn_holder">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <button class="col-xs-12 rqstBtn" type="submit" name="request_submit">Request to
                                        mechanic</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-9 detail_on_right">
                            <ul>
                                <li>Name:</li>
                                <li><?php echo $mechanicRow['mechanic_name']; ?></li>
                            </ul>
                            <ul>
                                <li>Address:</li>
                                <li><?php echo $mechanicRow['mechanic_shop_address']; ?></li>
                            </ul>
                            <ul>
                                <li>email:</li>
                                <li><?php echo $mechanicRow['email']; ?></li>
                            </ul>
                            <ul>
                                <li>City:</li>
                                <li><?php echo $cityResult['city_name'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comments__of_users">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 user_feedBack_comments">
                            <h2 class="text-center">YOUR FEEDBACK USING COMMENTS</h2>
                            <div>
                                <?php
                                $qry = mysqli_query($conn, "SELECT * FROM comments WHERE mechanic_name = '" . $mechanicName . "' LIMIT 2");
                                while ($row = mysqli_fetch_array($qry)) {
                                    if ($row['username'] == '') { ?>
                                        <span style="font-size: 24px;"><?php echo $row['mechanic_name']; ?></span>
                                        <span style="color: yellow;">(mechanic)</span>
                                        <h4><?php echo $row['comments']; ?></h4>
                                    <?php } else { ?>
                                        <span style="font-size: 24px;"><?php echo $row['username']; ?></span>
                                        <span>(user)</span>
                                        <h4><?php echo $row['comments']; ?></h4>
                                    <?php } ?>
                                    <hr>
                                <?php }
                            ?>
                            </div>
                            <div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <span class="cmnter_name"><?php echo $username; ?></span>
                                    <input type="text" name="comments" id="comments_textarea" placeholder="Write Your Comments Here" />
                                    <button class="cmntSbmt" type="submit" name="comment_submit">comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <section class="our_services">
            <div class="container">
                <div class="row">
                    <div class="blue col-xs-12">
                        <h1>We Service Most Makes and Models</h1>
                    </div>
                </div>
                <div class="row mrgb45px">
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/1.png" alt="our_service_logo_1">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/2.png" alt="our_service_logo_2">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/3.png" alt="our_service_logo_3">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/4.png" alt="our_service_logo_4">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/5.png" alt="our_service_logo_5">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/6.png" alt="our_service_logo_6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/7.png" alt="our_service_logo_7">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/8.png" alt="our_service_logo_8">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/9.png" alt="our_service_logo_9">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/10.png" alt="our_service_logo_10">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/11.png" alt="our_service_logo_11">
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <img src="../../images/our_services/12.png" alt="our_service_logo_12">
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <?php include("../footer.php"); ?>
        </footer>


        <!-- Twitter Bootstrap JS -->
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery.min.js"></script>
    </body>

    </html>

<?php
}
?>