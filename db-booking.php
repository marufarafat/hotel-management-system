<?php 
$title = "Booking";
include_once 'partials/header.php'; ?>
		<!--DASHBOARD SECTION-->
		<div class="dashboard">
            <?php include_once 'partials/db-left.php'; ?>
			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-cent-3">
					<div class="db-cent-table db-com-table">
						<div class="db-title">
							<h3><img src="images/icon/dbc5.png" alt=""/> My Bookings</h3>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
						</div>
						<table class="bordered responsive-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Phone</th>
									<th>City</th>
									<th>Arrival</th>
									<th>Departure</th>
									<th>Members</th>
									<th>Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>01</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>02</td>
									<td>Liam</td>
									<td>+01 2484 6521</td>
									<td><span class="db-tab-hi">Bangalore,</span>India</td>
									<td>18apr</td>
									<td>24apr</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>03</td>
									<td>Logan</td>
									<td>+01 6524 6521</td>
									<td><span class="db-tab-hi">Los Angeles,</span>USA</td>
									<td>05dec</td>
									<td>12dec</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>04</td>
									<td>Michael</td>
									<td>+01 3652 1425</td>
									<td><span class="db-tab-hi">Bristol,</span>UK</td>
									<td>14jen</td>
									<td>24jen</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>05</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>06</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>07</td>
									<td>Liam</td>
									<td>+01 2484 6521</td>
									<td><span class="db-tab-hi">Bangalore,</span>India</td>
									<td>18apr</td>
									<td>24apr</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
								<tr>
									<td>08</td>
									<td>Logan</td>
									<td>+01 6524 6521</td>
									<td><span class="db-tab-hi">Los Angeles,</span>USA</td>
									<td>05dec</td>
									<td>12dec</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>09</td>
									<td>Michael</td>
									<td>+01 3652 1425</td>
									<td><span class="db-tab-hi">Bristol,</span>UK</td>
									<td>14jen</td>
									<td>24jen</td>
									<td>12</td>
									<td><a href="#" class="db-not-success">Pending</a>
									</td>
								</tr>
								<tr>
									<td>10</td>
									<td>Alvin</td>
									<td>+01 4215 3521</td>
									<td><span class="db-tab-hi">New york,</span>USA</td>
									<td>12may</td>
									<td>20may</td>
									<td>12</td>
									<td><a href="#" class="db-success">Success</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="db-pagi">
						<ul class="pagination">
							<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a>
							</li>
							<li class="active"><a href="#!">1</a>
							</li>
							<li class="waves-effect"><a href="#!">2</a>
							</li>
							<li class="waves-effect"><a href="#!">3</a>
							</li>
							<li class="waves-effect"><a href="#!">4</a>
							</li>
							<li class="waves-effect"><a href="#!">5</a>
							</li>
							<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--END DASHBOARD SECTION-->
<?php include_once 'partials/footer.php'; ?>