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

    <div class="container-fluid heart-background"">
    <div class="overlay"></div> <!-- Overlay for transparency -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 3%; margin-bottom: 3%;">
            <div class="col-md-6 col-md-offset-3">
                <div class="container-wrap rounded-form">
                    <form class="my-game-form" method="post" action="../src/game.php">
                        <h3 class="text-center" style="color: #900000; background-color: white; margin-bottom: 10%">Find
                            your love percentage</h3>
                        <div class="form-group text-center">
                            <label for="yourName">Your name</label>
                            <input type="text" class=" text-center" name="yourName" style="color: black"
                                   placeholder="...">
                        </div>
                        <div class="form-group text-center">
                            <label for="partnerName" style="padding-top: 20px; ">Partner's name</label>
                            <input type="text" class="text-center" name="partnerName" style="color: black"
                                   placeholder="...">
                        </div>
                        <div class="form-group" style="padding-top: 2%;">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <button type="submit" class="button mt-2" style="background-color:#900000;">
                                See percentage
                            </button>
                        </div>

                        <?php
                        if (isset($_GET['percentage']) && isset($_GET['result'])) { ?>
                        <div class="result" style="position: absolute; bottom: 10%; left: 40%">
                            <?php
                            echo '<h1 class="text-center">' . $_GET['percentage'] . '</h1>';
                            echo '<h4 class="text-center">' . $_GET['result'] . '</h4> </div>'; ?>
                            <div class="form-group text-center" style="position: absolute; bottom: 10%; left: 50%;">
                                <a href="game.php" style=" color: black; font-weight: bold;">try again</a></div>
                            <?php } ?>
                    </form>

                </div>

            </div>
        </div>
    </div>

<?php view('footer') ?>