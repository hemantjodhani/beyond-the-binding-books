<?php include 'includes/header.php' ?>
<?php include 'includes/display_errors.php' ?>
<?php include 'includes/db.php' ?>
<style>
    *{
        padding: 0;
        margin: 0;
    }
</style>
<?php
    if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];
        $query = "SELECT * FROM books WHERE book_id = $book_id";
        $result = mysqli_query($connection , $query);
        $data = mysqli_fetch_assoc($result);
        echo "
			<div style='margin-top:100px; margin-bottom:100px;' class='book-parent'>
				<div class='book-image'>
					<img src='admin/book-images/{$data['book_image']}'> 
				</div>
				<div class='book-name--issue-price--discription--issue-btn'>
					<span class='book-name'>{$data['book_name']}</span>
					<p class='book-discription'>$data[book_description]</p>
					<span class='issue-price'>$ {$data['book_per_day_price']}</span>
					<a href='checkout.php?book_id=$data[book_id]' class='issue-btn' href=''>Checkout</a>
				</div>
			</div>
			";
    }
?>
<?php include 'includes/footer.php' ?>