<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lon Lott - Pledge</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body ng-app="app" ng-controller="posts">
    <? error_reporting(0) ?>

        <?php include 'includes/navigation.php';?>

            <!-- Page Header -->
            <!-- Set your background image for this header on the line below. -->
            <header class="intro-header" style="background-image: url('img/support-bg-2.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="site-heading">
                                <h1>Pledge your support.</h1>
                                <h2 class="subheading">Add your name below to show you support Lon Lott.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container" ng-hide="submitted">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <p>Pledge your support below.</p>
                        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                        <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                        <form name="showSupport" id="contactForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Message</label>
                                    <textarea rows="5" class="form-control" placeholder="Endorsement (optional)" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-default" ng-click="sendSupport()">Pledge</button>
                                    <span class="caption text-muted" style="display: inline-block;">By clicking "pledge" you agree to have your name and endorsement posted on lonlott.com.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Post Content -->
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="">
                            <h1 ng-show="submitted">Thank you <span style="text-transform: capitalize;">{{name}}</span> for your support.</h1>
                            <hr ng-show="submitted">
                            <h1 style="text-align: center;">Supporters</h1>
                            <div ng-repeat="pledge in data">
                                <h4 style="text-transform: capitalize">{{pledge.name}}</h4>
                                <blockquote ng-if="pledge.comment">{{pledge.comment}}</blockquote>
                            </div>

                            <p style="text-align: center;">Thanks for your support.</p>

                        </div>
                    </div>
                </div>
            </article>

            <hr>

            <?php include './includes/footer.php';?>

                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>

                <!-- Custom Theme JavaScript -->
                <!-- <script src="js/clean-blog.min.js"></script> -->

                <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
                <!-- Firebase CDN -->
                <script src="https://cdn.firebase.com/js/client/2.2.9/firebase.js"></script>
                <script src="https://cdn.firebase.com/libs/angularfire/1.1.2/angularfire.min.js"></script>
                <script src="/js/pledges.js" charset="utf-8"></script>

</body>

</html>
