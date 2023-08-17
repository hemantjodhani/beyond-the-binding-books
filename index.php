<?php include 'includes/db.php' ?>
<?php include 'includes/functions.php' ?>
    <?php
        if(isset($_POST['login-form'])){
            $user = $_POST["username"];
            $pass = $_POST ["password"];
            $query = "SELECT * FROM users WHERE username='$user'";
            $result = mysqli_query($connection , $query);
            $row = mysqli_fetch_assoc($result);

            if($row['user-password'] == $pass){
                session_start();
                if(isset($_SESSION)){
                    $_SESSION["username"] = $user;
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


</head>

<body>
    <div class="container">
        <!-- Starting of section 1 -->
        <section class="section-1">
            <header>
                <div class="header-left">
                    <img src="template-images/Menu.svg">
                    <div class="search-bar">
                        <form>
                            <input type="image" src="template-images/Search Icon.svg" alt="Submit">
                            <input class="book-text-input" type="text" placeholder="What are you looking for?" required>
                        </form>
                    </div>
                </div>
                <div class="header-right">
                    <div class="account-icon" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
                            <path d="M15.1429 5.88889C15.1429 8.58895 12.8403 10.7778 10 10.7778C7.15968 10.7778 4.85714 8.58895 4.85714 5.88889C4.85714 3.18883 7.15968 1 10 1C12.8403 1 15.1429 3.18883 15.1429 5.88889Z" fill="white" />
                            <path d="M10 14.4444C5.02944 14.4444 1 18.2749 1 23H19C19 18.2749 14.9706 14.4444 10 14.4444Z" fill="white" />
                            <path d="M15.1429 5.88889C15.1429 8.58895 12.8403 10.7778 10 10.7778C7.15968 10.7778 4.85714 8.58895 4.85714 5.88889C4.85714 3.18883 7.15968 1 10 1C12.8403 1 15.1429 3.18883 15.1429 5.88889Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 14.4444C5.02944 14.4444 1 18.2749 1 23H19C19 18.2749 14.9706 14.4444 10 14.4444Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="liked-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="22" viewBox="0 0 27 22" fill="none">
                            <path d="M2.83058 2.71572C0.389806 5.00335 0.389806 8.71234 2.83058 11L13.5001 21L24.1694 11C26.6102 8.71233 26.6102 5.00335 24.1694 2.71572C21.7286 0.428092 17.7714 0.428092 15.3306 2.71572L13.5001 4.43151L11.6694 2.71572C9.22864 0.428093 5.27136 0.428093 2.83058 2.71572Z" stroke="#0D0842" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <span>Howdy, <?php session_start(); echo $_SESSION["username"] ?></span>
                </div>
            </header>
        </section>
        <!-- Ending of Section 1-->

        <!-- Startig of Section2 -->
        <section class="section-2">
            <div class="hero">
                <div class="hero-content-left">
                    <h1 class="hero-heading">New Releases This Week</h1>
                    <p class="hero-content-para">It's time to update your reading list with some of the latest and
                        greatest releases in the literary world. From heart-pumping thrillers to captivating memoirs,
                        this week's new releases offer something for everyone</p>
                    <a href="#" class="subscribe-btn">Subscribe</a>
                </div>

                <div class="hero-content-right">
                    <img src="template-images/Animation.jpg">
                </div>

            </div>
        </section>
        <!-- Ending of Section 2-->

        <!---Startig Of Section 3--->
        <section class="section-3">
            <div class="genre-seclector--seller-heading">
                <span>Top Sellers</span><br>
                <select name="genere-selecter" class="genre-for-style">
                    <option value="">All Genres</option>
                    <option value="">Action & Adventure</option>
                    <option value="">Anime</option>
                    <option value="">Biography, Autobiographies and Memoirs</option>
                    <option value="">Business</option>
                </select>
            </div>
        </section>
        <!-- Ending of Section 3 -->

        <!-- Starting of section 4 -->

        <section class="all-books-here">
            <?php
                $query = "SELECT * FROM books";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {

                    $book_discription = substr($row['book-discription'], 0, 120) . '...';
                    echo "
                        <div class='book-parent'>
                            <div class='book-image'>
                                <img src='admin/books/{$row['book_image']}'> 
                            </div>
                            <div class='book-name--issue-price--discription--issue-btn'>
                                <span class='book-name'>{$row['book-name']}</span>
                                <p class='book-discription'>$book_discription</p>
                                <span class='issue-price'>$ {$row['book-per-day-price']}</span>
                                <a class='issue-btn' href='#'>Issue now</a>
                            </div>
                        </div>
                    ";
                }
            ?>

        </section>
        <!-- Ending of section 4 -->

        <!-- Starting of section 5 -->
        <section class="section-5">
            <h1 class="news-section-heading">News</h1>

            <div class="news-wrap">
                <div class="news">
                    <div>
                        <h2 class="news-heading">The Books You Need to Read in 2023</h2>
                        <div class="news-bar"></div>
                        <p class="news-content">his is the blog we know you've all been waiting for. We present the top 10 titles for 2023 in fiction, non-fiction and children's books; a glorious mix of masterful storytelling, compelling subject matter and page-turning thrills...</p>
                    </div>
                    <div class="news-image">
                        <img src="template-images/Photo news.jpg">
                    </div>
                </div>

                <div class="news">
                    <div>
                        <h2 class="news-heading">February's Best Children's Books</h2>
                        <div class="news-bar"></div>
                        <p class="news-content">Some of the finest children's authors currently writing have books publishing this month, from Natasha Farrant to Elle McNicoll and from Tahereh Mafi to Harriet Muncaster. Across all areas and age ranges there are plenty of fantastic titles...</p>
                    </div>
                    <div class="news-image">
                        <img src="template-images/Photo news1.jpg">
                    </div>
                </div>

            </div>
        </section>

    </div>

    <!-- modal body  -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="login-form" class="btn btn-primary">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of modal body -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>