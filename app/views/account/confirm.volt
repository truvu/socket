{% extends 'layout/account.volt' %}
{% block title %} Confirm account {% endblock %}
{% block form %}
<form action="/account/confirm" method="POST" name="account_confirm" role="form">
	<div class="error">{% if error_confirm is defined %}{{error_confirm}}{% endif %}</div>
	{% if success is empty %}
		<div class="form-group">
			<input type="text" class="form-control" name="email" placeholder="Your email"/>
			<div class="error">{{error['email']}}</div>
		</div>
	{% endif %}
	<div class="form-group">
		<input type="text" class="form-control" name="code" placeholder="Confirm code"/>
		<div class="error">{{error['code']}}</div>
	</div>
	<div class="clearfix">
		<div class="pull-right">
			<input type="submit" name="confirm" value="Confirm" class="btn btn-primary">
		</div>
	</div>
</form>
{% endblock %}