var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.psubscribe('gotham-*', function(){
    console.log('Redis (Cache Server) is subscribed to the following channel: All Channels ');
});



redis.on('pmessage', function(channel, pattern, message){
     message = JSON.parse(message);
     
    console.log(channel, message.event, message.data);
    //console.log('Received message \'%s\' from channel \'%s\'', message, channel);
    io.emit( pattern +':' + message.event, message);
});

server.listen(8081, function (){
    console.log('Server is listining on port 8081');
});