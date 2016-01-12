var express = require('express');
var socketio = require('socket.io');
var http = require('http');
var app = express();
var server = http.createServer(app);
var io = socketio.listen(server);
var socket = function(a) {
	return require(__dirname+'/socket/'+a)(io);
};
socket('timetable');
server.listen(3000);