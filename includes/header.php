<?php
    session_start();
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    if (isset($_POST['login-form'])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $query = "SELECT * FROM users WHERE username='$user'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['user_password'] == $pass) {
            if ($row['user_type'] == 'admin') {
                $_SESSION["username"] = $user;
                $_SESSION["user_type"] = $row['user_type'];
                $_SESSION["user_id"] = $row['user_id'];
                header('location: admin/index.php');
                exit;
            }
            else {
                if(isset($_SESSION)){
                    $_SESSION["username"] = $user;
                    $_SESSION["user_type"] = $row['user_type'];
                    $_SESSION["user_id"] = $row['user_id'];
                }
            }
        }
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css"/>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    
</head>

<body>
    <div class="container">
        <!-- Starting of section 1 -->
        <section class="section-1">
            <header>
                <div class="header-left">
                    <a href="index.php">
                        <img src="template-images/Menu.svg">
                    </a>
                    <div class="search-bar">
                        <form method="post" action="search.php">
                            <input name="search_book" type="image" src="template-images/Search Icon.svg" alt="Submit">
                            <input name="book_name" class="book-text-input" type="text" placeholder="What are you looking for?" required>
                        </form>
                    </div>
                </div>
                <div class="header-right">

                    <div class="account-icon" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    <?php if(isset($_SESSION["username"])) {echo "<a href='update-user-details.php'>";}?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
                            <path d="M15.1429 5.88889C15.1429 8.58895 12.8403 10.7778 10 10.7778C7.15968 10.7778 4.85714 8.58895 4.85714 5.88889C4.85714 3.18883 7.15968 1 10 1C12.8403 1 15.1429 3.18883 15.1429 5.88889Z" fill="white" />
                            <path d="M10 14.4444C5.02944 14.4444 1 18.2749 1 23H19C19 18.2749 14.9706 14.4444 10 14.4444Z" fill="white" />
                            <path d="M15.1429 5.88889C15.1429 8.58895 12.8403 10.7778 10 10.7778C7.15968 10.7778 4.85714 8.58895 4.85714 5.88889C4.85714 3.18883 7.15968 1 10 1C12.8403 1 15.1429 3.18883 15.1429 5.88889Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 14.4444C5.02944 14.4444 1 18.2749 1 23H19C19 18.2749 14.9706 14.4444 10 14.4444Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    <?php if(isset($_SESSION["username"])) {echo "</a>";}?>    
                    </div>

                    <div class="liked-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="22" viewBox="0 0 27 22" fill="none">
                            <path d="M2.83058 2.71572C0.389806 5.00335 0.389806 8.71234 2.83058 11L13.5001 21L24.1694 11C26.6102 8.71233 26.6102 5.00335 24.1694 2.71572C21.7286 0.428092 17.7714 0.428092 15.3306 2.71572L13.5001 4.43151L11.6694 2.71572C9.22864 0.428093 5.27136 0.428093 2.83058 2.71572Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <span><?php if(isset($_SESSION["username"])) { echo "<a href='./issued-book.php' class='username' style='text-decoration:none ; color:black;' href='issued-book.php'>Howdy,"." " . $_SESSION["username"]."</a>"; } else{ echo "Howdy, User"; } ?></span>
                </div>
            </header>
        </section>
        <!-- Ending of Section 1-->

                            <style>
                                .username:hover{
                                    color: #831414 !important;
                                    transition: 0.5s;
                                }
                            </style>