<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/contact.php';

?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<?php view('header', ['title' => 'Contact us']); ?>
<style>
    #page-container {
        position: relative;
        margin-left: 600px;
        width: 100%;
    }
    .round-container {
        display: flex;
        align-items: center;
        justify-content: center;
        /* height: 100vh;
        margin: 0; */
        background-color: #f8f9fa; /* Bootstrap default background color */
    }
    .rounded-form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .custom-btn {
        background-color: rgba(197, 213, 197, 0.6);
        color: black;
        font-family: 'Ubuntu', cursive;
    }
</style>

<div class="container-fluid" style="margin-bottom: 5%">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center" style="font-family: 'Ubuntu', cursive;">Contact us</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2" ></div>
                    <div class="col-md-8">
                        <form method="post" action="../src/contact.php">
                            <label for="name" style="font-family: 'Ubuntu', cursive;">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                   style="background-color:rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"><br>

                            <label for="email" style="font-family: 'Ubuntu', cursive;">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                   style="background-color: rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"><br>

                            <label for="message" style="font-family: 'Ubuntu', cursive;">How can we help you?</label>
                            <textarea class="form-control" id="message" name="message" required
                                      style="background-color:rgba(197, 213, 197, 0.6);  font-family: 'Ubuntu', cursive;"></textarea><br>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="form-input" style="padding-left: 4%;">
                                            <!-- Google reCAPTCHA box -->
                                            <div class="g-recaptcha" style="padding-bottom: 3%;" data-sitekey="<?php echo $siteKey; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>

                            <div class="text-center" style="padding-top: 3%;">
                                <button type="submit" class="btn btn-primary custom-btn">
                                    Tell us about your event
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="text-center" style="font-family: 'Ubuntu', cursive;">Find your love percentage</h3>
            <div class="container-fluid" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 round-container">
                        <div class="container rounded-form">
                            <div style="width: 50%; margin-left: 90px;">
                                <div class="form-group text-center">
                                    <label for="yourName">Your name</label>
                                    <input type="text" class="form-control" id="yourName" placeholder="Enter value">
                                </div>
                                <div class="form-group text-center">
                                    <label for="partnerName">Partner's name</label>
                                    <input type="text" class="form-control" id="partnerName" placeholder="Enter value">
                                </div>
                                <div class="text-center" style="padding-top: 2%;">
                                    <button type="submit" class="btn btn-primary custom-btn" onClick="computePercentage()">
                                        See percentage
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <h1 id="percentage" class="text-center" style="font-family: 'Ubuntu', cursive;"></h1>
                    <h4 id="one-liner" class="text-center" style="font-family: 'Ubuntu', cursive;"></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php view('footer') ?>

<script>
    async function computePercentage() {

        var yourName = document.getElementById('yourName').value;
        var partnerName = document.getElementById('partnerName').value;

        const url = 'https://the-love-calculator.p.rapidapi.com/love-calculator?fname=' + yourName + '&sname=' + partnerName;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '8f15ffeab1msh31e49daeef217d8p1fbc63jsn9b9ea0f89c1c',
                'X-RapidAPI-Host': 'the-love-calculator.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const result = await response.json();

            document.getElementById('percentage').textContent = result["percentage match: "] + '%';
            document.getElementById('one-liner').textContent = result["result: "];

            console.log(result);
            console.log(result["percentage match: "]);
            console.log(result["result: "]);
            // alert(result);
        } catch (error) {
            alert(error);
        }
    }
</script>
