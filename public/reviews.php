<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/reviews.php';

?>
<?php view('header', ['title' => 'Reviews']) ?>

    <style>
        <?php include 'css/reviews.css' ?>

    </style>

    <a href="leave_review.php" class="styled-link" >Tell us what you think about our work!</a>


<!--    <div class="review">-->
<!--        <img src="../resources/photos/review1.jpg" alt='Reviewer 1'>-->
<!--        <div class="review-info">-->
<!--            <div class="reviewer-name">John Doe</div>-->
<!--            <div class="review-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum-->
<!--                finibus."-->
<!--            </div>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="review">-->
<!--        <img src="../resources/photos/review2.jpg" alt="Reviewer 2">-->
<!--        <div class="review-info">-->
<!--            <div class="reviewer-name">Michael Smith</div>-->
<!--            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat-->
<!--                nisl."-->
<!--            </div>-->
<!--            <div class="star-rating">-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="review">-->
<!--        <img src="../resources/photos/no-photo.jpg" alt="Reviewer 2">-->
<!--        <div class="review-info">-->
<!--            <div class="reviewer-name">Jade Mith</div>-->
<!--            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat-->
<!--                nisl."-->
<!--            </div>-->
<!--            <div class="star-rating">-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="review">-->
<!--        <img src="../resources/photos/review3.jpg" alt="Reviewer 2">-->
<!--        <div class="review-info">-->
<!--            <div class="reviewer-name">Jane Smith</div>-->
<!--            <div class="review-text">"Sed ullamcorper orci sit amet aliquet vulputate. Pellentesque vel consequat-->
<!--                nisl."-->
<!--            </div>-->
<!--            <div class="star-rating">-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="fas fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--                <i class="far fa-star"></i>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


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
        $defaultImage = '../resources/photos/no-photo.png';
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
                        echo '<i class="fas fa-star"></i>';
                    } else {
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