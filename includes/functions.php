<?php
include 'includes/db.php';

function display_books(){
	global $connection;
	$query = "SELECT * FROM books";
	$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($result)) {

		$book_discription = substr($row['book_description'], 0, 120) . '...';
		echo "
			<div class='book-parent'>
				<div class='book-image'>
					<img src='admin/book-images/{$row['book_image']}'> 
				</div>
				<div class='book-name--issue-price--discription--issue-btn'>
					<span class='book-name'>{$row['book_name']}</span>
					<p class='book-discription'>$book_discription</p>
					<span class='issue-price'>$ {$row['book_per_day_price']}</span>
					<a href='book-page.php?book_id=$row[book_id]' class='issue-btn' href=''>Issue now</a>
				</div>
			</div>
			";
		}
}

?>