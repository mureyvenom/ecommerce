<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="dist/js/jquery.3.4.1.min.js"></script>
	
	
</head>

<body>
	
	
	<input id="file" type="file">
	
	<button type="button" id="upload">Upload file</button>
	
	
<script>

$(document).ready(function(){

    $(document).ready(function(){

    $("#upload").click(function(){
        var fd = new FormData();
        var files = $('#file')[0].files[0];
		var name = "murewa";
        fd.append('file',files);
        fd.append('name',name);

        $.ajax({
            url: 'proc-test.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response  == "success"){
                    alert("uploaded")
                }else{
                    alert(response);
                }
            },
        });
    });
});
});
	
</script>
	
</body>
</html>