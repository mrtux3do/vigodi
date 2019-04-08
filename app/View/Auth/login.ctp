<div class="bread-crumbs">
	<div class="container">
		<div class="row">
			<div id="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/Auth/login">Đăng nhập</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="login">
	<div class="login-page">
		<form method="POST" action="/Auth/login">
			<div class="form-group" style="margin-bottom: 50px">
				<label>Email</label>
				<input type="email" name="data[User][email]" id="email" required placeholder="email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="data[User][password]" id="password" required placeholder="password">
			</div>
			<button type="submit" id="btn-login">Log in</button>
		</form>
	</div>
</div>