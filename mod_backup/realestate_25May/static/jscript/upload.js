// JavaScript Document
$(function(){
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: 'module/realestate/include/component/ajax/upload-file.php',
		name: 'uploadfile',
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				//status.text('Only JPG, PNG or GIF files are allowed');
				alert("Only JPG, PNG or GIF files are allowed");
				return false;
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			
			var d = new Date();
			var time=d.getMilliseconds();
			file1="'"+time+"'";
			file2="'"+file+"'";
			
			//Add uploaded file to list
			if(response==="success")
			{
				//$('<li></li>').appendTo('#files').html('<img width=20 height=20 src="./uploads/'+file+'" alt="" /><br />'+file).addClass('success');
				$('<li id='+file1+'></li>').appendTo('#files').html('<div style="width:60px; height:60px;"><div class="cross" onClick="deleteImg('+file1+','+file2+');"></div><img width=60 height=60 src="module/realestate/static/image/upload/'+file+'" alt="" /></div>').addClass('success');
				if(document.getElementById("images").value != '')
				{
					document.getElementById("images").value = document.getElementById("images").value+','+file;
				}
				else
				{
					document.getElementById("images").value = file;
				}
			} 
			else
			{
				$('<li></li>').appendTo('#files').text(file).addClass('error');
			}
		}
	});
	
});






function deleteImg(file1, file2)
{
	if(confirm("Do You Want to Remove This Picture"))
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				$("#"+file1).remove();
				var str=document.getElementById('images').value;
				if(str.indexOf(file2+',')>0)
					document.getElementById('images').value=str.replace(file2+',',"");
				else
					document.getElementById('images').value=str.replace(','+file2,"");
			}
		}
		
		xmlhttp.open("GET", 'module/realestate/include/component/ajax/delete-file.php?file='+file2, true);
		xmlhttp.send();
	}
	else
		return false;
}
	
	
	
	
	
	
	
	
	
	
	

