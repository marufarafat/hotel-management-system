
                        <div class="dex_confirmation_area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="confirm_header">
                                        <h2>Confirmation</h2>
                                        <p>Please check information exactly and if you find any mistakes please contact us</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="user_info">
                                        <h3>User information</h3>
                                        <table>
                                            <tr>
                                                <td class="key">Full Name: </td>
                                                <td><?php echo $user["full_name"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="key">Email: </td>
                                                <td><?php echo $user["email"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="key">Phone: </td>
                                                <td><?php echo $user["phone"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="key">Address:</td>
                                                <td><?php echo $user["address1"] . " "; echo $user["city"] . "  "; echo $user["postcode"]; ?></td>
                                            </tr>
                                        </table>
                                        <?php if (isset($_SESSION['booking_description'])) { ?>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td class="key">Special Requirements: </td>
                                                <td><?php echo $_SESSION['booking_description']; ?></td>
                                            </tr>
                                        </table>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12"></div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="purchase_info">
                                        <h3>Purchese Information</h3>
                                        <table>
                                            <tr>
                                                <td>Arrival Date: </td>
                                                <td class="value"><?php echo current($bookingDate); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Departure Date: </td>
                                                <td class="value"><?php echo end($bookingDate); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cabin: </td>
                                                <td class="value"><?php echo $cabin["name"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Adult: </td>
                                                <td class="value">2</td>
                                            </tr>
                                            <tr>
                                                <td>Children: </td>
                                                <td class="value">2</td>
                                            </tr>
                                            <tr>
                                                <td>Cabin Type: </td>
                                                <td class="value"><?php  echo $cabinType["name"]; ?></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <table>
                                            <tr>
                                                <td>TOTAL: </td>
                                                <td class="value"><?php  echo $defCurrency; ?></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="confirm_button">
                                        <a class="btn waves-effect waves-light btn-lg btn-primary btn-lg btn-block" href="booking.php?cabinid=<?php echo $_SESSION["cabinid"]; ?>">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="confirm_button">
                                        <a class="btn waves-effect waves-light btn-lg btn-primary btn-lg btn-block" href="confirm.php?confirm=true&&csrf=<?php echo \Hotel\CSRF::generate("confirm"); ?>">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>