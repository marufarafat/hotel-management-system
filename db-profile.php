<?php 
$title = "Profile";
include_once 'partials/header.php'; 

// checking condition form using csrf protection
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["complete-profile"]) && isset($_POST["csrf"]) && $_POST["csrf"] === \Hotel\CSRF::get("complete-profile")) {



    // setting conditiion for input field
    $v = new Valitron\Validator($_POST);
    $v->rule('required', array("full_name", "phone", "address1", "address2","city", "postcode", "gender"));

    $ppic = $misc->imageProcess($_FILES['profile-picture']);
    
    // checking if have error
    if (!$v->validate()) {
        $misc->setMessages($v->errors());
    } elseif (!$ppic){
        $misc->setMessages("Please select profile picture.");
    } else {
        $user = \Hotel\Models\Users::find($auth->getUserId());
        $user->full_name = $_POST["full_name"];
        $user->username = $_POST["username"];
        $user->email = $_POST["email"];
        $user->phone = $_POST["phone"];
        $user->profile_picture = $ppic;
        $user->gender = $_POST["gender"];
        $user->address1 = $_POST["address1"];
        $user->address2 = $_POST["address2"];
        $user->city = $_POST["city"];
        $user->postcode = $_POST["postcode"];
        if ($user->save()) {
            header("location: db-profile.php");
        }
    }
}
?>
		<!--DASHBOARD SECTION-->
		<div class="dashboard">
            <?php include_once 'partials/db-left.php'; ?>
			<div class="db-cent">
				<div class="db-cent-1">
					<p>Hi <?php echo $auth->getUsername(); ?>,</p>
					<h4>Welcome to your dashboard</h4> </div>
				<div class="db-profile"> <img src="<?php echo $user["profile_picture"];  ?>" alt="">
					<h4><?php echo $auth->getUsername(); ?></h4>
                    <p><?php echo $user["address1"];  ?></p>
					<p><?php echo $user["address2"];  ?></p>
				</div>
				<div class="db-profile-view">
					<table>
						<thead>
							<tr>
								<th>Join Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
                                <td><?php echo date('m/d/Y', $user["registered"]); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="db-profile-edit">
                    <form class="col s12" method="post" action="" enctype="multipart/form-data">



                                <?php 
                                echo "<pre>";
                                var_dump($misc->getMessages());
                                echo "</pre>";
                                 ?>


                        <div>
                            <label class="col s4">Full name</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["full_name"]; ?>" name="full_name" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Username</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["username"]; ?>" name="username" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Email</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["email"]; ?>" name="email" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Phone</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["phone"]; ?>" name="phone" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Gender</label>
                            <div class="input-field col s8">
                                <select name="gender" id="">
                                    <option value="other">Other</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="file" name="profile-picture" size="32" > 
                            </div>
                        </div>
                        <div>
                            <label class="col s4">Address Line 1</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["address1"]; ?>" name="address1" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Address Line 2</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["address2"]; ?>" name="address2" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">City</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["city"]; ?>" name="city" class="validate"> </div>
                        </div>
                        <div>
                            <label class="col s4">Postcode</label>
                            <div class="input-field col s8">
                                <input type="text" value="<?php echo $user["postcode"]; ?>" name="postcode" class="validate"> </div>
                        </div>
                        <div>
                            <div class="input-field col s8">
                                <input type="submit" value="Submit" name="complete-profile" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
                        </div>
        <input type="hidden" name="csrf" value="<?php echo \Hotel\CSRF::generate("complete-profile"); ?>">
                    </form>
				</div>
			</div>
		</div>
		<!--END DASHBOARD SECTION-->
<?php include_once 'partials/footer.php'; ?>