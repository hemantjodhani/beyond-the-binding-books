<?php include 'includes/header.php' ?>
<?php include 'includes/display_errors.php' ?>
<?php include 'includes/db.php' ?>
<style>
    * {
        padding: 0;
        margin: 0;
    }
</style>

<?php
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    echo '
        <form style="margin-top: 100px; margin-bottom: 100px" method="post">
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
                <button type="submit" name="login-form" class="btn btn-primary">Login</button>
            </div>
        </form>
    ';
}
?>
<div style="margin: 0 auto; width:1200px;">
    <?php include 'includes/footer.php' ?>
</div>