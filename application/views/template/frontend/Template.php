<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <title><?= $_title ?></title>
</head>

<style>
    body {
        position: relative;
    }

    .bg-webapp {
        background-color: #0353A4 !important;
    }

    .text-webapp {
        color: #0353A4 !important;

    }



    /*
        Profil
    */

    .wrapper-container {
        position: relative;
        height: 100%;
    }

    .profil-background {
        max-height: calc(100vh - 50px);
        filter: blur(2px);
    }

    .content-profil {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .45);
        color: white;

    }

    /* FRONT END   
    * HOME & DETAIL 
    *
    */

    .card-khutbah {
        min-height: 40vh;
        max-height: 40vh;
        width: 100%;
        position: relative;
    }

    .card-khutbah img {
        height: 40vh;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 1px #ccc;

    }

    .card-khutbah-content {
        position: absolute;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, .65);
        border-radius: 0px 0px 10px 10px;
        width: 100%;
        color: white;
    }

    /*

    News
    
    */
    .card-news {
        /* min-height: 60vh;
        max-height: 60vh; */
        border-radius: 25px;
    }

    .card-news img {
        min-height: 35vh;
        max-height: 35vh;
    }

    .card-news-detail img {
        min-height: 70vh;
        max-height: 70vh;
    }

    .text-ellipsis {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-clamp: 4;
        -webkit-line-clamp: 4;
        /* number of lines to show */
        -webkit-box-orient: vertical;
    }

    .card-another-news {
        position: relative;

        background-color: red;
        border-radius: 10px;
    }

    .card-another-news img {
        min-height: 40vh;
        max-height: 40vh;
    }

    .card-another-news-title {
        position: absolute;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, .5);
    }
</style>

<?= $_content; ?>




<script>
    $(document).ready(function() {
        // Add scrollspy to <body>
        $('body').scrollspy({
            target: ".navbar",
            offset: 50
        });

        // Add smooth scrolling on all links inside the navbar
        $(".navbar-nav a").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>

</html>