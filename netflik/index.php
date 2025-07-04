<?php
session_start();

// Jika sesi pengguna belum ada, arahkan ke depan.php
if (!isset($_SESSION['pengguna'])) {
    header("Location: depan.php");
    exit();
}
?>




<?php include ('header.php');?>

<body>

    <!-- NAV -->
    <?php include ('nav.php'); ?>
    <!-- END NAV -->

    <!-- HERO SECTION -->
    <?php include ('content.php'); ?>
    <!-- END HERO SECTION -->

    <!-- LATEST MOVIES SECTION -->
    <?php include ('movies.php'); ?>
    <!-- END LATEST MOVIES SECTION -->

    <!-- LATEST SERIES SECTION -->
    <?php include ('series.php'); ?>
    <!-- END LATEST SERIES SECTION -->

    <!-- LATEST CARTOONS SECTION -->
    <?php include ('cartoons.php'); ?>
    <!-- END LATEST CARTOONS SECTION -->

    <!-- FOOTER SECTION -->
    <?php include ('footer.php'); ?>
    <!-- END FOOTER SECTION -->

    <!-- COPYRIGHT SECTION -->
    <!-- END COPYRIGHT SECTION -->

    


    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <!-- APP SCRIPT -->
    <script src="app.js"></script>

    

</body>

</html>