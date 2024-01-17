<?php
require __DIR__ . '/../src/user/register.php';
?>

<?php view('header', ['title' => 'Home']); ?>
    <style>
        <?php include 'css/index.css' ?>

    </style>
    <div id="page-container">
        <div id="content-wrap">
            <div id="page-grid">
                <?php include 'js/slideshow.php'; ?>
                <section>
                    <h2 style="padding-bottom: 20px">About Us</h2>
                    <p style="padding-bottom: 2%">
                        At DETAILS, we believe that every event is a unique celebration waiting to happen. Our dedicated
                        team of experienced planners is here to turn your vision into an unforgettable reality.

                    </p>
                    <img src="https://i.ibb.co/kHTWvSq/team.jpg" alt="Event Planning" class="photo"
                         style="float: left; margin-right: 20px; width: 750px; height: 400px; border-radius: 5%">
                    <p style="text-align: center">
                        From <b>weddings</b> to small gatherings, our meticulous attention to detail ensures that your
                        event
                        will be seamless and stress-free. Let us handle the logistics while you focus on creating
                        lasting
                        memories.
                    </p>
                    <p style="text-align: center">
                        Our passion for creating exceptional experiences is what sets us apart. </p>

                    <p style="text-align: center">
                        Whether it's a grand
                        celebration or an intimate affair, we're committed to making every moment special.
                    </p>
                    <div style="display: flex; flex-direction: column">
                        <p style="padding-top: 1.5%; text-align: center; font-weight: bold">
                            We are here to help you </p>
                        <p style="width: 100%;"><a href="services.php" class="styled-link">Explore Our
                                Services</a></p>
                    </div>
                </section>

                <section id="services text-center">
                    <h2 style="text-align: center; padding-bottom: 20px">Our Services</h2>
                    <p class="text-center">
                        DETAILS takes pride in offering a complete suite of event organization services, meticulously
                        designed to make
                        your special occasions truly unforgettable. Whether it's a dreamy wedding, a corporate
                        extravaganza, or a
                        vibrant themed party, we have the expertise to turn your vision into reality.
                    </p>
                    <img src='https://i.ibb.co/bRLzDcV/index-services.jpg' alt="Decorations" class="photo"
                         style="float: left; margin-right: 20px; width: 400px; height: 300px; border-radius: 5%">
                    <div style="padding-left: 35%; padding-right: 5%">
                        <p style="text-align: center;">
                            Our commitment to excellence is reflected in every detail. DETAILS collaborates with
                            top-tier vendors to ensure
                            the highest quality in venue selection, decorations, catering, and entertainment. The
                            result? A seamless
                            and immersive experience that exceeds your expectations.
                        </p>

                        <p style="text-align: center; font-weight: bold">
                            Discover the magic of DETAILS through our thoughtfully curated packages, each designed to
                            provide a distinct ambiance and
                            experience here </p>
                        <p style="text-align: center; padding-bottom: 0">
                            At DETAILS, we understand that each event is unique. That's why we offer customizable
                            packages
                            that can be tailored to suit your individual style and preferences.
                        </p>
                    </div>
                    <div style="display:flex; justify-content: space-evenly; padding-bottom:1%">
                        <a href="services.php?category=wedding" class="styled-link" style="width: 30%;">Weddings</a>
                        <a href="services.php?category=bachelor" class="styled-link" style="width: 30%;">Bachelor &
                            Bachelorette</a>
                    </div>
                    <p style="text-align: center;">
                        ..or <a href="contact.php"> contact us</a> - our commitment to personalization means that you
                        can always reach out to us
                        for a bespoke wedding that perfectly aligns with your dreams. Looking forward to hearing from
                        you!
                    </p>
                </section>

                <section>
                    <h2 style="text-align: center; padding-bottom: 20px;">Our partners</h2>

                    <div class="partners-container">
                        <img src="https://i.ibb.co/GVNkPXW/logo3.jpg" alt="Partner 3" class="partner-img">
                        <img src="https://i.ibb.co/PDNy4FJ/logo1.jpg" alt="Partner 1" class="partner-img">
                        <img src="https://i.ibb.co/NstXFHf/logo2.png" alt="Partner 2" class="partner-img">
                        <img src="https://i.ibb.co/T8y2978/logo4.jpg" alt="Partner 4" class="partner-img">
                        <img src="https://i.ibb.co/NstXFHf/logo2.png" alt="Partner 2" class="partner-img">
                        <img src="https://i.ibb.co/GVNkPXW/logo3.jpg" alt="Partner 3" class="partner-img">
                        <img src="https://i.ibb.co/PDNy4FJ/logo1.jpg" alt="Partner 1" class="partner-img">
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <p style="font-style: italic; padding: 20px 0 0;">
                                Want to become our partner? Please <a href="contact.php">contact us here.</a>
                            </p>
                        </div>

                        <div>-
                            <p style="font-weight: bold; padding: 20px 0 0;">
                                <a href="#">See more</a>
                            </p>
                        </div>
                    </div>
                </section>


                <section id="products">
                    <h2 style="text-align: left; padding-bottom: 20px;">Our products - buy directly!</h2>

                    <img src='https://i.ibb.co/3kkfTLD/index-products1.jpg' alt="Decorations" class="photo"
                         style="float: right; margin-top: 20px; width: 320px; height: 350px; border-radius: 15px;">
                    <img src='https://i.ibb.co/w0RqYXs/index-products2.jpg' alt="Decorations" class="photo"
                         style="float: left; margin-top: 20px; width: 320px; height: 350px; border-radius: 15px;">

                    <div style="text-align: center; padding-bottom: 20px">
                        <p>
                            At DETAILS, we understand that each event is unique. That's why we provide the flexibility
                            for you to choose
                            individual products tailored to suit your specific style and preferences. Elevate your event
                            with our carefully curated
                            selection, including:
                        </p>

                        <ul style="list-style: none; padding: 0 50px 0 0; text-align: center">
                            <li style="padding-bottom: 10px">&#9658; Cakes</li>
                            <li style="padding-bottom: 10px">&#9658; Cocktail Bar Services</li>
                            <li style="padding-bottom: 10px">&#9658; Live Music Bands</li>
                            <li style="padding-bottom: 10px">&#9658; Floral Arrangements</li>
                            <li style="padding-bottom: 10px">&#9658; Bridesmaid Dresses</li>
                            <li>&#9658; and many more!</li>
                        </ul>
                        <div style="display: flex;">
                            <p style="text-align: right; padding-top: 20px; padding-right: 20px">
                                Discover the magic of DETAILS through our thoughtfully curated products.
                            </p>
                            <a href="products.php" class="styled-link" style="width: 30%">Shop now</a>.
                        </div>
                    </div>
                </section>

                <section id="contact">
                    <div style="display: flex; justify-content: space-between;">
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <h2 style="background-color: rgba(227, 224, 204, 0.3);">Plan your next event
                                hassle-free</h2>
                            <p style="background-color: rgba(227, 224, 204, 0.3); text-align: center">
                                Ready to start planning your event? Contact us today, and our team will be happy to
                                assist you.
                            </p>
                            <?php if (!is_user_logged_in()) { ?>
                                <p style="background-color: rgba(227, 224, 204, 0.3); font-size: 2rem; padding-top: 20px">
                                    PS: It's easier to find information if you <a href="login.php">login or register</a>.
                                </p>
                            <?php } ?>
                        </div>

                        <?php include 'contact_form.php'; ?>
                    </div>
                </section>

                <section style="display: flex; justify-content: space-between;">
                    <div style="width: 40%;">
                        <h2 style="margin-bottom: 10px; padding-top: 70px">..or simply come meet us</h2>
                    </div>

                    <div style="width: 30%;">
                        <p style="margin-bottom: 5px;">Scan the QR code below</p>
                        <img src="https://i.ibb.co/x8kgRcL/qr.png" alt="QR Code" style="width: 200px; height: 200px;">
                    </div>

                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 30%;">
                        <p style="margin-bottom: 5px;">or click <a
                                    href="https://www.picktime.com/a8fbc788-13ae-47b7-9abd-e324ad177323"
                                    style="font-weight: bolder; color: #007bff; text-decoration: none;">here</a> to book
                            your time slot.</p>
                    </div>

                </section>
            </div>
        </div>
    </div>

<?php view('footer') ?>