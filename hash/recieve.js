io.sockets.on('connection', function(socket){
  
  var delivery = dl.listen(socket);
  delivery.on('receive.success',function(file){
		
    fs.writeFile(file.name, file.buffer, function(err){
      if(err){
        console.log('File could not be saved: ' + err);
      }else{
        console.log('File ' + file.name + " saved");
      };
    });
  });	
});