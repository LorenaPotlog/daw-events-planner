
<?php
require __DIR__ . '/../src/bootstrap.php';
 if(is_admin()){
?>
<?php view('header', ['title' => 'Technicalities']) ?>

    <style>
        /* Custom CSS for the page */
        section {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
    <div class="container" style="margin-left: 500px; margin-right: 500px;  font-family: 'Ubuntu', cursive;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <section >
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
                        <ul>
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
                        <img src="../resources/UML.png" alt="logo" style="width: 700px; height: 400px">
                        <figcaption>Database entities & realtionships</figcaption>
                    </figure>

                    <figure>
                        <img src="../resources/UML.png" alt="logo" style="width: 700px; height: 400px">
                        <figcaption>Place an order</figcaption>
                    </figure>

                </section>

            </div>
        </div>
    </div>

<?php } else redirect_to('index.php'); ?>

<?php view('footer') ?>