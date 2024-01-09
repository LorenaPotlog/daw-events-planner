<?php
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']); ?>

<div id="page-grid">
            <section id="welcome" style="padding-top: 10%">
                <h2>Welcome!</h2>

                <p>
                Welcome to DETAILS, your (partially) virtual wedding planner! Whether you're seeking assistance with those last-minute details like booking a band or simply wish to sit back, relax, and entrust the planning to someone else, we've got you covered.

                Explore our SERVICES section to discover our full packages tailored to your needs. Here, you'll find specifics like total pricing, maximum guest counts, and menu options.

                For quicker solutions, head to our SHOP section where you can purchase a variety of services, from exquisite flower arrangements and charming wedding toppers to delightful candy bars. You can also schedule a consultation to discuss your vision further.
                </p>

            </section>

            <section id="technicalities">
                <h2>Technicalities</h2>
                <section>
                    <h3>Users</h3>
                    <ul>
                        <li>Administrator - managing the website, has all rights</li>
                        <li>Customer - able to login and buy products on the website</li>
                        <li>Seller - able to add or delete their own products on the website</li>
                    </ul>
                </section>
                <section>
                    <h3>Entities</h3>
                        <li>Users</li>
                        <li>Products</li>
                        <li>Bookings for consultations</li>
                        <li>Orders</li>
                    </ul>
                </section>

                <section>
                    <h3>Processes</h3>
                    <ul>
                        <li>Browse through products - customers can search or filter for different products in the SERVICES sections</li>
                        <li>Place order - customers can buy certain services, such as flower arrangements or a wedding cake</li>
                        <li>Book a consultation and send messages to contact email - customers can book a consultation or simply send an email</li>
                        <li>Add, delete or update products - sellers can modify their products in the SHOP section</li>
                        <li>Delete or update customers/sellers - administrators can see all the customers/sellers, delete or update them.</li>
                        <li>Manage bookings - administrators can see all the consultations that have been booked by the customers, delete or update them.</li>
                    </ul>
                </section>

                <section>
                    <h3>Components</h3>
                    <ul>
                        <li>Backend - with PHP</li>
                        <li>Frontend - with HTML & CSS</li>
                        <li>UI - user friendly</li>
                        <li>Database - mysql</li>
                    </ul>
                </section>

                <section>
                    <h3>Database</h3>
                    <ul>
                        <li>Tables - users, services, packages, products, consultations</li>
                        <p>Read more about it <a href="#db"> here.</a></p>
                    </ul>
                </section>
            </section>


            <section id="db">
                <h2>DB & Diagrams</h2>
                
                <figure>
                    <img src="../resources/UML.png" alt="logo">
                    <figcaption>Database entities & realtionships</figcaption>
                </figure>

                <figure>
                    <img src="../resources/UML.png" alt="logo">
                    <figcaption>Place an order</figcaption>
                </figure>
            
            </section>
            <!-- Task tabel
            <section id="good-to-know">
                <h2>Good to know</h2>
                <h3>Office schedule</h3>
                <table id="schedule">
                    <caption>See you there!</caption>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Morning</th>
                            <th>Afternoon</th>
                            <th>Who will you find there?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <td>10-12</td>
                            <td>15-16:30</td>
                            <td>Whole team</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>9-12</td>
                            <td>15-16:30</td>
                            <td>Geta</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>9-11</td>
                            <td>15-17</td>
                            <td>Denisa, Andrei</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>9-11</td>
                            <td>15-17</td>
                            <td>Denisa, Andrei</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>9-12</td>
                            <td>14-18</td>
                            <td>Whole team</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>10-12</td>
                            <td>14-18</td>
                            <td>Denisa, Andrei</td>

                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>10-14</td>
                            <td>Closed</td>
                            <td>Geta</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">We are available 24/7 on Skype, please see contact.</td>
                        </tr>
                    </tfoot>
                </table> -->
                <h3>FQA</h3>
                <details>
                    <summary>What kind of events you organize?</summary>
                    <p>Until now, we have been in charge of weddings, birthdays, gender reveal parties, corporate
                        events. We
                        are flexibile and open to new challenges so if you think we are a right fit, please feel free to
                        book a meeting with us.</p>
                </details>
                <details>
                    <summary>I'm from another city! Can I still work with your team for an event outside Bucharest?
                    </summary>
                    <p>We prefer working on site but we also offer the remote opportunity. However, we recommend at
                        least
                        one meeting to be face-to-face.</p>
                </details>
                <details>
                    <summary>Do you organize only big events?</summary>
                    <p>Of course not! We have been organizing bigger events because usually this is when people need
                        more
                        help but we are happy to help with smaller parties. Our smallest event was for 5 people and the
                        biggest was 10,000. </p>
                </details>
                <details>
                    <summary>Do you work with certain companies?</summary>
                    <p>We have parteners which we fully trust, but we are open to new suggestions.</p>
                </details>
                <details>

                    <!-- Un link de tip download -->
                    <summary>I want to do a vegan wedding. Are you able to help me with that?</summary>
                    <p>Of course we are! From alergies to personal choices, when it comes to food, we can follow any
                        wishes.
                        As an example, you can download a few special menus we had so far
                        <a href="./resurse/menu/vegan-menu.pdf" download="Vegan menu for Wedding">here.</a>
                    </p>
                </details>
                <details>
                    <summary>How much do we charge?</summary>
                    <!-- Folosirea unei formule scrise în MathML -->
                    <p>While we cannot offer a specific number because it depends on various elements, we use the
                        following
                        formula:</p>
                    <div class="formula">
                        <math xmlns="http://www.w3.org/1998/Math/MathML">
                            <mrow>
                                <mi>No. of guest</mi>
                                <mo> * </mo>
                                <mi>Cost per guest</mi>
                                <mo>=</mo>
                                <ms>Total guest cost</ms> 
                            </mrow>

                        </math> <br>
                        <math>
                            <mrow>
                                <mn>7.5</mn>
                                <mo>%</mo>
                                <mo> * </mo>
                                <mi>Total guest cost</mi>
                                <mo>=</mo>
                                <ms>Organizer cost</ms>
                            </mrow>
                        </math> <br>
                        <math>
                            <mrow>
                                <mi>Total guest cost</mi>
                                <mo>+</mo>
                                <mi>Organizer cost</mi>
                                <mo>=</mo>
                                <ms>Final cost</ms>
                            </mrow>
                            <mtext>*Cost per guest is calculcated based on F&B, location and any extra amenities.</mtext>
                        </math>
                    </div>
                    <br>
                </details>

            </section>
        </div>
