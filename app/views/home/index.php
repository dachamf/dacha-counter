<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dachas save the sel</title>

    <!-- Google fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--  Material css  -->
    <link rel="stylesheet" href="../assets/css/materialize.min.css">
    <!--  Custom CSS  -->
    <link rel="stylesheet" href="../assets/app.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">Dachas Save the Sale app <br>
            <small>by Dacha2</small></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/home/index" class="is-active"><i class="material-icons">home</i></a></li>
            <li><a href="/home/report"><i class="material-icons">format_list_numbered</i></a></li>
        </ul>
    </div>
</nav>
<!-- End Header -->
<!--Main Content-->


<div class="container content">
    <div class="row">
        <div class="col s12">
            <?php if (isset($data['message'])): ?>
                <div class="card-panel <?php echo $data['message'][1]; ?> radius" id="alertBox">
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="col s4"><span class="white-text"><?php echo $data['message'][0] ?></span></div>
                        <div class="col s4"><i class="material-icons"><?php echo $data['message'][2]?></i></div>
                        <div class="col s2"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <form action="create" >
        <div class="row">
            <div class="col s6 input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="name" id="name" class="validate">
                <label for="name">Name</label>
            </div>
            <div class="col s6 input-field">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" class="validate">
                <label for="email">E-mail address</label>
            </div>
            <div class="col s6 input-field">
                <i class="material-icons prefix">shopping_basket</i>
                <input type="text" name="order" id="order" class="validate">
                <label for="order">Order ID</label>
            </div>
            <div class="col s6 input-field">
                <i class="material-icons prefix">save</i>
                <input type="text" name="save" id="save" class="validate">
                <label for="save">Save the sale</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <label for="reason">Reason / Cancel</label>
                <textarea name="reason" id="reason" cols="30" rows="10" class="materialize-textarea"></textarea>
            </div>
            <div class="col s6">
                <input type="submit" class="waves-effect waves-light btn z-depth-5" value="Import">
            </div>
<!--            <div class="col s6">-->
<!--                <input type="date" class="datepicker">-->
<!--            </div>-->
        </div>
    </form>
</div>


<!-- Footer -->

<footer class="page-footer z-depth-5">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">Coded and designed by: <a href="mailto:dachamf@gmail.com">dacha</a> </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/home/index">Home</a></li>
                    <li><a class="grey-text text-lighten-3" href="/home/report">Reports</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2016 All rights reserved
            <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/dalibor.djordjevic" target="_blank">Contact me <i class="material-icons">tag_faces</i></a>
        </div>
    </div>
</footer>

<!--Include js files-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script type="text/javascript" src="../assets/app.js"></script>
</body>
</html>


