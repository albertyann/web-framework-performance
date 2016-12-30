var express = require('express');
var mongo = require('mongodb');
var app = express();

var MongoClient = mongo.MongoClient
  , assert = require('assert');

var mongo_con = null;

// Connection URL
var url = 'mongodb://localhost:27017/yann';

var findDocuments = function(db, callback) {
  // Get the documents collection
  var collection = db.collection('yuntao');
  // Find some documents
  collection.find({name: 'pong'}).toArray(function(err, docs) {
    assert.equal(err, null);
    // console.log("Found the following records");
    // console.log(docs)
    callback(docs);
  });
}

MongoClient.connect(url, function(err, db) {
	assert.equal(null, err);
	console.log("Connected correctly to server");
	mongo_con = db;
	
});

app.get('/', function (req, res) {
	//res.send('pong');
	findDocuments(mongo_con, function(docs) {
		res.send(docs[0].name);
		//mongo_con.close();
	});
});

var server = app.listen(3000, function () {
	var host = server.address().address;
	var port = server.address().port;

	console.log('Example app listening at http://%s:%s', host, port);
});
