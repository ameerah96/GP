<?php

include"static_menue.html";
?>
 
  <body>
   <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   <div class="row" id="addart">
		<div class="col-md-9">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

<form class="form-inline">
  <div class="panel-body">
						<div class="form-group">
    <label>Student Name: </label>
    <label  class="" id="studentNameLabel" >
  </div>
    <div class="form-group">
    <label style="margin-left:195px"> ID:</label>
    <label   id="studentIDLabel">
  </div>
  <br>
   <div class="form-group">
    <label > level:</label>
	    <label   id="studentLevelLabel"></label>

  </div>
   <div class="form-group">
    <label style="margin-left:400px">GPA</label>
    <label   id="studentGPALabel">
	
  </div>
  <hr>
  <p>
  Some Notes:</p>
  <p>1-This is not offical dropping semester.</p>
    <p>2-The student is still active in the current semester.</p>
       <p>3-The form might take up to 3 working days.</p>
	   <hr>
<p>why do you want to drop the semester?(please write your justification)</p>
<textarea rows="4" cols="70"></textarea>
  <input type="file" >

</div>

<div class="panel-footer" style="background-color:#0088cc">
					<button type="submit" name="submit" id="" class="">send </button>
				</div>
</form>

  </div>
  </div>
  </div>
    </div>
  </div>
  </div>

</body


