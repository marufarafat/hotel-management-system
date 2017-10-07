            <?php 


// checking login or not
if (!$auth->isLoggedIn()) {
    header("location: login.php");
}

             ?>
            <div class="db-left">
                <div class="db-left-1" style="background: url(<?php echo $user["profile_picture"];  ?>) no-repeat center center;">
                    <h4><?php echo $auth->getUsername(); ?></h4>
                    <p><?php echo $user["address2"];  ?></p>
                </div>
                <div class="db-left-2">
                    <ul>
                        <li>
                            <a href="dashboard.php"><img src="images/icon/db1.png" alt="" /> All</a>
                        </li>
                        <li>
                            <a href="db-booking.php"><img src="images/icon/db2.png" alt="" /> My Bookings</a>
                        </li>
                        <li>
                            <a href="db-new-booking.php"><img src="images/icon/db3.png" alt="" /> New Booking</a>
                        </li>
                        <li>
                            <a href="db-profile.php"><img src="images/icon/db7.png" alt="" /> Profile</a>
                        </li>
                        <li>
                            <a href="db-activity.php"><img src="images/icon/db5.png" alt=""> Activity</a>
                        </li>
                        <li>
                            <a href="#"><img src="images/icon/db6.png" alt="" /> Payments</a>
                        </li>
                        <li>
                            <a href="logout.php"><img src="images/icon/db8.png" alt="" /> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>