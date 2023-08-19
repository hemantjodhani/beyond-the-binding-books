<?php
    include 'includes/db.php';

    function logout_handler(){
        $_SESSION['username'] = null;
        $_SESSION['user_type'] = null;
        header("Location: ../");
        exit;
    }

    function book_generator(){
        global $connection;
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