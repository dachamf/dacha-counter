<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dachas save the sel</title>
    <link rel="stylesheet" href="../assets/css/foundation.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <!-- For Foundation Icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
</head>
<body>
<!--Headder-->
<header class="header">
    <h1 class="headline">Dachas Save the Sale app <br>
        <small>by Dacha2</small>
    </h1>
    <ul class="header-subnav">
        <li><a href="/home/index" class="is-active"><i class="fi-home"></i> Home</a></li>
        <li><a href="/home/report"> Reports</a></li>
    </ul>

</header>
<!-- End Header -->
<!--Main Content-->



<div class="main-content">
    <form action="">
        <div class="row">
            <div class="large-3 columns">
                <label for="name">Name</label>
                <span class="prefix"><i class="fi-torso"></i></span>
                <input type="text" name="name" id="name">
            </div>
            <div class="large-3 columns">
                <label for="email">E-mail address</label>
                <span class="prefix"><i class="fi-mail"></i></span>
                <input type="email" name="email" id="email">
            </div>
            <div class="large-3 columns">
                <label for="order">Order ID</label>
                <span class="prefix"><i class="fi-shopping-cart"></i></span>
                <input type="number" name="order" id="order">
            </div>
            <div class="large-3 columns">
                <label for="save">Save the sale</label>
                <span class="prefix"><i class="fi-save"></i></span>
                <input type="text" name="save" id="save">
            </div>
            <div class="large12 columns">
                <label for="reason">Reason / Cancel</label>
                <textarea name="reason" id="reason" cols="30" rows="10"></textarea>
            </div>
            <div class="large6 columns">
                <input type="submit" class="button" value="Import">
            </div>
        </div>
    </form>
</div>



<!-- Footer -->

<footer class="footer">

    <div class="row full-width">

        <div class="small-12 medium-12 large-12 columns">

            Code and Design by: <a href="mailto:dachamf@gmail.com"> dacha</a>

        </div>

    </div>

</footer>

<!--Include js files-->
<script src="../assets/js/vendor/jquery.js"></script>
<script src="../assets/js/vendor/what-input.js"></script>
<script src="../assets/js/vendor/foundation.js"></script>
<script src="../assets/js/app.js"></script>
</body>
</html>


