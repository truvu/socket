{% extends "layout/account.volt" %}
{% block title %} Register a new account {% endblock %}
{% block form %}
<form action="/account/register" method="post" name="account_register" role="form">
	<div class="form-group">
		<input type="text" class="form-control" name="fname" placeholder="First name" max-length="30"/>
		<div class="error">{{error['fname']}}</div>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="lname" placeholder="Surname name" max-length="30"/>
		<div class="error">{{error['lname']}}</div>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="email" placeholder="Email" max-length="100"/>
		<div class="error">{{error['email']}}</div>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" name="pass" placeholder="Password" max-length="100"/>
		<div class="error">{{error['pass']}}</div>
	</div>
	<div class="clearfix">
		<div class="pull-left">
			<label for="ok">
				<input type="checkbox" value="1" name="ok">
				<span>Agree</span>
			</label>
		</div>
		<div class="pull-right">
			<input type="submit" class="btn btn-primary" name="register" value="Register">
		</div>
	</div>
</form>
{% endblock %}