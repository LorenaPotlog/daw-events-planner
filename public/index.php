<?php
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']); ?>
    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
        }

        #content-wrap {
            padding-bottom: 2.5rem; /* Footer height */
        }

        #page-grid {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        section {
            margin: 20px 0;
            padding: 20px;
            border-radius: 15px;
            width: 80%; /* Set a fixed width, adjust as needed */
            box-sizing: border-box;
        }

        section:nth-child(odd) {
            background-color: rgba(197, 213, 197, 0.6); /* #c5d5c5 background with 80% opacity */
            text-align: right;
            margin-left: auto;
        }

        section:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.3); /* White background with 80% opacity for even sections */
            text-align: left;
            margin-right: auto;
        }

        h2, h3 {
            color: #333333; /* Dark text color for headings */
        }

        p {
            color: #666666;
            font-size: 1.5rem;
            font-family: 'Ubuntu', cursive; /* Apply the custom font */
            /*
                        Gray text color for paragraphs */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #ffffff;
            background-color: #337ab7; /* Blue button color */
        }

        .btn:hover {
            background-color: #23527c;
        }

        #services {
            text-align: justify;

        }

        #services p {
            margin-bottom: 15px;

        }

        #services img.photo {
            opacity: 0.9; /* Make the photo slightly transparent */
            border-radius: 10px; /* Add border radius to the photo */
        }

        .btn {
            display: inline-block;
            padding: 10px 100px;
            border: 1px solid black;
            margin: 10px 0;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 10px; /* Add border radius to the buttons */
            background-color: rgba(159, 169, 163, 0.8); /* Updated color with 0.8 transparency */
            color: black;
            font-family: 'Ubuntu', cursive;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: rgba(197, 213, 197, 0.8); /* Adjust the hover background color */
            color: white; /* Adjust the hover text color */
        }

        .partners-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .partner-img {
            width: 100px; /* Adjust the width of the images as needed */
            height: auto; /* Maintain the aspect ratio */
            border-radius: 5px; /* Add border radius to the images */
            margin: 0 5px; /* Adjust the margin between images */
        }
    </style>
    <div id="page-container">
    <div id="content-wrap">
