module.exports = function(io){
	var table = io.of('/timetable');
	table.on('connection', function(socket){
		socket.on('create', function(item){
			table.emit('create', item);
		});
		socket.on('update', function(item){
			table.emit('update', item);
		});
		socket.on('delete', function(item){
			table.emit('delete', item);
		});
	});
};