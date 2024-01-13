<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/edit_profile.php';
?>

<?php view('header', ['title' => 'Edit Profile']); ?>

    <style>
        .profile-picture {
            border: 2px solid pink;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            background-size: cover;
        }

        .account-details-box {
            border: 2px solid pink;
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            margin-right: auto;
            margin-left: auto;
            background-color: rgba(197, 213, 197, 0.6);
        }

        .account-details-box p {
            font-weight: bolder;
            font-size: large;
        }

        .details-table {
            width: 100%;
        }

        .details-table td {
            padding-left: ;
            text-align: left;
            padding-bottom: 10px;
        }

        .details-table td.right {
            text-align: left;
        }

    </style>

    <div style="text-align: center; position: relative;">

        <div class="account-details-box">
            <p>Edit your profile:</p>
            <?php
            $defaultImage = '../resources/photos/no-photo2.png'; // Replace this with the path to your default image
            if (!empty($user['photo'])) {
                $imageSource = "data:image/jpeg;base64," . base64_encode($user['photo']);
            } else {
                $imageSource = $defaultImage;
            } ?>
            <img src="<?= $imageSource ?>" alt="Profile Photo" class="profile-picture" style="margin-bottom: 8px">
            <form method="post" action="../src/edit_profile.php" enctype="multipart/form-data">
                <table class="details-table">
                    <tr>
                        <td>Photo:</td>
                        <td class="right"><input type="file" name="photo"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td class="right"><input type="text" name="email" value="<?= $user['email'] ?>" required></td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td class="right"><input type="text" name="lastname" value="<?= $user['lastname'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>First name:</td>
                        <td class="right"><input type="text" name="firstname" value="<?= $user['firstname'] ?>"
                                                 required></td>
                    </tr>
                </table>
                <button type="submit" class="styled-link">Update Profile</button>

            </form>
        </div>


    </div>
    <a href="user_account.php" class="styled-link" style="color: black"><i class="fas fa-arrow-left"></i> Go back to Your Account</a>


<?php view('footer') ?>