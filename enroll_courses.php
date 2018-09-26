<?php

include"static_menue.html";
session_start();

//if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
//{
//echo "<META HTTP-EQUIV='Refresh' Content='1;URL=login.html'>";
//exit() ;	
//}
?>
  <body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Course you can enroll are:</h1>
			</div>
			<div id='courseNameDiv' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<table id ="mytable" width='50%' border=1px solid black> 
					<thead> <th> Course Name</th><th> Credit Hours</th><th>Sections</th></thead>
					<tbody>	
			</div>
		</div>
    </div>
   <script type='text/javascript'>

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if(this . readyState == 4 && this . status == 200)
		{
			var courseName = JSON.parse(this .responseText);
			var table = document.getElementById("mytable");	
			var content =" ";
			// the need of 2 for loop because the courseName will contain many array ..each array contains the info of the course with the sections
			for(var x=0; x< courseName.length; x++)
			{		
				// -1 will add the row at the end of the table 
				var row = table.insertRow(-1);		
				for (var i=0; i< courseName[x].length; i++)
				{
					var cell = row.insertCell(i);
					if(courseName[x][i].constructor === Array)
					{
						array = courseName[x][i];
						
						for (var q=0;q<array.length; q++)
						{   
							for(var key in array[q])
								cell.innerHTML +="<a id='enroll' href='enroll_course_form.php'>"+ key +" : " +array[q][key] + " , ";	
						}
					}
					else
					{
					cell.innerHTML = "<a href='enroll_course_form.php'>"+courseName[x][i]+"</a>";
					}
					// may i will use this later
					/*	var anchortags = document.querySelectorAll("a[href*='#']");
					anchortags.forEach(function(tag) {
					tag.href = tag.href.replace('&lanekilde=', ''););*/
				}
			}
		}// end if
	}// end function 
	xmlhttp.open("POST","view_enroll.php",true);
	xmlhttp.send();	

</script>
</body>
</html>