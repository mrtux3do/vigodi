<div class="container-fluid">
	<div class="row">
		<div id="container">
			<div class="register">
				<div id="sidebar-left" class="col-lg-3">
					<ul>
						<li>Account</li>
						<li><a href="#">Register</a></li>
						<li><a href="#">Forgotten Password</a></li>
						<li><a href="#">Address Book</a></li>
						<li><a href="#">Wish List</a></li>
						<li><a href="#">Order History</a></li>
						<li><a href="#">Downloads</a></li>
						<li><a href="#">Recurring Payments</a></li>
						<li><a href="#">Reward Points</a></li>
						<li><a href="#">Returns</a></li>
					</ul>
				</div>

				<div class="col-lg-9" id="register-form">
					<div id="breadcrumbs">
						<ul>
							<li>Home</li>
							<li>My Account</li>
							<li>Register</li>
						</ul>
					</div>

					<div class="reg-form">
                        <form method="POST", action="">
                            <div class="form-group">
                                <label class="required">First Name</label>
                                <input type="text" name="first-name" required placeholder="First name">
                            </div>
                            <div class="form-group">
                                <label class="required">Last Name</label>
                                <input type="text" name="last-name" required placeholder="Last name">
                            </div>
                            <div class="form-group">
                                <label class="required">Email</label>
                                <input type="e-mail" name="e-mail" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="required">Phone Number</label>
                                <input type="number" name="phone-number" required placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="required">Password</label>
                                <input type="password" name="password" required placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="required">Re-Password</label>
                                <input type="password" name="re-password" required placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label class="required">Gender</label>
                                <label class="gender">Male</label>
                                <input type="radio" name="gender" value="Male">
                                <label class="gender">Female</label>
                                <input type="radio" name="gender" value="Female">
                                <label class="gender">Other</label>
                                <input type="radio" name="gender" value="Other">
                            </div>
                            <div class="form-group">
                                <label class="required">Date of birth</label>
                                <select class="opt-day" name="day">
                                    <option>Ngày</option>
                                    <?php foreach(range(1, 31) as $day): ?>
                                        <option><?php echo $day ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="opt-month" name="month">
                                    <option>Tháng</option>
                                    <?php foreach(range(1, 12) as $month): ?>
                                        <option><?php echo $month ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="opt-year" name="year">
                                    <option>Năm</option>
                                    <?php foreach(range(date('Y'), 1900) as $year): ?>
                                        <option><?php echo $year ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 50%">
                                <button type="submit" class="btn-register">Register</button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 