<div id="page-grid">
    <?php include 'slideshow.php'; ?>
    <section>
        <h2 style="padding-bottom: 20px">About Us</h2>
        <p>
            At DETAILS, we believe that every event is a unique celebration waiting to happen. Our dedicated
            team of experienced planners is here to turn your vision into an unforgettable reality.

        </p>
        <p></p>
        <p>
            From <b>weddings</b> to small gatherings, our meticulous attention to detail ensures that your event
            will be seamless and stress-free. Let us handle the logistics while you focus on creating lasting
            memories.
        </p>
        <p></p>
        <img src="../resources/photos/team.jpg" alt="Event Planning" class="photo" style="float: left; margin-right: 20px; width: 750px; height: 400px;">
        <p style="padding-top: 50px; text-align: center">
            Our passion for creating exceptional experiences is what sets us apart. Whether it's a grand
            celebration or an intimate affair, we're committed to making every moment special.
        </p>
        <p style="padding-top: 50px; text-align: center; font-weight: bold">
            We are here to help you
        </p>
       <p style="padding-top: 20px; text-align: center">  <a href="#services" class="btn">Explore Our Services</a></p>
    </section>

    <section id="services">
        <h2 style="text-align: center; padding-bottom: 20px">Our Services</h2>
        <p>
            DETAILS takes pride in offering a complete suite of event organization services, meticulously designed to make
            your special occasions truly unforgettable. Whether it's a dreamy wedding, a corporate extravaganza, or a
            vibrant themed party, we have the expertise to turn your vision into reality.
        </p>
        <div>
            <img src='../resources/photos/index-services.jpeg' alt="Decorations" class="photo" style="float: left; margin-right: 20px; width: 400px; height: 300px;">
            <p>
                Our commitment to excellence is reflected in every detail. DETAILS collaborates with top-tier vendors to ensure
                the highest quality in venue selection, decorations, catering, and entertainment. The result? A seamless
                and immersive experience that exceeds your expectations.
            </p>
        </div>
        <p>
            At DETAILS, we understand that each event is unique. That's why we offer customizable packages that can be
            tailored to suit your individual style and preferences. Whether you envision an intimate ceremony or a grand
            celebration, our team is dedicated to making your event one-of-a-kind.
        </p>
        <p>
            Discover the magic of DETAILS through our thoughtfully curated packages, each designed to provide a distinct ambiance and
            experience here
        <div>
            <a href="services.php?name=wedding" class="btn">Weddings</a>
            <a href="services.php?name=bachelor" class="btn">Bachelors Parties</a>
        </div>
        </p>
        <p>
            ..or <a href="contact.php"> contact us</a> - our commitment to personalization means that you can always reach out to us
            for a bespoke wedding that perfectly aligns with your dreams. Looking forward to hearing from you!
        </p>
    </section>

    <section>
        <h2 style="text-align: center; padding-bottom: 20px;">Our partners</h2>

        <div class="partners-container">
            <img src="../resources/photos/logo3.jpeg" alt="Partner 3" class="partner-img">
            <img src="../resources/photos/logo1.jpg" alt="Partner 1" class="partner-img">
            <img src="../resources/photos/logo2.png" alt="Partner 2" class="partner-img">
            <img src="../resources/photos/logo4.jpg" alt="Partner 4" class="partner-img">
            <img src="../resources/photos/logo2.png" alt="Partner 2" class="partner-img">
            <img src="../resources/photos/logo3.jpeg" alt="Partner 3" class="partner-img">
            <img src="../resources/photos/logo1.jpg" alt="Partner 1" class="partner-img">
        </div>

        <div style="display: flex; justify-content: space-between;">
            <div>
                <p style="font-style: italic; padding-top: 20px; margin: 0;">
                    Want to become our partner? Please <a href="contact.php">contact us here.</a>
                </p>
            </div>

            <div>
                <p style="font-weight: bold; padding-top: 20px; text-align: right; margin: 0;">
                    <a href="#">See more</a>
                </p>
            </div>
        </div>
    </section>


    <section id="products">
        <h2 style="text-align: left; padding-bottom: 20px;">Our products - buy directly!</h2>

        <img src='../resources/photos/index-products1.jpg' alt="Decorations" class="photo" style="float: right; margin-left: 20px; width: 300px; height: 300px; border-radius: 15px;">
        <img src='../resources/photos/index-products2.jpg' alt="Decorations" class="photo" style="float: left; margin-right: 20px; width: 300px; height: 300px; border-radius: 15px;">

        <div style="text-align: left;">
            <p>
                At DETAILS, we understand that each event is unique. That's why we provide the flexibility for you to choose
                individual products tailored to suit your specific style and preferences. Elevate your event with our carefully curated
                selection, including:
            </p>

            <ul style="list-style: none; padding: 0; padding-right: 50px;">
                <li>&#9658; Cakes</li>
                <li>&#9658; Cocktail Bar Services</li>
                <li>&#9658; Live Music Bands</li>
                <li>&#9658; Floral Arrangements</li>
                <li>&#9658; Bridesmaid Dresses</li>
                <li>&#9658; and many more!</li>
            </ul>

            <p>
                Discover the magic of DETAILS through our thoughtfully curated products, each designed to provide a distinct ambiance
                and enhance your event experience. <a href="products.php" class="btn">Shop now</a>.
            </p>
        </div>
    </section>

    <section id="contact">
        <div style="display: flex; justify-content: space-between;">
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h2 style="background-color: rgba(227, 224, 204, 0.3);">Plan your next event hassle-free</h2>
                <p style="background-color: rgba(227, 224, 204, 0.3); font-size: 2rem">
                    Ready to start planning your event? Contact us today, and our team will be happy to assist you.
                </p>
                <p style="background-color: rgba(227, 224, 204, 0.3); font-size: 2rem; padding-top: 20px">
                    PS: It's easier to find information if you <a href="login.php">login or register</a>.
                </p>
            </div>

            <?php include 'contact_form.php'; ?>
        </div>
    </section>

    <section style="display: flex; justify-content: space-between;">
        <div style="width: 40%;">
            <h2 style="margin-bottom: 10px; padding-top: 70px">..or simply come meet us</h2>
        </div>

        <div style="width: 30%;">
            <p style="margin-bottom: 5px;">Or scan the QR code below</p>
            <img src="../resources/slideshow/QR.jpg" alt="QR Code" style="width: 200px; height: 200px;">
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 30%;">
            <p style="margin-bottom: 5px;">Click <a href="https://www.picktime.com/a8fbc788-13ae-47b7-9abd-e324ad177323" style="font-weight: bolder; color: #007bff; text-decoration: none;">here</a> to book your time slot.</p>
        </div>

    </section>

</div>
    <h3 style="color: #900000"><?php
        session_start();

        // Check if the page view counter session variable exists

        if(isset($_SESSION['page_views']))
        {
            // Increment the page view counter
            $_SESSION['page_views']++;
        } else {
            // Set the initial page view counter to 1
            $_SESSION['page_views'] = 1;
        }

        // Display the page view count
        echo "Page Views: " . $_SESSION['page_views'];
        ?></h3>
    </div>
    </div>

<?php view('footer') ?>