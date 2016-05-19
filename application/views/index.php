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
                        <?php $user = $this->session->userdata('currUser')[0]; ?>
                        <?php //echo $user['id'].": ".$user['username']; ?>
                        <br />
                        <span><?= $user['id']; ?></span>
                        <a href="/logoff" style="float: right; vertical-align:top">Log Off</a>
                        <br /><br /><h1 style="font-size:3em;vertical-align:middle;text-align:center;color:rgba(61, 61, 61, 0.65)"><?= $user['username']; ?></h1>
                    <?php endif; ?>
                <!-- End Login User -->
            </div>
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
                <?php endif; ?>
                <!-- End Add User -->
            </div>
        </div>
        <!-- End of Top User row -->

        <!-- Start of Adding Row -->
        <div class="row">
            <div class="six columns">
                <!-- ADD USER -->
                <?php if ($this->session->userdata('currUser')): ?>
                    <form action="/addPins" method="POST">
                        <div class="row">
                            <div class="twelve columns">
                                <h3>New Pin</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label for="username">
                                <div class="four columns">
                                    <h5>Coordinate: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="coordinate">
                                </div>
                            </label>
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
                            <label for="username">
                                <div class="four columns">
                                    <h5>Note: </h5>
                                </div>
                                <div class="eight columns">
                                    <input type="text" name="note">
                                </div>
                            </label>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                                <input type="submit" value="Add Pin">
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <!-- End Add User -->
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
                                        <input type="hidden" name="userId" value="<?= $username[0]['id']; ?>">
                                        <?php echo $username[0]['username']; ?>
                                    <?php endif; ?>
                                </div>
                            </label>
                        </div>

                        <div class="row">
                            <div class="twelve columns">
                                <input type="submit" value="Add Trip">
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <!-- END ADD TRIP -->
            </div>
        </div>
        <!-- End Overall row -->

            <div class="row">
                <div class="twelve columns">
                        <h1 style="text-align: center">USERS</h1>
                    <?php if ($this->session->userdata('currUser')): ?>
                        <?php foreach ($users as $key => $value) { ?>
                            <?php if ($value['id'] != $this->session->userdata('currUser')[0]['id']): ?>
                                <div class="row" style="border-bottom: 1px solid black; margin-bottom: 1em;">
                                    <div class="six columns">
                                        <span style="float:left; width: auto">
                                            <?= $value['id'] ?>: <?= $value['username'] ?><br />
                                        </span>
                                    </div>
                                    <div class="six columns">
                                        <form style="width: 100%; margin-bottom: 0" action="/deleteUser" method="post">
                                            <input style="height: 0" type="hidden" name="name" value="<?= $value['id']; ?>">
                                            <input style="width: 100%;" type="submit" value="Delete User" style="width: auto; float: right">
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <h1>TRIPS</h1>
                    <?php foreach($trips as $key => $value):?>
                        <span style="font-weight: bold">ID:</span> <span style="float:right"><?php echo $value['id']; ?></span><br />
                        <span style="font-weight: bold">Name:</span> <span style="float:right"><?php echo $value['name']; ?></span><br />
                        <span style="font-weight: bold">Distance:</span> <span style="float:right"><?php echo $value['distance']; ?></span><br />
                        <span style="font-weight: bold">Duration:</span> <span style="float:right"><?php echo $value['duration']; ?></span><br />
                        <span style="font-weight: bold">Trip:</span> <br /><span style=""><?php echo $value['trip']; ?></span>
                        <br /><br />
                        <form action="/deleteTrip" method="post">
                            <input type="hidden" name="idk" value="<?php echo $value['id']; ?>">
                            <input type="submit" value="Delete Trip">
                        </form>
                    <?php endforeach; ?>
                </div>
                <div class="six columns">
                    <h1>Pins</h1>
                    <?php foreach($pins as $key => $value):?>
                        <span style="font-weight: bold">ID:</span> <span style="float:right"><?php echo $value['id']; ?></span><br />
                        <span style="font-weight: bold">Coordinates:</span> <span style="float:right"><?php echo $value['coordinate']; ?></span><br />
                        <span style="font-weight: bold">Note:</span> <span style="float:right"><?php echo $value['note']; ?></span><br />
                        <br /><br />
                        <form action="/deletePin" method="post">
                            <input type="hidden" name="idk" value="<?php echo $value['id']; ?>">
                            <input type="submit" value="Delete Pin">
                        </form>
                    <?php endforeach; ?>
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
