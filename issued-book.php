<?php
include 'includes/header.php';
include 'includes/display_errors.php';
include 'includes/db.php';

$query = "SELECT * FROM issued_books WHERE user_id = {$_SESSION['user_id']}";
$data = mysqli_query($connection, $query);

if (mysqli_num_rows($data) > 0) {
    echo '<table style="margin-top: 100px;" class="table table-bordered">
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
        echo '<td>' . $row['delayed_by'] ." ". 'days' .'</td>';
        echo '<td>' . $row['total_issue_amount'] ." "."$".  '</td>';
        echo '</tr>';
        
    }

    echo '</tbody>
    </table>';
} else {
    echo "<div style='margin-top: 100px; margin-bottom: 150px; padding-left: 10px; border-left: 4px solid black;'>You haven't issued any book yet. Please issue something!</div>";
}

include 'includes/footer.php';
?>
