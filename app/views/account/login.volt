{% extends "layout/account.volt" %}

{% block title %} Login Page {% endblock %}

{% block form %}
<form action="/account/login" method="POST" name="account_login" role="form">
	<div class="form-group">
		<input type="text" name="email" class="form-control" placeholder="Email or username" value="{{email}}"/>
		<div class="error" for="email">{{error['email']}}</div>
	</div>
    <div class="form-group">
    	<input type="password" name="pass" class="form-control" placeholder="Your password" />
		<div class="error" for="pass">{{error['pass']}}</div>
    </div>
    <div class="clearfix">
    	<div class="pull-left">
    		<label for="remember">
    			<input type="checkbox" value="1" name="remember">
    		 	<span>Remember me</span>
    		</label>
    	</div>
    	<div class="pull-right">
    		<input type="submit" name="login" class="btn btn-primary" value="Login"/>
    	</div>
    </div>
</form>
{% endblock %}