<?php include 'includes/header.php' ?>
<?php include 'includes/display_errors.php' ?>
<?php include 'includes/db.php' ?>
<?php include 'includes/functions.php' ?>
<style>
    * {
        padding: 0;
        margin: 0;
    }
</style>

<?php

if (isset($_SESSION['user_id'])) {
    if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];
        $query = "SELECT * FROM books where book_id = $book_id";
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($result);
        if ($data !== "") {
            echo '
                <table style="margin-top: 100px;" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book image</th>
                            <th>Book name</th>
                            <th>Per day price</th>
                            <th>Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="admin/book-images/' . $data['book_image'] . '" alt="Book Image" style="height: 100px; width: 100px; object-fit: contain;"></td>
                            <td>' . $data['book_name'] . '</td>
                            <td>' . $data['book_per_day_price'] . '</td>
                            <td>' . $data['book_category'] . '</td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        echo '
            <form style="margin-top: 100px; margin-bottom: 100px" method="post">
                <div class="col-xs-4" style="display:flex;justify-content:space-between;">
                    <div style="width:45%" class="mb-3">
                        <label for="email" class="form-label">First name</label>
                        <input type="text" class="form-control" id="username" name="first_name" required>
                    </div>
                    <div style="width:45%" class="mb-3">
                        <label for="email" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="username" name="last_name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="username" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="password" name="phone_number" required>
                </div>
                <div class="mb-3">
                    <label for="num_of_days" class="form-label">Number of days</label>
                    <input type="number" min=7 max=30 class="form-control" id="password" name="num_of_days" required>
                </div>
                </div>
                <div class="modal-footer" style="justify-content:center;">
                    <button type="submit" name="book-issue-form" class="btn btn-primary">Get now</button>
                </div>
            </form>
        ';
        if(isset($_POST['book-issue-form'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $num_of_days = $_POST['num_of_days'];
            $currentDate = date("Y-m-d");
            $daysToAdd = $num_of_days;
            $subscription_days = calculateFutureDate($currentDate, $daysToAdd);
            echo $subscription_days;
        }
    }
} else {
    echo "<div style='margin-top: 100px; margin-bottom: 150px; padding-left: 10px; border-left: 4px solid black;'>Please log in to continue with the checkout process.</div>";
}

?>
<?php include 'includes/footer.php' ?>