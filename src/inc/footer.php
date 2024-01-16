<style>
    <?php include 'css/footer.css' ?>
</style>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--cookies logic-->
<div id="cookiePopup" style="display: none; position: fixed; bottom: 0; left: 0; width: 100%; padding: 10px; background-color: darkgrey; text-align: center; border-top: 1px solid #ddd;">
    This website uses cookies, please accept them before proceeding to any other page.
    <button onclick="acceptCookies()" style="width: 5%; color:black;">Accept</button>
</div>
<script>
    function acceptCookies() {
        document.getElementById('cookiePopup').style.display = 'none';
        document.cookie = "cookiesAccepted=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";
    }

    if (document.cookie.indexOf("cookiesAccepted=true") === -1) {
        document.getElementById('cookiePopup').style.display = 'block';
    }
</script>
<!--cookies logic-->

</body>
<footer class="bg-dark text-light py-4">
    <div class="container" style="margin-left: 0">
        <div class="row">
            <div class="col-md-4 footer-column">
                <h4>Stay in touch</h4>
                <div class="address">
                    <address>
                        <a href="tel:+4077123456">Call us</a>
                        <a href="mailto:proiectproiect61@gmail.com">Email us</a>
                        <a href="skype:proiectproiect?chat">24/7 assistance (via Skype)</a>
                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.8843011393105!2d26.097011775875163!3d44.43553547107589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff472f47f047%3A0x493984726f0235f9!2sFaculty%20of%20Mathematics%20and%20Computer%20Science!5e0!3m2!1sen!2sro!4v1682778737477!5m2!1sen!2sro"
                           target="_blank">
                            Meet us @ Academy street no. 14, Bucharest
                        </a>
                    </address>
                </div>
            </div>

            <div class="col-md-4 footer-column">
                <h4>Privacy Policy</h4>
                <ul style="color: white; font-weight: bold;">
                    <li>Who we are</a></li>
                    <li>Media</a></li>
                    <li>Cookies</a></li>
                    <li>Your data</a></li>
                </ul>
            </div>

            <div class="col-md-4 footer-column">
                <h4>We are social</h4>
                <ul class="social-icons" style="color:#9d9d9d;">
                    <li>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-square fa-2x"style="color:cornflowerblue;" ></i> <span style="color:white;">@DetailsEvents</span></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x" style="color:pink;"></i> <span style="color:white;" >@detailsevents</span></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/"><i class="fab fa-twitter-square fa-2x"style="color:green;"></i><span style="color:white;"> @de2024</span></a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="row" style="color: white; font-weight: bold; padding-top: 10px">
            <div class="col-md-6">
                <div class="footer-info">
                    <a href="#" style="color:black;"><span style="border: 1px solid black; padding:2px"><i class="fas fa-arrow-up"></i>Scroll up</span></a>
                    <small style="color:black; border: 1px solid black; padding:2px">Copyright 2024 &copy; DETAILS, <time datetime="2024-01-20">20 January 2024 - This is a school project. </time></small>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>