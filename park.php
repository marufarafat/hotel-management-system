<?php 
$title = "Parks";
include_once 'partials/header.php'; ?>
        <!--TOP BANNER-->
        <div class="inn-banner">
            <div class="container">
                <div class="row">
                    <h4><?php echo $title; ?></h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><?php echo $title; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TOP SECTION-->
        <div class="inn-body-section pad-bot-55">
            <div class="container">
                <div class="row">
                    <div class="page-head">
                        <h2>Lorem ipsum</h2>
                        <div class="head-title">
                            <div class="hl-1"></div>
                            <div class="hl-2"></div>
                            <div class="hl-3"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="row">
                    <center>
                        <h4>Park Oppening time and closing time</h4>
                        <p>Oppning Time: 8AM</p>
                        <p>Clossing Time: 5PM</p>
                    </center>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div id="calendar"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--TOP SECTION-->




        <!--TOP SECTION-->
        <?php include_once 'partials/static-footer.php'; ?>       
    </section>
    <!--END HEADER SECTION-->
    <footer class="site-footer clearfix">
        <div class="sidebar-container">
            <div class="sidebar-inner">
                <div class="widget-area clearfix">
                    <div class="widget widget_azh_widget">
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 foot-logo"> <img src="images/logo1.png" alt="logo">
                                        <p class="hasimg">Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
                                        <p class="hasimg">The top-rated hotel booking services.</p>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <h4>Support &amp; Help</h4>
                                        <ul class="two-columns">
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="rooms.php">Booking</a></li>
                                            <li><a href="registration.php">Registration</a></li>
                                            <li><a href="contact-us.php">Contact Us</a></li>
                                            <li><a href="about-us.php">About Us</a></li>
                                            <li><a href="forum.php">Forum</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <h4>Address</h4>
                                        <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
                                        <p> <span class="foot-phone">Phone: </span> <span class="foot-phone">+880 1XXX - XXXXXX</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="foot-sec2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-5"></div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Payment Options</h4>
                                        <p class="hasimg"> <img src="images/payment.png" alt="payment"> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .widget-area -->
            </div>
            <!-- .sidebar-inner -->
        </div>
        <!-- #quaternary -->
    </footer>
    <section class="copy">
        <div class="container">
            <p>Copyrights © <?php echo date("Y"); ?> Maruf Arafat &nbsp;&nbsp;All rights reserved. </p>
        </div>
    </section>
    <?php include_once 'partials/modal.php'; ?>
    <!--ALL SCRIPT FILES-->
    <script src="js/moment.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/materialize.min.js" type="text/javascript"></script>
    <script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
    <script src="js/fullcalendar.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultDate: '2017-10-12',
            navLinks: true, // can click day/week names to navigate views
            businessHours: true, // display business hours
            editable: true,
            events: [

            //     {
            //         title: 'Business Lunch',
            //         start: '2017-10-03T13:00:00',
            //         constraint: 'businessHours',
            //         constraint: 'availableForMeeting', // defined below
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2017-10-13T11:00:00',
            //         color: '#257e4a'
            //     },
            //     {
            //         title: 'Conference',
            //         start: '2017-10-18',
            //         end: '2017-10-20'
            //     },
            //     {
            //         title: 'Party',
            //         start: '2017-10-29T20:00:00'
            //     },

            //     // areas where "Meeting" must be dropped
            //     {
            //         id: 'availableForMeeting',
            //         start: '2017-10-11T10:00:00',
            //         end: '2017-10-11T16:00:00',
            //         rendering: 'background'
            //     },
            //     {
            //         id: 'availableForMeeting',
            //         start: '2017-10-13T10:00:00',
            //         end: '2017-10-13T16:00:00',
            //         rendering: 'background'
            //     },

            //     // red areas where no events can be dropped
            //     {
            //         start: '2017-10-24',
            //         end: '2017-10-28',
            //         overlap: false,
            //         rendering: 'background',
            //         color: '#ff9f89'
            //     },
                {
                    title: 'Conference $200 discount',
                    start: '2017-10-06',
                    end: '2017-10-08',
                    overlap: false,
                    color: '#257e4a'
                }
            ]
        });
        
    });

</script>
    <script src="js/custom.js"></script>
</body>
</html>