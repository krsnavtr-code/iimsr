<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role']=="add-course" || $_SESSION['role']=="super-admin"){
if(isset($_POST['register'])){
    $id = (int)$_POST['idedit'];
    $courses = $_POST['courses'];
    
    if($courses == "othersec"){
	   $course = $_POST['course'];
	}else{
	   $course = $courses;
	}
	$branches = $_POST['branches'];
    if($branches == "other branch"){
        $branch = $_POST['branch'];
    }else{
      $branch = $branches; 
    }
    $semester = $_POST['semester'];
    $subject1 = $_POST['subject1'];
    $subject2 = $_POST['subject2'];
    $subject3 = $_POST['subject3'];
    $subject4 = $_POST['subject4'];
    $subject5 = $_POST['subject5'];
    $subject6 = $_POST['subject6'];
    $subject7 = $_POST['subject7'];
    $maxmark = $_POST['maxmark'];
    $minmark = $_POST['minmark'];
    $coursefee = (int) $_POST['total_fee'];
    $eligibility = $_POST['eligibility'];
    if(isset($_POST['idedit'])){
        if(mysqli_query($con,"UPDATE `course` SET `subject1`='$subject1',`subject2`='$subject2',`subject3`='$subject3',`subject4`='$subject4',`subject5`='$subject5',`subject6`='$subject6',`subject7`='$subject7',`max_mark`='$maxmark',`min_mark`='$minmark',`course`='$course',`semester`='$semester',`branch`='$branch',`total_fee`=$coursefee,`eligibility`='$eligibility' WHERE `id`=$id")){
            $_SESSION['message'] = "Data Updated Successfully";
            echo"<script>window.location.href='courses.php'</script>";
        }else{
            $_SESSION['message']="Something Wrong ?";
        }
    }else{
        $query = mysqli_query($con,"INSERT INTO `course`( `course`, `semester`, `branch`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`,`total_fee`,`eligibility`,`max_mark`,`min_mark`) 
        VALUES ('$course','$semester','$branch','$subject1','$subject2','$subject3','$subject4','$subject5','$subject6','$subject7',$coursefee,'$eligibility','$maxmark','$minmark')");
        if($query){
            $_SESSION['message'] = "Data Updated Successfully";
        }else{
            $_SESSION['message']="Something Wrong ?";
        }
    }
}else{
    $_SESSION['message'] = ""; 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add new Course<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add new Course</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
            		if(isset($_POST['edit'])){
            		    $id = (int) $_POST['id'];
            		    $result = mysqli_query($con, "select * from `course` WHERE `id`= $id");
                		$row =  mysqli_fetch_array($result);
                	}
        		?>
        		<?php if(isset($_SESSION['message'])) { ?>
        		<div class="row">
        		    <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
        		        <span class="btn btn-success"><?php echo $_SESSION['message']; ?></span>
        		    </div>
        		</div>
        		<?php } ?>	
                <form class="form-contentset" action="" method="post">
			        <div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Course :</label>
							<?php if(isset($_POST['edit'])){ ?>
							<input type="hidden" name="idedit" value="<?php echo $row['id']; ?>">
							<?php } ?>
							<select name="courses" id="selectBoxx" class="form-control" onchange="changeFunctions();" required>
							    <?php if(isset($_POST['edit'])){ ?>
							    <option value="<?php echo $row['course']; ?>" selected><?php echo $row['course']; ?></option>
							    <?php } else{ ?>
							    <option value="" selected disable>Please Select Course:-</option>
							    <?php 
							    }
							    $result = mysqli_query($con, "select * from `course`");  
		                        $arraycourses = array();
		                        while($rowhjsd = mysqli_fetch_array($result)){ 
		                           if(!in_array($rowhjsd['course'], $arraycourses)){
                                        $arraycourses[] = $rowhjsd['course'];  
                                    } 
		                        }    
		                        foreach($arraycourses as $cours){ ?>
		                            <option value="<?php echo $cours; ?>"><?php echo $cours; ?></option>
		                        <?php } ?>
		                        <option value="othersec" >Other</option>
							</select>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="display: none;" id="textboxees">
							<label>Other :</label>
							<input type="text" name="course" class="form-control" placeholder="Course Name"  value="<?php if(isset($_POST['edit'])){ echo $row['course']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Branch :</label>
							<?php if(isset($_POST['edit'])){ 
							$cour = $row['course'];
							?>
							<select name="branches" id="selectBranch" class="form-control" onchange="branchFunctions();" required>
							    <option value="<?php echo $row['branch']; ?>" selected><?php echo $row['branch']; ?></option>
							    <?php 
							    $resultsds = mysqli_query($con, "select `branch` from `course` where `course`='$cour'");
							    while($gshasg = mysqli_fetch_array($resultsds)){
							   if(!empty($gshasg['branch'])){
							    ?>
							    <option value="<?php echo $gshasg['branch']; ?>"><?php echo $gshasg['branch']; ?></option>
							    <?php } } ?>
							    <option value="other branch">other branch</option>
							</select>
						    <?php } else{ ?>
							<select name="branches" id="selectBranch" class="form-control" onchange="branchFunctions();" required>
							    <option value="" selected selected>Please Select Branch:-</option>
							</select>
							<?php } ?>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" id="otherbranch" style="display:none">
						    <label>Other Branch :</label>
						    <input type="text" name="branch" class="form-control" placeholder="Branch Name" value="<?php if(isset($_POST['edit'])){ echo $row['branch']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Semester :</label>
							<select name="semester" id="selectsem" class="form-control" onchange="selectsemester();" required>
							   <?php if(isset($_POST['edit'])){ ?>
							  <option value="<?php echo $row['semester']; ?>" selected><?php  echo $row['semester']; ?></option>
							  <?php } else{ ?>
							  <option value="" selected disable>--Select Semester--</option>
						      <?php } ?>
							    <option value="semester1">semester1</option>
							    <option value="semester2">semester2</option>
							    <option value="semester3">semester3</option>
							    <option value="semester4">semester4</option>
							    <option value="semester5">semester5</option>
							    <option value="semester6">semester6</option>
							    <option value="semester7">semester7</option>
							    <option value="semester8">semester8</option>
							 </select>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 1 :</label>
							<input type="text" name="subject1" class="form-control" placeholder="Subject 1" value="<?php if(isset($_POST['edit'])){ echo $row['subject1']; } ?>" required>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 2 :</label>
							<input type="text" name="subject2" class="form-control" placeholder="Subject 2" value="<?php if(isset($_POST['edit'])){ echo $row['subject2']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 3 :</label>
							<input type="text" name="subject3" class="form-control" placeholder="Subject 3" value="<?php if(isset($_POST['edit'])){ echo $row['subject3']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 4 :</label>
							<input type="text" name="subject4" class="form-control" placeholder="Subject 4" value="<?php if(isset($_POST['edit'])){ echo $row['subject4']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 5 :</label>
							<input type="text" name="subject5" class="form-control" placeholder="Subject 5" value="<?php if(isset($_POST['edit'])){ echo $row['subject5']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 6 :</label>
							<input type="text" name="subject6" class="form-control" placeholder="Subject 6" value="<?php if(isset($_POST['edit'])){ echo $row['subject6']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Subject 7 :</label>
							<input type="text" name="subject7" class="form-control" placeholder="Subject 7" value="<?php if(isset($_POST['edit'])){ echo $row['subject7']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Max Marks :</label>
							<input type="text" name="maxmark" class="form-control" placeholder="Max Marks" value="<?php if(isset($_POST['edit'])){ echo $row['max_mark']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<label>Min Marks :</label>
							<input type="text" name="minmark" class="form-control" placeholder="Min Marks" value="<?php if(isset($_POST['edit'])){ echo $row['min_mark']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" <?php if(isset($_POST['edit']) && $row['semester']=='semester1'){ ?> style="display:block" id='totalfe' <?php } else{ ?> style="display:none" id='totalfe' <?php } ?> >
							<label>Course Fee :</label>
							<input type="text" name="total_fee" class="form-control" placeholder="Course Fee" value="<?php if(isset($_POST['edit'])){ echo $row['total_fee']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" <?php if(isset($_POST['edit']) && $row['semester']=='semester1'){ ?> style="display:block" id='eligibity' <?php } else{ ?> style="display:none" id='eligibity'<?php } ?>>
							<label>Eligibility :</label>
							<input type="text" name="eligibility" class="form-control" placeholder="Eligibility" value="<?php if(isset($_POST['edit'])){ echo $row['eligibility']; } ?>">
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<?php if(isset($_POST['edit'])){ ?> 
							<input type="submit" name="register" value="Edit" class="btn btn-block btn-warning btn-flat" onclick="return confirm('Are you sure you want to update ?');" style="margin: 24px 10px 0px 0px;">
							<?php } else { ?>
							<input type="submit" name="register" value="Register" class="btn btn-block btn-success btn-flat" style="margin: 24px 10px 0px 0px;">
							<?php } ?>
							</h4>
				        </div>
					</div><!--</div>-->
				</form>
            </div>
        </div>
        <div id="formfiled"></div>	
    </section>
    <br><br><br><br><br><br><br><br><br>
</div>
<script >
    function changeFunctions() {
         var selectedValue = $('#selectBoxx').val();
         $.ajax({
			 type: "post",
			 url: "add-course-ajax.php",
			 data: {course:selectedValue},
			 success: function(data){
			 $('#selectBranch').html(data);
			}
		 });
        
        if (selectedValue=="othersec"){
            $('#textboxees').show();
        }
        else {
            $('#textboxees').hide();
        }
    }
    
    function branchFunctions(){
        var selectedValue = $('#selectBranch').val();
        if(selectedValue =="other branch"){
            $('#otherbranch').show();
        }
        else {
            $('#otherbranch').hide();
        }
    }
    
   function selectsemester(){
       var sem = $('#selectsem').val();
       if(sem === "semester1"){
       $('#totalfe').show();
       $('#eligibity').show();
       }if(sem != "semester1"){
          $('#totalfe').hide();
       $('#eligibity').hide(); 
       }
    }
</script>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>