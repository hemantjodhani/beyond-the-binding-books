<?php include 'includes/header.php' ?>
<?php include 'includes/functions.php' ?>
<?php include 'includes/db.php' ?>
    <?php
        $book_name = $_POST['book_name'];
        $query = "SELECT * FROM books WHERE book_name LIKE '%{$book_name}%'";
        $data = mysqli_query($connection , $query);
        if(!empty($data)){
            while ($row = mysqli_fetch_assoc($data)) {
                echo"
                    <div style='margin-top:100px;margin-bottom:100px;' class='book-parent' >
                        <div class='book-image'>
                            <img src='admin/book-images/{$row['book_image']}'> 
                        </div>
                        <div class='book-name--issue-price--discription--issue-btn'>
                            <span class='book-name'>{$row['book_name']}</span>
                            <p class='book-discription'>{$row['book_description']}</p>
                            <span class='issue-price'>$ {$row['book_per_day_price']}</span>
                            <a href='book-page.php?book_id=$row[book_id]' class='issue-btn' href=''>Issue now</a>
                        </div>
                    </div>
                ";
            }
        }else{
            echo "<div>Sorry no book found</div>";
        }        
    ?>
<?php include 'includes/footer.php' ?>