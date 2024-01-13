<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Add review']); ?>

    <style>

        .review-form {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            margin-left: auto;
            margin-right: auto;
        }


        select,
        textarea
         {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button:hover {
            background-color: #c5d5c5;
        }

    </style>

<?php if (is_user_logged_in()) { ?>
    <div id="page-container">
        <div id="content-wrap">
            <form class="review-form" action="../src/leave_review.php" method="post">
                <h1 class="text-center">Leave a Review</h1>

                <label for="rating">Rating (out of 5):</label>
                <select id="rating" name="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit Review</button>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="message-box">
        <p>You need to be logged in to leave a review.</p>
        <a href="login.php">Go to login</a>
    </div>
<?php } ?>

<?php view('footer') ?>