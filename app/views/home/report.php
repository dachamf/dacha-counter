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
            <small>by Dacha2</small>
        </a>
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
        <div class="col s2"></div>
        <div class="col s8">
            <?php if (isset($data['message'])): ?>
                <div class="card-panel <?php echo $data['message'][1]; ?> radius" id="alertBox">
                    <div class="row">
                        <div class="col s8"><span class="white-text info"><?php echo $data['message'][0] ?> <?php echo $data['message'][3] ?></span></div>
                        <div class="col s4"><i class="medium material-icons white-text"><?php echo $data['message'][2]?></i></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col s2"></div>
    </div>
    <form action="report" method="get">
        <div class="row">
            <div class="col s6">
                <label for="from">FROM</label>
                <input type="date" class="datepicker" id="from" name="from">
            </div>
            <div class="col s6">
                <label for="to">TO</label>
                <input type="date" class="datepicker" id="to" name="to">
            </div>
            <div class="col s6">
                <input type="submit" class="waves-effect waves-light btn z-depth-5" value="Get Report">
            </div>
        </div>
    </form>
    <?php if (isset($data['sales'])): ?>
        <form action="exporttoecell" method="post">
            <div class="row">
                <div class="large12 columns">
                    <table class="striped z-depth-1">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Order Id</th>
                            <th>Save Sale</th>
                            <th>Reason</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['sales'] as $sale): ?>
                            <tr>
                                <td><?php echo $sale->name; ?>
                                    <input type="hidden" value='<?php echo $sale; ?>' name="<?php echo $sale->id; ?>">
                                </td>
                                <td><?php echo $sale->email; ?></td>
                                <td><?php echo $sale->orderId; ?></td>
                                <td><?php echo $sale->saveSale; ?></td>
                                <td><?php echo $sale->reason; ?></td>
                                <td><?php echo $sale->created_at; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col s6 padding">
                    <input type="submit" class="waves-effect waves-light btn z-depth-5" value="Get excel file">
                </div>
            </div>

            <!--        --><?php //foreach ($data['sales'] as $sale): ?>
            <!--            <input type="hidden" value="--><?php //echo $sale->id; ?><!--" name="-->
            <?php //echo $sale->id; ?><!--">-->
            <!--            --><?php //?>
            <!--        --><?php //endforeach; ?>

        </form>
    <?php endif; ?>
</div>


<!-- Footer -->

<footer class="page-footer z-depth-5">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">Coded and designed by: <a href="mailto:dachamf@gmail.com">dacha</a>
                </p>
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
            <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/dalibor.djordjevic" target="_blank">Contact me <i
                        class="material-icons">tag_faces</i></a>
        </div>
    </div>
</footer>

<!--Include js files-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
<script type="text/javascript" src="../assets/app.js"></script>
</body>
</html>


