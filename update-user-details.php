<?php include 'includes/header.php' ?>
<?php include 'includes/db.php' ?>
<?php
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_user = mysqli_query($connection,$query);
        $user_data = mysqli_fetch_assoc($select_user);
?>
<?php include 'includes/footer.php' ?>