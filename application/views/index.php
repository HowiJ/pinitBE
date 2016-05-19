<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">

        <style media="screen">
            input {
                width: 100%;
            }
            .four h5 {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <?php
        // $test = "CLLocationCoordinate2D(latitude: 123.456789, longitude: -123.987.00234)?CLLocationCoordinate2D(latitude: 37.377339962324889, longitude: -121.91228729665251)?CLLocationCoordinate2D(latitude: 37.377369638020127, longitude: -121.91232907647191)?CLLocationCoordinate2D(latitude: 37.377328798296034, longitude: -121.91226145129352)?CLLocationCoordinate2D(latitude: 37.377322179601009, longitude: -121.91235503395197)";
        // var_dump($test);
        ?>

        <div class="row">
            <div class="six columns">
                <!-- ADD USER -->
                <?php if ($this->session->userdata('currUser')): ?>
                    <form action="/addUser" method="POST">
                        <div class="row">
                            <div class="twelve columns">
                                <h3>New User</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>Username: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="username">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                                <input type="submit" value="Add User">
                            </div>
                        </div>
                    </form>
                <!-- End Add User -->
            <?php endif; ?>
                <!-- LOGIN USER -->
                    <?php if (!$this->session->userdata('currUser')): ?>
                        <form action="/checkLogin" method="POST">
                            <div class="row">
                                <div class="twelve columns">
                                    <h3>Login</h3>
                                </div>
                            </div>
                            <div class="row">
                                <label for="username">
                                    <div class="four columns">
                                        <h5>Username: </h5>
                                    </div>
                                    <div class="eight columns">
                                        <input type="text" name="username">
                                    </div>
                                </label>
                            </div>
                            <div class="row">
                                <div class="twelve columns">
                                    <input type="submit" value="Log In">
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>
                    <?php if ($this->session->userdata('currUser')) : ?>
                        <?php var_dump($this->session->userdata('currUser')); ?>
                        <a href="/logoff">Log Off</a>
                    <?php endif; ?>
                <!-- End Login User -->
            </div>

            <div class="six columns">
                <!-- ADD TRIP -->
                <?php if ($this->session->userdata('currUser')): ?>
                    <form action="/addTrips" method="POST">
                        <div class="row">
                            <div class="twelve columns">
                                <h3>New Trip</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>Trip Name: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="tripName">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <label for="password">
                                <div class="four columns">
                                    <h5>Trip Coords: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="tripCoordinate">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>Trip Distance: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="tripDistance">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>Trip Duration: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="tripDuration">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>User Name: </h5>
                                </div>
                                <div class="eight columns">
                                    <?php if ($this->session->userdata('currUser')) : ?>
                                        <?php $username = $this->session->userdata('currUser'); ?>
                                        <?php echo $username[0]['username']; ?>
                                    <?php endif; ?>
                                </div>
                            </label>
                        </div>

                        <div class="row">
                            <div class="twelve columns">
                                <input type="submit" value="Add User">
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <!-- END ADD TRIP -->
            </div>
        </div>
        <!-- End Overall row -->

            <div class="row">
                <div class="six columns">
                        <h1>USERS</h1>
                    <?php if ($this->session->userdata('currUser')): ?>
                        <?php
                            foreach ($users as $key => $value) {
                                echo $value['id'] . ": " . $value['username'] . "<br />";
                            }
                        ?>
                    <?php endif; ?>
                </div>
                <div class="six columns">
                    <h1>TRIPS</h1>
                    <?php var_dump($trips); ?>
                </div>
            </div>

            <?php //Notes for encoding in PHP below: ?>
            <?php //$data = $this->Model->getFn(); ?>
            <?php //$encode_data = json_encode(array("tasks" => $data)) ?>

            <form class="" action="index.html" method="post">

            </form>
        </div>
    </body>
</html>
