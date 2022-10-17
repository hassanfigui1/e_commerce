<!-- Footer -->
<footer style="background-color:black;">
        <div class="container">
            <div class="row main-footer">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="main-footer-info">
                        <img src="./assets/images/quest.png" alt="Logo" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="main-footer-quicklinks">
                        <h1 style="color:white;">Soyez le bienvenue !</h1>
						<p>Administrateur de base de données </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-flex justify-content-between align-items-center">
                        <div class="copyright-text order-2 order-lg-1">
                            <p>&copy; 2022. Design and Developed by <a href="./admin/copyright.php">Hassan Figuigui </a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="./asset_user/src/js/jquery.min.js"></script>
    <script src="./asset_user/src/js/bootstrap.min.js"></script>
    <script src="./asset_user/src/scss/vendors/plugin/js/slick.min.js"></script>
    <script src="./asset_user/src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
    <script src="./asset_user/dist/main.js"></script>
    <script>
        function openNav() {

            document.getElementById("mySidenav").style.width = "350px";
            $('#overlayy').addClass("active");
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#overlayy').removeClass("active");
        }
    </script>
</body>
</html>