<?php
error_reporting(0);
include('checklogin.php');
include("dbconnection.php");
include("include/header.php");
if($_SESSION['role'] == "docs-verification" || $_SESSION['role']=="super-admin"){

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Submit Result<small></small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Submit Result</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                            <label>Serial No. :</label>
                            <input type="text" name="serial" class="form-control" id="serial" placeholder="Serial No." value="<?php if (isset($_POST['fetch'])) { echo $_POST['serial']; } ?>">
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                            <label>Enrolment No. :</label>
                            <input type="text" name="enrolment" class="form-control" id="enrolment" placeholder="Enrolment No." value="<?php if (isset($_POST['fetch'])) { echo $_POST['enrolment']; } ?>">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
                            <button name="fetch" class="btn btn-warning btn-block" style="margin: 24px 10px 0px 0px;">Submit</button>
                        </div>
                    </div>
                </form>
				<form action="" method="post" style="margin-bottom:20px;">
                    <div class="row CourseFeee">
						<?php
							global $name;
							global $fname;
							global $dobb;
							global $enrolm;
							global $course;
							global $special;
							global $semesters;
							global $lateral_entry;
							global $r_date;
							
							global $total_fee;
							global $deu_fee;
							global $submit_fee;
							$enrol="";
							$branch="";
							
						if(isset($_POST['fetch'])) {
							$_SESSION['enrolment'] = $enrol;
							$enrol = $_POST['enrolment'];
							$query = mysqli_query($con, "select * from register_here where `enrolment` = '$enrol'");
							while ($row = mysqli_fetch_array($query)){
							    $total_fee = $row['total_fee'];	
								$deu_fee = $row['deu_fee'];	
								$submit_fee = $row['submit_fee'];
							    /*if($submit_fee >= $deu_fee){*/
									$name = $row['name'];		  
									$fname = $row['fathers_name'];
									$dobb =  $row['dob'];
									$enrolm = $row['enrolment'];
									$course = $row['course'];
									$r_date =  $row['r_date'];
									$special =  $row['specilization'];
									$semesters =  $row['semesters'];
									$lateral_entry = $row['lateral_entry'];	
							    /*}else{
                                    echo '<span class="CourseFeee">Ooops...! Course fee are less than half. | Total Fee : '.$total_fee.', Submit Fee : '.$submit_fee.'</span>';
                                } */
						    }  
					    }
						?>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
							<label>Name :</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name; ?>">
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
							<label>Father's Name :</label>
							<input type="text" name="fathername" class="form-control" id="fathername" placeholder="Father's Name" value="<?php echo $fname; ?>">
							<input type="hidden" name="enrolment" class="form-control" id="enrolment" value="<?php echo $enrol; ?>">
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <label>Date of Birth :</label>
                            <input type="text" name="text" class="form-control" id="dob" placeholder="Date of Birth" value="<?php echo $dobb; ?>">	
                        </div>	
					</div>
					<div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                        	<label>Course Name :</label>
                        	<input type="text" name="coursename" class="form-control" id="coursename" placeholder="Course Name" value="<?php echo $course; ?>">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                        	<label>Branch :</label>
                        	<input type="text" name="branch" class="form-control" id="branch" placeholder="Branch" value="<?php echo $special; ?>">
                        	<input type="hidden" name="r_date" class="form-control" id="year" value="<?php echo $r_date; ?>">
                        	<input type="hidden" class="form-control" id="lateral_entr" value="<?php echo $lateral_entry; ?>">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <div class="dropdown">
                                <label>Select Semester :</label><br>
                                <select class="form-control select2" id="selectBox" name="seme" onchange="changeFunc();">	
                                    <option disable>Select semester </option>
									<?php if($semesters==2){?>
									<?php if($lateral_entry==""){?>
										<option value="Semester1">First </option>
										<option value="Semester2">Second</option>
									<?php } ?>
									<?php }elseif($semesters==4){?>
									<?php if($lateral_entry==""){?>
										<option value="Semester1">First </option>
										<option value="Semester2">Second</option>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
									<?php }else{?>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
									<?php } ?>
									<?php }elseif($semesters==6){?>
									<?php if($lateral_entry==""){?>
										<option value="Semester1">First </option>
										<option value="Semester2">Second</option>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
										<option value="Semester5">Fifth</option>
										<option value="Semester6">Six</option>
									<?php }else{?>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
										<option value="Semester5">Fifth</option>
										<option value="Semester6">Six</option>
									<?php } ?>
									<?php }elseif($semesters==8){?>
									<?php if($lateral_entry==""){?>
										<option value="Semester1">First </option>
										<option value="Semester2">Second</option>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
										<option value="Semester5">Fifth</option>
										<option value="Semester6">Six</option>
										<option value="Semester7">Seventh</option>
										<option value="Semester8">Eight</option>
									<?php }else{?>
										<option value="Semester3">Third</option>
										<option value="Semester4">Fourth</option>
										<option value="Semester5">Fifth</option>
										<option value="Semester6">Six</option>
										<option value="Semester7">Seventh</option>
										<option value="Semester8">Eight</option>
									<?php } }?>
                                </select>
                                <input type="hidden" name="semester" class="form-control" id="semtable" value="">
                            </div>
							<?php 
        						$queryresult = mysqli_query($con,"SELECT SUM(total_obt_marks) total_obt_marks FROM `students_marks` WHERE enrolment = '$enrol'");
        						$rowdata = mysqli_fetch_array($queryresult);
        						$fdgfdg = $rowdata['total_obt_marks'];
        					?>
							<input type="hidden" value="<?php echo $fdgfdg ?>" id='h_v' class='h_v'>
							<input type="hidden" name="enrolment" value="" id=''>
                        </div>
					</div>
				 </form>
            </div>
        </div>
        <div id="formfiled"></div>	
    </section>
    <br><br><br><br><br><br><br><br><br>
</div>
<script>
	function changeFunc() {
		var selebox = $('#selectBox').val();		
		var year = $('#year').val();
		var pasyearr = $('#pasyearr').val();
		var coursename = $('#coursename').val();
		var enrolment = $('#enrolment').val();
		var branch = $('#branch').val();
		var seme = $('#seme').val();
		var lateral_entr=$('#lateral_entr').val();
		$.ajax({
			type: "post",
			url: "result-serial-number.php",
			data: {selebox:selebox,coursename:coursename,branch:branch},
			success: function(data){
				$('#serial').val(data);
			}
		});
		$.ajax({
			type: "post",
			url: "result-course-ajax.php",
			data: {selebox:selebox,coursename:coursename,branch:branch,year:year,pasyearr:pasyearr,enrolment:enrolment,lateral_entr:lateral_entr},
			success: function(data){
				$('#formfiled').html(data);
			}
		});
	}
</script>
<script>
	function OnSubmit() {
		var obtainedmark1 = $('#obtainedmark1').val();
		var obtainedmark2 = $('#obtainedmark2').val();
		var obtainedmark3 = $('#obtainedmark3').val();
		var obtainedmark4 = $('#obtainedmark4').val();
		var obtainedmark5 = $('#obtainedmark5').val();
		var obtainedmark6 = $('#obtainedmark6').val();
		var seme = $('#selectBox').val();
		var semester = $('#semtable').val();					 
		var subjectname = $('#subjectname').val();					 
		var coursename = $('#coursename').val();
		var branch = $('#branch').val();
		var totalmax = $('#totalmax').val();
		var totalmin = $('#totalmin').val();
		var totalobt = $('#totalobt').val();
		var passmonthyear = $('#passmonthyear').val();
		var certificatedeliver = $('#certificatedeliver').val();
		var certificatemonth = $('#certificatemonth').val();

		var h_v = $('#h_v').val();
		var certificategrade1 = $('#certificategrade').val();
		var certificategrade = certificategrade1;

		var course_name = $('#course_name').val();
		var subjectname = $('#subjectname').val();
		var subject2 = $('#subject2').val();
		var subject3 = $('#subject3').val();
		var subject4 = $('#subject4').val();
		var subject5 = $('#subject5').val();
		var subject6 = $('#subject6').val();
		var serial = $('#serial').val();
		var enrolment = $('#enrolment').val();
		var result = $('#result').val();
		var year = $('#year').val();
		var pasyearr = $('#pasyearr').val();
		//var serial = $('#serial').val();
		var name = $('#name').val();
		if(result==""){
			alert('Please Fill result status');
			return false;
		}
		if(year==""){
			alert('Please Fill year field');
			return false;
		}

		if(passmonthyear==""){
			alert('Please Fill pass month year field');
			return false;
		}

		$.ajax({
			type: "post",
			url: "result-insert-ajax.php",
			data: {obtainedmark1:obtainedmark1,obtainedmark2:obtainedmark2,obtainedmark3:obtainedmark3,obtainedmark4:obtainedmark4,obtainedmark5:obtainedmark5,obtainedmark6:obtainedmark6,seme:seme,semester:semester,coursename:coursename,branch:branch,totalmax:totalmax,totalmin:totalmin,totalobt:totalobt,result:result,passmonthyear:passmonthyear,certificatedeliver:certificatedeliver,certificatemonth:certificatemonth,certificategrade:certificategrade,course_name:course_name,subjectname:subjectname,subject2:subject2,subject3:subject3,subject4:subject4,subject5:subject5,subject6:subject6,result:result,enrolment:enrolment,year:year,pasyearr:pasyearr,serial:serial,name:name},
			success: function(data){
				alert(data);
				if (data == "Data has been submitted successfully") {
					document.location.href = 'result-submit.php';
				}
			} 
		});
	}
	var totalincome =0;
	
	var num1=0;
	var num2=0;
	var num3=0;
	var num4=0;
	var num5=0;
	var num6=0;
	
	var test1=0;
	var test2=0;
	var test3=0;
	var test4=0;
	var test5=0;
	var test6=0;
	function mycalculatenumber1(){
		var test1 = $('#h_v').val();
		var test = $('#obtainedmark1').val() + $('#certificategrade').val();
		num1 = (parseInt(test) + parseInt(test1));
		//alert(num1);
		num1 = $('#obtainedmark1').val();
		if(num1 != "" && num1 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num1},
				success: function(data){
				$('#total1').val(data);
				}
			});
			totalincome = parseInt(num1);
			$('#totalobt').val(totalincome);
			
			$('#certificategrade').val(parseInt(test1)+parseInt(num1));
			
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
					$('#totalobtword').val(data);
				}
			});
		}
	}
	function mycalculatenumber2(){
		var test2 = $('#h_v').val();
		var testn = $('#obtainedmark2').val() + $('#certificategrade').val();
		num2 = (parseInt(testn) + parseInt(test2)+parseInt(test1));
		num2 = $('#obtainedmark2').val();
		if(num2 != "" && num2 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num2},
				success: function(data){
					$('#total2').val(data);
				}
			});
			totalincome =parseInt(num1)+parseInt(num2);
			$('#totalobt').val(totalincome);
			
			$('#certificategrade').val(parseInt(test1)+parseInt(test2)+parseInt(num1)+parseInt(num2));
			
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
					$('#totalobtword').val(data);
				}
			});
		}
	}
	function mycalculatenumber3(){
		var test3 = $('#h_v').val();
		var testnn = $('#obtainedmark3').val() + $('#certificategrade').val();
		num3 = (parseInt(test3) + parseInt(test2)+parseInt(test1)+parseInt(testnn));
		num3 = $('#obtainedmark3').val();
		if(num3 != "" && num3 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num3},
				success: function(data){
					$('#total3').val(data);
				}
			});
			totalincome =totalincome =parseInt(num1)+parseInt(num2)+parseInt(num3);
			$('#totalobt').val(totalincome); 
			$('#certificategrade').val(parseInt(test1)+parseInt(test2)+parseInt(test3)+parseInt(num1)+parseInt(num2)+parseInt(num3));
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
					$('#totalobtword').val(data);
				}
			});
		}
	}
	function mycalculatenumber4(){
		var test4 = $('#h_v').val();
		var testnnn = $('#obtainedmark4').val() + $('#certificategrade').val();
		num4 = (parseInt(test4) + parseInt(test3)+parseInt(test2)+parseInt(test1)+parseInt(testnnn));
		num4 = $('#obtainedmark4').val();
		if(num4 != "" && num4 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num4},
				success: function(data){
				    $('#total4').val(data);
				}
			});
			totalincome =totalincome =parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4);
			$('#totalobt').val(totalincome);
			$('#certificategrade').val(parseInt(test1)+parseInt(test2)+parseInt(test3)+parseInt(test4)+parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4));
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
				    $('#totalobtword').val(data);
				}
			});
		}
	}

	function mycalculatenumber5(){
		var test5 = $('#h_v').val();
		var testnnn1 = $('#obtainedmark5').val() + $('#certificategrade').val();
		num5 = (parseInt(test5) + parseInt(test4)+parseInt(test3)+parseInt(test2)+parseInt(test1)+parseInt(testnnn1));
		num5 = $('#obtainedmark5').val();
		if(num5 != "" && num5 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num5},
				success: function(data){
					$('#total5').val(data);
				}
			});
			totalincome =totalincome =parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4)+parseInt(num5);
			$('#totalobt').val(totalincome);
			$('#certificategrade').val(parseInt(test1)+parseInt(test2)+parseInt(test3)+parseInt(test4)+parseInt(test5)+parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4)+parseInt(num5));
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
					$('#totalobtword').val(data);
				}
			});
		}
	}
	function mycalculatenumber6(){
		var test6 = $('#h_v').val();
		var testnnn2 = $('#obtainedmark6').val() + $('#certificategrade').val();
		num6 = (parseInt(test6) + parseInt(test5)+parseInt(test4)+parseInt(test3)+parseInt(test2)+parseInt(test1)+parseInt(testnnn2));
		
		num6 = $('#obtainedmark6').val();
		if(num6 != "" && num6 !=undefined){
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:num6},
				success: function(data){
					$('#total6').val(data);
				}
			});
			totalincome = parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4)+parseInt(num5)+parseInt(num6);
			$('#totalobt').val(totalincome);
			
			$('#certificategrade').val(parseInt(test1)+parseInt(test2)+parseInt(test3)+parseInt(test4)+parseInt(test5)+parseInt(test6)+parseInt(num1)+parseInt(num2)+parseInt(num3)+parseInt(num4)+parseInt(num5)+parseInt(num6));
				
			var newnum = $('#totalobt').val();
			$.ajax({
				type: "post",
				url: "number-to-text.php",
				data: {totalincome:newnum},
				success: function(data){
					$('#totalobtword').val(data);
				}
			});
		}
	}
</script>
<?php include("include/footer.php");?>
<?php }else {header("location: login.php");}?>