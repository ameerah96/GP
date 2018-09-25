<?php

include"static_menue.html";
?>
<style type="text/css">
			table, th,tr,td{
				border: 1px solid black;
				border-collapse: collapse;
				width = 300%;
			}
		</style>



  <body>

   
     

    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h1 class="page-header">Course you can enroll are:</h1>
			</div>
          <div id='courseNameDiv' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		  
		  
          
                
				
        </div>
      </div>
    </div>

   <script type='text/javascript'>
window.onload = function() {
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function(){
	if(this . readyState == 4 && this . status == 200)
  {
	var courseName = JSON.parse(this .responseText);
	document.getElementById("courseNameDiv").innerHTML+="<table width='50%' border=1px solid black> <thead><tr> <th> Course Name</th><th> credit Hours</th> <th>sections</th></tr></thead><tbody><tr><td> i am me</td></tr>";
		 
	for(var x=0; x< courseName.length; x++)
	{	
		document.getElementById("courseNameDiv").innerHTML+="<tr>";
		for (var i=0; i< courseName[x].length; i++)
		{
		document.getElementById("courseNameDiv").innerHTML+= "<td><a href='enroll_course_form.php'>"+ courseName[x][i]+"</a></td>";
	
	// may i will use this later
	/*	var anchortags = document.querySelectorAll("a[href*='#']");
		anchortags.forEach(function(tag) {
		tag.href = tag.href.replace('&lanekilde=', '');
    });*/
		}
		document.getElementById("courseNameDiv").innerHTML+="</tr>";

	}

	document.getElementById("courseNameDiv").innerHTML+= "</tbody> </table>";

  }// end if
}// end function 
	xmlhttp.open("POST","view_enroll.php",true);
	xmlhttp.send();
}
</script>
  </body>
</html>