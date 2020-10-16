var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'phpmyadmin',
  password : 'qwe123QWE!@#',
  database : 'chat-db',
  charset: 'utf8mb4'
});

connection.connect(function(err){
 if(!err) {
    console.log("Database connected");
 } 
 else {
    console.log("Error: Cannot connect database "+err.message);
 }
});

var config = {
   //base_path:'E:/NODE JS PPROJECTS/server/uploads/',
   base_url:'http://13.127.108.175/chatapp/uploads',
   connection: connection
}

module.exports = config;