<section>
    <h3 style="color: #900000"><?php
        session_start();

        // Check if the page view counter session variable exists

        if(isset($_SESSION['page_views']))
        {
            // Increment the page view counter
            $_SESSION['page_views']++;
        } Else {
            // Set the initial page view counter to 1
            $_SESSION['page_views'] = 1;
        }

        // Display the page view count
        echo "Page Views: " . $_SESSION['page_views'];
        ?></h3>
</section>

    </main>

    <footer>
        <section id="#contact">
            <h2>Contact</h2>
            <div>
                <address>
                    <a href="tel:+4077123456"><span class="fa-regular fa-solid fa-phone"> Call us</span></a>
                    <a href="mailto:proiectproiect61@gmail.com"><span class="fa-regular fa-solid fa-envelope"> Email us</span></a>
                    <a href="skype:proiectproiect?chat"><span class="fa-regular fa-solid fa-comments"> 24/7 assistance
                            (via Skype)</span></a>
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.8843011393105!2d26.097011775875163!3d44.43553547107589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff472f47f047%3A0x493984726f0235f9!2sFaculty%20of%20Mathematics%20and%20Computer%20Science!5e0!3m2!1sen!2sro!4v1682778737477!5m2!1sen!2sro"
                        target="_blank"> <span class="fa-regular fa-solid fa-location-dot"> 
                        Meet us @ Academy street no. 14, 010014, Bucharest</span></a>
                </address>

                <!-- un link în footer către începutul paginii, Link top -->

                <a id="link-top" href="#">
                    <div id="diamond"><span class="tooltiptext">Scroll up</span></div>
                </a>
                <div id="copyright">
                    <small>Copyright 2023 &copy; TODO events, <time datetime="2023-05-05">5 May 2023</time></small>
                </div>
                <div id="banner">
                    <small><b>This is a school project.</b></small>
                </div>
            </div>

            <div id="watermark"></div>
        </section>
    </footer>
<?php view('footer') ?>