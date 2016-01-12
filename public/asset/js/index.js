var socket = io.connect('http://localhost:3000/timetable');
var table_list = $("#table-list");
var user_id = table_list.attr('user');
socket.on('create', function(response){
	if("string"==typeof response) response = JSON.parse(response);
	if(response.user==user_id){
		var html = '<tr data-id="'+response.id+'" data-user="'+response.user+'">';
		html+= '<td contenteditable data-name="date">'+response.text_time+'</td>';
		html+= '<td contenteditable data-name="content">'+response.content+'</td>';
		html+= '<td data-name="status">'+response.status+'</td>';
		html+= '<td class="text-center">';
		html+= '<a href="/timetable/edit/'+response.id+'" class="btn-edit">Update</a>';
		html+= '</td>';
		html+= '<td class="text-center">';
		html+= '<a href="/timetable/delete/'+response.id+'" class="btn-delete">Delete</a>';
		html+= '</tr>';
		$(html).insertAfter('#time-table-create-table');
	}
});
socket.on('update', function(a){
	var table = document.getElementById('table-list').querySelector('tbody');
	var dom = $(table).children('tr[data-id="'+a.id+'"]');
	dom.children('[data-name="status"]').html(a.status);
	dom.children('[data-name="content"]').html(a.content);
	dom.children('[data-name="date"]').html(a.date);
});
socket.on('delete', function(a){
	var table = document.getElementById('table-list').querySelector('tbody');
	$(table).children('tr[data-id="'+a+'"]').remove();
});
jQuery(document).ready(function($) {
	var table = $("#time-table-create-table");
	var list = $("#table-list");
	var checkDate = function(date){
		var d = new Date(date);
		if(d=='Invalid Date') return false;
		else return true;
	};
	$("#time-table-create").click(function(event) {
		event.preventDefault();

		if(list.attr("style")) list.removeAttr("style");

		var link = $(this);
		if(table.hasClass('hidden')) {
			table.removeClass('hidden');
			link.html('Hidden form');
		}else{
			table.addClass('hidden');
			link.html('create an item');
		}
	});
	$("#table-add-item").click(function(event) {
		var date = table.children('[data-name="date"]');
		var content = table.children('[data-name="content"]');
		var data = {
			date: date.html(),
			content: content.html()
		};
		var d=checkDate(data.date);
		if(d){
			$.post('/timetable/create', data, function(response) {
				if(response) socket.emit('create', response);
				date.html('');
				content.html('');
			});
		}
	});
	list.on('click', '.btn-edit', function(event) {
		event.preventDefault();
		var form = $(this).parent().parent();
		var date = form.children('[data-name="date"]');
		var content = form.children('[data-name="content"]');
		var status = form.children('[data-name="status"]');
		var data = {
			date: date.html(),
			content: content.html()
		};
		var d = checkDate(data.date);
		if(d){
			$.post($(this).attr('href'), data, function(response){
				if(response) {
					data.id = form.data('id');
					data.status = response;
					socket.emit('update', data);
				}
			});
		}else alert('Date must be formated dd-mm-yyyy h:i:s');
	});
	$(document).on('click', '.btn-delete', function(event) {
		event.preventDefault();
		socket.emit('delete', $(this).parent().parent().data('id'));
		$.post($(this).attr('href'));
	});
});