<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if ($_SESSION['user_type'] !== 'admin' || $_SESSION['user_type'] == null || !$_SESSION['user_type']) {
    header("Location: ../");
    exit;
}

if (isset($_POST['logout'])) {
    $_SESSION['username'] = null;
    $_SESSION['user_type'] = null;
    header("Location: ../");
    exit;
}
?>
<?php include '../includes/db.php';

    if (isset($_POST['create-book'])) {

        $bookName = $_POST['book-name'];
        $bookDescription = $_POST['book-description'];
        $perDayPrice = $_POST['book-per-day-price'];
        $bookImage = $_FILES['book-image']['name'];
        $bookImageTemp = $_FILES['book-image']['tmp_name'];
        $bookCategory = $_POST['book-category'];
        move_uploaded_file($bookImageTemp, "book-images/$bookImage");
        $bookDescription = mysqli_escape_string($connection, $bookDescription);
        $query = "INSERT INTO books (book_name, book_description, book_per_day_price, book_image, book_category)";
        $query .= " VALUES ('$bookName', '$bookDescription', $perDayPrice, '$bookImage', '$bookCategory')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query FAILED" . mysqli_error($connection));
        } else {
            echo "<p class='bg-success'>Book Added</p>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7cfac6840d.js" crossorigin="anonymous"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <script src="js/jquery.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong><?php echo $_SESSION['username'] ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong><?php echo $_SESSION['username'] ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <form method="post">
                                <button name="logout" type="submit">
                                    <a class="admin-logout-btn"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul><a href="../"></a>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a class="add-user-btn"><i class='fa fa-user-circle-o' style="margin-right: 5px;"></i>Add user</a>
                    </li>

                    <li>
                        <a class="add-book-btn"><i class='fa-solid fa-note-sticky' style="margin-right: 5px;"></i>Add book</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div style="background-color: #333;" class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                            if ($_SESSION['username']) {
                                echo "<h1 style='color: white;'>Welcome {$_SESSION['username']}</h1>";
                            }
                            if (isset($_POST['add-user'])) {

                                $email = $_POST["email"];
                                $username = $_POST["username"];
                                $password = $_POST["password"];
                                $user_type = $_POST["user-type"];

                                $email = mysqli_real_escape_string($connection, $email);
                                $username = mysqli_real_escape_string($connection, $username);
                                $user_type = mysqli_real_escape_string($connection, $user_type);

                                $query = "INSERT INTO users (user_email, username, user_password, user_type) 
                                VALUES ('$email', '$username', '$password', '$user_type')";
                                $result = mysqli_query($connection, $query);
                                if ($result == true) {
                                    echo "<div class='alert alert-success alert-dismissible'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                            <strong>Successfully</strong> User created.
                                        </div>";
                                }
                            }

                            ?>

                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="add-user-admin">
                    <label>Create User</label>
                    <form method="post">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" required>
                        </div>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <select name="user-type" required>
                                <option selected disabled>Select user type</option>
                                <option value="customer">Customer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button name="add-user" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


                <div class="add-book">
                    <label>Add book</label>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="book-name" placeholder="Book Name" required>
                        </div>
                        <div class="form-group">
                            <label>Book description</label>
                            <textarea name="book-description" cols="59" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Per day price</label>
                            <input type="number" min="10" max="30" class="form-control" name="book-per-day-price" placeholder="Per Day Price" required>
                        </div>
                        <div class="form-group">
                            <label>Book Image</label>
                            <input type="file" class="form-control" name="book-image" required>
                        </div>
                        <div class="form-group">
                            <label>Book Category</label>
                            <select name="book-category" class="form-control" required>
                                <option value="" disabled selected>Select Book Category</option>
                                <option value="crime">Crime</option>
                            </select>
                        </div>
                        <button name="create-book" type="submit" class="btn btn-primary">Add book</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>

    </script>
</body>
</html>