<?php 
$title = "Profile";
include_once 'partials/header.php'; ?>
		<!--DASHBOARD SECTION-->
		<div class="dashboard">
            <?php include_once 'partials/db-left.php'; ?>
			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi Jana Novakova,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-profile"> <img src="images/user.jpg" alt="">
					<h4>Angelina Jolie</h4>
					<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
				</div>
				<div class="db-profile-view">
					<table>
						<thead>
							<tr>
								<th>Age</th>
								<th>Profile Completion</th>
								<th>Join Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>32</td>
								<td>90%</td>
								<td>May 2010</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="db-profile-edit">
					<form class="col s12">
						<div>
							<label class="col s4">Full Name</label>
							<div class="input-field col s8">
								<input type="text" value="Jana Novakova" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Email id</label>
							<div class="input-field col s8">
								<input type="email" value="jana-novakova@gmail.com" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Phone</label>
							<div class="input-field col s8">
								<input type="number" value="0185419635" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Age</label>
							<div class="input-field col s8">
								<input type="number" value="34" class="validate"> </div>
						</div>
						<div>
							<div class="file-field input-field">
								<div class="btn" id="pro-file-upload"> <span>File</span>
									<input type="file"> </div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text" placeholder="Upload profile picture"> </div>
							</div>
						</div>
						<div>
							<label class="col s4">Address Line 1</label>
							<div class="input-field col s8">
								<input type="text" value="28800 Orchard Lake Road" class="validate"> </div>
						</div>
						<div>
							<label class="col s4">Address Line 2</label>
							<div class="input-field col s8">
								<input type="text" value="Suite 180 Farmington Hills, U.S.A" class="validate"> </div>
						</div>
						<div>
							<div class="input-field col s8">
								<input type="submit" value="Submit" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--END DASHBOARD SECTION-->
<?php include_once 'partials/footer.php'; ?>