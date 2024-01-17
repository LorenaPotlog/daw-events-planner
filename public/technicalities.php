
<?php
require __DIR__ . '/../src/bootstrap.php';
if ( !is_admin() ) {
    header("Location: index.php");
    exit;
}?>
<?php view('header', ['title' => 'Technicalities']) ?>

    <style>
        section {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            padding-bottom: 3%;
            font-weight: bolder;
        }

        h3 {
            padding-bottom: 2%;
            font-weight: bold;
        }

        section li {
            padding-bottom: 2%;
        }
    </style>
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8" style="width: 100%;">
                <section >
                    <h2>Technicalities</h2>
                    <section>
                        <h3>Users</h3>
                        <ul >
                            <li>Admin - has all rights over products and services, including admin panel to manage users.</li>
                            <li>Seller - has the same rights as 'common' + able to add or delete their own products.</li>
                            <li>Common - normal user, can perform user action (registration, login), view products, generate documents.</li>
                        </ul>
                    </section>
                    <section>
                        <h3>Entities</h3>
                        <ul>
                            <li>Users</li>
                            <li>Products</li>
                            <li>Services (Packages)</li>
                            <li>Reviews</li>
                        </ul>
                    </section>

                    <section>
                        <h3>Processes</h3>
                        <ul>
                            <li>Browse through packages - customers can search or filter for different products in the SERVICES sections</li>
                            <li>Calculate invoice - customers can calculate a trial invoice for products, such as flower arrangements or a wedding cake</li>
                            <li>Book a consultation and send messages to contact email. Customers can book a consultation or send a contact form</li>
                            <li>Add, delete or update products - sellers can modify their products in the SHOP section</li>
                            <li>Delete or update customers/sellers - administrators can see all users, delete or update them.</li>
                        </ul>
                    </section>

                    <section>
                        <h3>Components</h3>
                        <ul>
                            <li>Backend - PHP</li>
                            <li>Frontend -  HTML & CSS</li>
                            <li>Database - MySql</li>
                        </ul>
                    </section>

                    <section>
                        <h3>Database</h3>
                        <ul>
                            <li>Tables - users, packages, products, page_views (used for analytics), password_reset, reviews</li>
                            <p>Read more about it <a href="../resources/pdf/database_info.pdf" download> here.</a></p>
                        </ul>
                    </section>
                </section>


                <section id="db">
                    <h2>DB & Diagrams</h2>

                    <figure>
                        <img src="https://i.ibb.co/dWJtP2v/ERD.png" alt="logo" style="width: 700px; height: 500px;">
                        <figcaption style="padding: 2%">Database entities & realtionships</figcaption>
                    </figure>

                    <figure>
                        <img src="https://i.ibb.co/1nqdH1X/db-users.png" alt="logo" style="width: 700px; height: 300px">
                        <figcaption style="padding: 2%">Example of table - users</figcaption>
                    </figure>

                </section>

            </div>
        </div>
    </div>

<?php view('footer') ?>