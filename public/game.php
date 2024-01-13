<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Contact us']); ?>

    <style>
        <?php include 'css/game.css' ?>
        .heart-background {
            background-image: url('../resources/photos/heart-bg.jpg');
        }
    </style>

    <h3 class="text-center" style="color: #900000; margin-bottom: 20px">Find your love percentage</h3>

    <div class="container-fluid heart-background"">
        <div class="overlay"></div> <!-- Overlay for transparency -->
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 round-container">
                        <div class="container rounded-form">
                            <div style="width: 50%; margin-left: 90px;">
                                <form class="my-game-form" method="post" action="../src/game.php">
                                    <div class="form-group text-center">
                                        <label for="yourName">Your name</label>
                                        <input type="text" class=" text-center" name="yourName" placeholder="Enter value">
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="partnerName">Partner's name</label>
                                        <input type="text" class=" text-center" name="partnerName" placeholder="Enter value">
                                    </div>
                                    <div class="text-center" style="padding-top: 2%;">
                                        <button type="submit" class="button" style="background-color:#900000;">
                                            See percentage
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="result">
                    <?php
                    if (isset($_GET['percentage']) && isset($_GET['result'])) {
                        echo '<h1 class="text-center">' . $_GET['percentage'] . '</h1>';
                        echo '<h4 class="text-center">' . $_GET['result'] . '</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php view('footer') ?>