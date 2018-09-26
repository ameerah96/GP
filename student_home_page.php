<?php

include"static_menue.html";
?>
<script>

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function(){
	if(this . readyState == 4 && this . status == 200)
  {
	var student_name = JSON.parse(this .responseText);
		
		for(var x=0; x< student_name.length; x++){
		if(x==0){
		document.getElementById("studentNameLabel").innerHTML+= student_name[x];
		}
		else if(x==1){
					document.getElementById("studentIDLabel").innerHTML+= student_name[x];

		}
		else if(x==2){
					document.getElementById("studentLevelLabel").innerHTML+= student_name[x];

		}
		else if(x==3){
					document.getElementById("studentGPALabel").innerHTML+= student_name[x];

		}
		else if(x==4){
					document.getElementById("studentAdvisorLabel").innerHTML+= student_name[x];

		}

}  

}  
 
};
	xmlhttp.open("GET","student_info.php",true);
	xmlhttp.send();
	</script>
<body>
   <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   <div class="row" id="addart">
		<div class="col-md-9">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
 <div class="panel-body">
			 <label>Student Name: </label>
    <label  class="" id="studentNameLabel" >
			</label>
			 <label style="margin-left:195px"> ID:</label>
    <label   id="studentIDLabel">
	</label> <br>
	 <label > level:</label>
	    <label   id="studentLevelLabel"></label>
			<label style="margin-left:400px">GPA:</label>
    <label   id="studentGPALabel"> </label>
	<br>
	 <label > Advisor:</label>
	    <label   id="studentAdvisorLabel"></label>
			</div>
 </div>
            </div>
 </div>
			<br>
			 <div class="container-fluid">
      <div class="row">
			        <div class=" ">

			<img class="" src="SWplan.jpg" style="margin-left:-45px"  >
			</div>
			</div>
			</div>
			
    
    </div>
  </div>
  </div>

</body>