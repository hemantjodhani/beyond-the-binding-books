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

function calculateFutureDate($currentDate, $daysToAdd)
{
	$currentDateTime = new DateTime($currentDate);
	$currentDateTime->modify("+" . $daysToAdd . " days");
	$futureDate = $currentDateTime->format("Y-m-d");
	return $futureDate;
}

function display_issued_books(){
	global $connection;
	$query = "SELECT * FROM issued_books WHERE user_id = {$_SESSION['user_id']}";
	$data = mysqli_query($connection , $query);

	if (mysqli_num_rows($data) > 0) {
		echo '<table style="margin-top: 100px; margin-bottom: 200px" class="table table-bordered">
		<thead>
			<tr>
				<th>Book image</th>
				<th>Book name</th>
				<th>Number of days</th>
				<th>Issue date</th>
				<th>Return date</th>
				<th>Delayed by</th>
				<th>Total amount</th>
				
			</tr>
		</thead>
		<tbody>';

		while ($row = mysqli_fetch_assoc($data)) {
			$book_id = $row['book_id'];
			$query = "SELECT * FROM books WHERE book_id={$row['book_id']}";
			$result = mysqli_query($connection, $query);
			$book_data = mysqli_fetch_assoc($result);

			echo '<tr>';
			echo '<td><img src="admin/book-images/' . $book_data['book_image'] . '" alt="Book Image" width="50px"></td>';
			echo '<td>' . $book_data['book_name'] . '</td>';
			echo '<td>' . $row['num_of_days'] . '</td>';
			echo '<td>' . $row['issued_date'] . '</td>';
			echo '<td>' . $row['return_date'] . '</td>';
			echo '<td>' . $row['delayed_by'] . " " . 'days' . '</td>';
			echo '<td>' . $row['total_issue_amount'] . " " . "$" .  '</td>';
			echo '</tr>';
		}

		echo '</tbody>
    </table>';
	} else {
		echo "<div style='margin-top: 100px; margin-bottom: 150px; padding-left: 10px; border-left: 4px solid black;'>You haven't issued any book yet. Please issue something!</div>";
	}
}
function book_finder(){
	global $connection;
	$book_name = $_POST['book_name'];
        $query = "SELECT * FROM books WHERE book_name LIKE '%{$book_name}%'";
        $data = mysqli_query($connection , $query);
        if(mysqli_num_rows($data) > 0) {
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
            echo "<div style='margin-top: 100px; margin-bottom: 150px; padding-left: 10px; border-left: 4px solid black;'>Sorry no books found!</div>";
        }
}