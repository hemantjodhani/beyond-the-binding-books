<?php include 'includes/header.php' ?>
<?php include 'includes/db.php' ?>
<?php include 'includes/display_errors.php' ?>
<?php
// $user_id = $_SESSION['user_id'];
// $query = "SELECT * FROM users WHERE user_id = $user_id";
// $select_user = mysqli_query($connection,$query);
// $user_data = mysqli_fetch_assoc($select_user);
?>
<style>
    .update-forms {
        display: flex;
        justify-content: space-around;
        margin-bottom: 100px;
        margin-top: 100px;

    }

    .update {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .update button {
        width: 111px;
    }

    .update-password {
        display: flex;
        justify-content: center;
        margin-bottom: 100px;
    }
</style>

<div style="margin-top: 100px;">
    <?php
    if (isset($_POST['email-updater'])) {
        $sql = "UPDATE users SET user_email='" . $_POST["email"] . "' WHERE user_id=" . $_SESSION['user_id'] . "";
        $result = mysqli_query($connection, $sql);
        if($result){
            
            echo "
            <div class='alert alert-success alert-dismissible'style='display: flex; justify-content: space-between; margin-top: 45px;align-items:center;'>
                <div><strong>Successfully </strong> Email updated !</div>
            </div>
            ";
        }else{echo '<div class="alert alert-danger" role="alert"> Oops Something went wrong !</div>';}
    }

    if (isset($_POST['username-updater'])) {
        $sql = "UPDATE users SET username='" . $_POST["username"] . "' WHERE user_id=" . $_SESSION['user_id'] . "";
        $result = mysqli_query($connection, $sql);
        if($result){
            echo "
            <div class='alert alert-success alert-dismissible'style='display: flex; justify-content: space-between; margin-top: 45px;align-items:center'>
                <div><strong>Successfully </strong> Username updated !</div>
            </div>;
            ";
        }else{echo '<div class="alert alert-danger" role="alert"> Oops Something went wrong !</div>';}
    }

    if (isset($_POST['password-updater'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $data = mysqli_query($connection, $query);
        $data = mysqli_fetch_assoc($data);
        if ($data['user_password'] === $currentPassword) {
            if ($newPassword === $confirmPassword) {
                $query = "UPDATE users SET user_password = '$newPassword' WHERE user_id = $user_id";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo "
                        <div class='alert alert-success alert-dismissible'style='display: flex; justify-content: space-between; margin-top: 45px;align-items:center;'>
                            <div><strong>Successfully </strong> Password updated</div>
                        </div>;
                        ";
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                       Please enter same password in both fields !
                    </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert"> Please Check your current password !</div>';
        }
    }
    ?>
</div>


<div class="update-forms">
    <form class="update" method="post" class="col-4">
        <div class="form-group">
            <label for="email1">Email address</label>
            <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <button name="email-updater" type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form class="update" method="post" class="col-4">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="email2" name="username" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button name="username-updater" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="update-password">
    <form class="update col-6" method="post">
        <div class="form-group">
            <label for="currentPassword">Current password</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Enter current password">
        </div>

        <div class="form-group">
            <label for="newPassword">Enter new password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter new password">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm new password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
        </div>
        <button name="password-updater" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



<?php include 'includes/footer.php' ?>