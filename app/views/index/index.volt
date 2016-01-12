{% extends "layout/index.volt" %}
{% block title %} Home Page {% endblock %}
{% block content %}
<h4>Time table</h4>
{% if list is empty %}
	<div>
		You have no item. Now <a href="#" id="time-table-create">create an item</a> here?
	</div>
	<table class="table table-bordered" id="table-list" style="display:none;">
		<tr>
			<td style="width:20%;">Date</td>
			<td style="width:40%;">Content</td>
			<td style="width:20%;">Status</td>
			<td colspan="2" style="width:20%;">action</td>
		</tr>
		<tr id="time-table-create-table" class="hidden">
			<td contenteditable data-name="date">mm-dd-yyyy hh:ii:ss:00</td>
			<td contenteditable data-name="content">Shopping</td>
			<td></td>
			<td class="btn btn-default btn-sm text-center" style="width:100%; height:36px; border-radius:0px; border:0;" colspan="1" id="table-add-item">add</td>
		</tr>
	</table>
{% else %}
	<div>
		<a href="#" id="time-table-create">Create an item</a> here?
	</div>
	<table class="table table-bordered" id="table-list">
		<tr>
			<td style="width:20%;">Date</td>
			<td style="width:40%;">Content</td>
			<td style="width:20%;">Status</td>
			<td style="width:20%;" colspan="2">action</td>
		</tr>
		<tr id="time-table-create-table" class="hidden">
			<td contenteditable data-name="date">mm-dd-yyyy hh:ii:ss</td>
			<td contenteditable data-name="content">Shopping</td>
			<td></td>
			<td class="btn btn-default btn-sm text-center" style="width:100%; height:36px; border-radius:0px; border:0;" colspan="1" id="table-add-item">add</td>
		</tr>
		{% set now = time() %}
		{% for item in list %}
		<tr data-id="{{item.id}}" data-user="{{item.user}}">
			<td contenteditable data-name="date" type="date">{{item.text_time}}</td>
			<td contenteditable data-name="content">{{item.content}}</td>
			<td data-name="status">
				{% if now==item.created %} 
					in comming
				{% elseif now<item.created %}
					on going
				{% else %} 
					passed 
				{% endif %}
			</td>
			<td class="text-center">
				<a href="/timetable/edit/{{item.id}}" class="btn-edit">Update</a>
			</td>
			<td class="text-center">
				<a href="/timetable/delete/{{item.id}}" class="btn-delete">Delete</a>
			</td>
		</tr>
		{% endfor %}
	</table>
{% endif %}
{% endblock %}