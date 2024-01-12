<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/reviews.php';

?>
<?php view('header', ['title' => 'Login']) ?>

    <style>

        .review {
            margin-bottom: 40px;
            background-color: rgba(159, 169, 163, 0.6);
            border-radius: 8px;
            color: black;
            margin-right: auto;
            margin-left: auto;
            max-width: 600px; /* Set your desired maximum width */
            padding: 15px;
            text-align: left;
            overflow: hidden;
        }

        .review img {
            border-radius: 50%;
            float: left;
            margin-right: 15px;
            width: 80px; /* Set the size of the round picture */
            height: 80px; /* Set the size of the round picture */
        }

        .reviewer-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .review-text {
            font-style: italic;
            line-height: 1.6; /* Increase line height for better readability */
        }

        .styled-link {
            background-color: #e3e0cc;
            color: black;
            font-weight: bold;
            text-align: center;
            padding: 12px; /* Increased padding */
            text-decoration: none;
            cursor: pointer;
            border-radius: 10px;
            display: block; /* Convert to block element */
            margin: 20px auto; /* Center the link and add margin for separation */
            max-width: 600px; /* Set your desired maximum width */
        }

        .styled-link:hover {
            background-color: #c5d5c5;
        }

    </style>

    <a href="leave_review.php" class="styled-link">Tell us what you think about our work!</a>


    <div class="review">
        <img src="../resources/photos/review1.jpg" alt='Reviewer 1'>
        <div class="review-info">
            <div class="reviewer-name">John Doe</div>
            <div class="review-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum
                finibus."
            </div>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>

    <div class="review">
        <img src="../resources/photos/review2.jpg" alt="Reviewer 2">
        <div class="review-info">
            <div class="reviewer-name">Michael Smith</div>
            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat
                nisl."
            </div>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
    </div>

    <div class="review">
        <img src="../resources/photos/no-photo.jpg" alt="Reviewer 2">
        <div class="review-info">
            <div class="reviewer-name">Jade Mith</div>
            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat
                nisl."
            </div>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
    </div>

    <div class="review">
        <img src="../resources/photos/review3.jpg" alt="Reviewer 2">
        <div class="review-info">
            <div class="reviewer-name">Jane Smith</div>
            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat
                nisl."
            </div>
            <div class="star-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
    </div>


<?php
$reviews = [];
if (isset($_GET['userId'])) {
    $user_id = $_GET['userId'];
    $reviews = retrieveReviewsByUserId($user_id);
} else $reviews = retrieveReviews();
foreach ($reviews as $review) {
    ?>
    <div class="review">
        <?php
        $defaultImage = '../resources/photos/no-photo.png'; // Replace this with the path to your default image
        if (!empty($review['photo'])) {
        $imageSource = "data:image/jpeg;base64," . base64_encode($review['photo']);
        } else {
        $imageSource = $defaultImage;
        } ?>
        <img src="<?= $imageSource ?>" alt="Profile Photo" class="profile-picture">
        <div class="review-info">
            <div class="reviewer-name"><?php echo $review['reviewer_name']; ?></div>
            <div class="review-text"><?php echo $review['review_text']; ?></div>
            <div class="star-rating">
                <?php
                $stars = $review['stars'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $stars) {
                        // Display a filled star (Font Awesome class)
                        echo '<i class="fas fa-star"></i>';
                    } else {
                        // Display an empty star (Font Awesome class)
                        echo '<i class="far fa-star"></i>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
?>


<?php view('footer') ?>