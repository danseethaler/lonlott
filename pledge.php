<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lon Lott 4 Alpine - <?php echo ucfirst(basename($_SERVER["SCRIPT_FILENAME"], ".php")) ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/my.css" media="screen" title="no title" charset="utf-8">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body ng-app="app" ng-controller="posts">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <? error_reporting(0) ?>

        <?php include 'includes/navigation.php';?>

            <!-- Page Header -->
            <!-- Set your background image for this header on the line below. -->
            <header class="intro-header" style="background-image: url('img/support-bg-2.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="site-heading">
                                <h1>Show your support.</h1>
                                <h2 class="subheading">Add your name below to show you support Lon Lott.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container" ng-hide="submitted">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <p>Show your support below.</p>
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
                                    <button type="submit" class="btn btn-default" id="pledge" ng-click="sendSupport()">Support</button>
                                    <span class="caption text-muted" style="display: inline-block;">By clicking "support" you agree to have your name and endorsement posted on lonlott.com.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container" ng-hide="submitted">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <p>Or show your support on social media.
                            <!-- https://developers.facebook.com/docs/plugins/share-button -->
                            <!-- https://dev.twitter.com/web/intents#tweet-intent -->
                            <script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
                            <a style="text-decoration: none;" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.lonlott.com&text=I support Lon Lott for Alpine City Council">
                                <img style="width: 40px; cursor: pointer;" src="/img/twitter.png" alt="" />
                            </a>
                            <span style="vertical-align: top;" class="fb-share-button" data-href="http://www.lonlott.com/pledge.php" data-text="cool" data-layout="button"></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Post Content -->
            <article>
                <a name="thanks"></a>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="">
                            <h1 ng-show="submitted">Thank you
                                <span style="text-transform: capitalize;">{{name}}</span> for your support.</h1>
                            <hr ng-show="submitted">
                            <h1 style="text-align: center;">Supporters</h1>
                            <div class="supporters">
                                <div ng-repeat="pledge in pledges | orderBy:'name'" ng-cloak>
                                    <h4 style="text-transform: capitalize">{{pledge.name}}</h4>
                                    <blockquote ng-if="pledge.comment">{{pledge.comment}}</blockquote>
                                </div>
                            </div>

                            <p style="text-align: center;">Thanks for your support.</p>

                        </div>
                    </div>
                </div>
            </article>

            <hr>

            <?php include 'includes/footer.php';?>

                <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
                <!-- Firebase CDN -->
                <script src="https://cdn.firebase.com/js/client/2.2.9/firebase.js"></script>
                <script src="https://cdn.firebase.com/libs/angularfire/1.1.2/angularfire.min.js"></script>
                <script src="/js/pledges.js" charset="utf-8"></script>

</body>

</html>
