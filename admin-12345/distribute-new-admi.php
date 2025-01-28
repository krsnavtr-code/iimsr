<?php

error_reporting(0);

include('checklogin.php');

include("dbconnection.php");

include("include/header.php");

if($_SESSION['role']=="super-admin" || $_SESSION['role']=="distribute" || $_SESSION['role']=="distribute, send-course-detail, send-sample, application-form"){



?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Upload New Admission</h1>

        <ol class="breadcrumb">

            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Upload New Admission</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="box box-primary">

                    <?php

    					if (isset($_POST['newadmission'])){

    						echo $success;

    					}else {

    						echo $success;

    					}

    				?>

                    <div class="box-header with-border"></div>

                    <form action="payment-request.php" method="post" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="nametitle" class="form-control select2" style="width: 100%;" id="title" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                						    <option value="<?php echo $nametitle; ?>" selected><?php echo $nametitle; ?></option>

                						    <?php } else{ ?>

                						    <option value="" disable hidden>-Title-</option>

                						    <?php } ?>

                						    <option value="Mr.">Mr.</option>

                						    <option value="Mrs.">Mrs.</option>

                						    <option value="Ms.">Ms.</option>

                						    <?php if($naametitle!=null){ ?>

                                                <option selected="selected"><?php echo $naametitle; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Name</label>

                                        <input type="hidden" name="enrollid" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['id']; } ?>">

                                        <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['edit'])){ echo $fullcname; }?>" placeholder="Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="fathertitle" class="form-control select2" style="width: 100%;" id="title" required>

                                            <?php if(isset($_POST['edit'])){ ?> 

                						        <option value="<?php echo $faththernametitle; ?>" selected><?php  if(isset($_POST['edit'])){  echo $faththernametitle; } ?></option>

                						    <?php } else { ?>

                						        <option value="" disable hidden>-Title-</option>

                						    <?php } ?>

                						    <option value="Mr.">Mr.</option>

                						    <option value="Late">Late</option>

                						    <?php if($fnametitle!=null){ ?>

                                                <option selected="selected"><?php echo $fnametitle; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Father's Name</label>

                                        <input type="text" class="form-control" name="fathername" value="<?php if(isset($_POST['edit'])){ echo $fathrefullcname; }?>" placeholder="Father's Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-1 col-md-1 col-xs-3">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Title</label>

                                        <select name="mothertitle" class="form-control select2" id="title" required>

                                            <?php if(isset($_POST['edit'])){ ?> 

                							<option value="<?php echo $mothernametitle; ?>" selected><?php echo $mothernametitle; ?></option>

                							<?php } else { ?>

                							<option value="" disable hidden>-Title-</option>

                							<?php } ?>

                							<option value="Mrs.">Mrs.</option>

                							<option value="Late">Late</option>

                							<?php if($mnametitle!=null){ ?>

                								<option selected="selected"><?php echo $mnametitle; ?></option>

                							<?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-9">

                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Mother's Name</label>

                                        <input type="text" class="form-control" name="mothername" style="border: #2037bf61 1px solid;" value="<?php if(isset($_POST['edit'])){ echo $motherfullcname; } ?>" placeholder="Mother's Name" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Date Of Birth</label>

                                        <input name=dob size=10 maxlength=10  onkeyup="this.value=this.value.replace(/^(\d\d)(\d)$/g,'$1/$2').replace(/^(\d\d\/\d\d)(\d+)$/g,'$1/$2').replace(/[^\d\/]/g,'')" class="form-control date-format" value="<?php  if(isset($_POST['edit'])){  echo $roere['date_of_birth']; }?>" placeholder="Date Of Birth" required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Mobile</label>

                                        <input type="text" maxlength="10" class="form-control" name="mobile" id="mobile" pattern="\d{10}" value="<?php  if(isset($_POST['edit'])){ echo $roere['mobile_no']; } ?>" title="Please enter exactly 10 digits" placeholder="Phone Number" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Email</label>

                                        <input type="email" class="form-control" name="email" value="<?php  if(isset($_POST['edit'])){  echo $roere['email'];} ?>" placeholder="E-mail" required>

                                    </div>

                                </div>

                                <div class="col-sm-5 col-md-5 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Parmanent Address</label>

                                        <input type="text" class="form-control" name="address" value="<?php  if(isset($_POST['edit'])){  echo $roere['address'];} ?>" placeholder="Address" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course</label>

                                        <select name="course" class="form-control select2" required onkeyup="mycalculatenumber()" id="slectcourse" style="width: 100%;" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                						       <option value="<?php echo $roere['course']; ?>"><?php  if(isset($_POST['edit'])){  echo $roere['course']; } ?></option> 

                						    <?php }else{ ?>

                						       <option value="" disable>-Select Course-</option>

                						    <?php } ?>

                                            <?php $querycourse = mysqli_query($con,'SELECT * FROM `course` ORDER BY `course`'); ?>

                                            <?php

                                                $array = array();

                                                while($coursrow=mysqli_fetch_array($querycourse)){ 

                                                    if(!in_array($coursrow['course'], $array)){

                                                        $array[] = $coursrow['course'];  

                                                    } 

                                                }

                                                foreach($array as $dataa){ 

                                            ?>

                						    <option value="<?php echo $dataa; ?>"><?php echo $dataa; ?></option>

                						   <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Branch</label>

                                        <select name="branch" class="form-control select2" id="slectbranch" style="width: 100%;" required>

                                            <?php if(isset($_POST['edit'])){ ?>

                                                <option value="<?php echo $roere['branch']; ?>"><?php echo $roere['branch']; ?></option> 

                                            <?php }else{ ?>

                                                <option value="" disable hidden>-Select branch-</option> 

                                            <?php } ?>

                                            <?php if($braannch!=null){ ?>

                                                <option selected="selected"><?php echo $braannch; ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Semester</label>

                                        <select name="semester" onchange="Semesterget(event)" class="form-control select2" style="width: 100%;">

                                            <?php if(isset($_POST['edit'])){ ?>

                                                <option value="<?php echo $roere['semester']; ?>"><?php echo $roere['semester']; ?></option> 

                                            <?php }else{ ?>

                                                <option value="" style="font-size:10px;" disable hidden>-Select Semester-</option> 

                                            <?php } ?>

                                            <option value="1">1</option>

                                            <option value="2">2</option>

                                            <option value="3">3</option>

                                            <option value="4">4</option>

                                            <option value="5">5</option>

                                            <option value="6">6</option>

                                            <option value="7">7</option>

                                            <option value="8">8</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Semester Fee</label>

                                        <input type="text" class="form-control" id="semetserfeew" name="semetserfeew" value="<?php if(isset($_POST['edit'])){ echo $roere['semetserfee']; } ?>" placeholder="Semetser Fee" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Session</label>

                                        <input type="text" class="form-control" name="session" value="<?php if(isset($_POST['edit'])){ echo $roere['session']; } ?>" placeholder="Session" required>

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Discount You Will.</label>

                                        <select name="discountyouwill" onchange="getComboA(this)" id="discountyouwill" class="form-control select2" style="width: 100%;">

                                            <option value="" disable>-Select Discount-</option>

                							<option value="0.50">50% Discount</option>

                							<option value="0.45">45% Discount</option>

                							<option value="0.40">40% Discount</option>

                							<option value="0.35">35% Discount</option>

                							<option value="0.30">30% Discount</option>

                							<option value="0.25">25% Discount</option>

                							<option value="0.20">20% Discount</option>

                							<option value="0.15">15% Discount</option>

                							<option value="0.10">10% Discount</option>

                							<option value="0.05">5% Discount</option>

                							<option value="0">0% Discount</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Course Total Fee</label>

                                        <input type="text" class="form-control" id="course_totalFee" name="course_totalFee" value="<?php if(isset($_POST['edit'])){ echo $roere['total_fee']; } ?>" placeholder="Total Payment" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">After Discount Fee</label>

                                        <input type="text" class="form-control" id="discount_fee" name="discount_fee" value="<?php if(isset($_POST['edit'])){ echo $roere['discount_fee']; } ?>" placeholder="After Discount Fee" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">18% GST* Fee </label>

                                        <input type="text" class="form-control" id="tax_gstfee" name="tax_gstfee" value="<?php if(isset($_POST['edit'])){ echo $roere['with_gstfee']; } ?>" placeholder="Total Payable fee with GST*" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-2 col-md-2 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Total Fee With 18% GST*</label>

                                        <input type="text" class="form-control" id="tota_withgst" name="tota_withgst" value="<?php if(isset($_POST['edit'])){ echo $roere['with_gstfee']; } ?>" placeholder="Total Payable fee with GST*" readonly required>

                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Amount</label>

                                        <input type="text" class="form-control" id="amount" name="price" value="" placeholder="Amount" required>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Marksheet</label>

                                        <input type="file" name="marksheet" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['marksheet']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Adhar card</label>

                                        <input type="file" name="adhar_card" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['adhar_card']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Passport Photo</label>

                                        <input type="file" name="student_image" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['student_image']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                                <div class="col-sm-3 col-md-3 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Signature</label>

                                        <input type="file" name="student_signature" class="form-control" value="<?php if(isset($_POST['edit'])){ echo $roere['student_signature']; } ?>" style="margin: 0px 10px 0px 0px;">

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">U Id Number</label>

                                        <input type="text" name="uniquecode" class="form-control" placeholder="Unique Number" value="<?php if(isset($_POST['edit'])){  echo $roere['unique_id']; } ?>" required>

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1">Counseler Name</label>

                                        <input type="text" class="form-control" id="counselername" name="counselername" value="" placeholder="Counselor Name" required>

                                    </div>

                                </div>

                                <div class="col-sm-4 col-md-4 col-xs-6">

                                    <div class="nput-group">

                                        <label for="exampleInputPassword1">Lateral entry</label>

                                        <select name="lateralentry" id="lateralentry" class="form-control" style="width: 100%;">

                                            <option value="" disable>-Select Lateral Entry-</option>

                							<option value="Yea">Yes</option>

                							<option value="No">No</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="box-footer">

                            <div class="row">

                                <div class="col-sm-4 col-md-4 col-xs-6"></div>

                                <div class="col-sm-4 col-md-4 col-xs-6"></div>

                                <div class="col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">

                                        <input type="submit" value="submit" name="newadmission" class="btn btn-warning pull-right btn-block ButtonRadis">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

<style>

    .form-group {

        margin-bottom: 2px;

    }

    .content-header>.breadcrumb {

        float: right;

        background: transparent;

        margin-top: 0;

        margin-bottom: 0;

        font-size: 12px;

        padding: 7px 5px;

        position: absolute;

        top: 0px;

        right: 16px;

        border-radius: 2px;

    }

</style>

<script>

	$(document).ready(function() {

        $('#fpayamount').keyup(function(ev) {

            var total = $('#fpayamount').val() * 1;

            var tot_price = total - (total * 0.18);

            var tot_tax = 1 * 0.18;

			var tttpp = total-tot_price;

            var divobj = document.getElementById('tot_amount');

            var tot_tax = document.getElementById('tot_tax');

            divobj.value = tot_price;

            tot_tax.value = tttpp;

        });

    });

</script>

<script>

	$(document).ready(function() {

		$("#formButton").click(function() {

			var formButton = $('#formButton').val()

			$.ajax({

				type: "post",

				url: "new-admission-ajax.php",

				data: {formButton:formButton},

				success: function(data){

					$('#formfiled').html(data);

				}

			});

		});

	});

</script>

<script>

    $("#slectcourse").change(function() {

        var data = $("#slectcourse").val();

        $.ajax({

            url: "new-admission-branch.php",

            type: 'post',

            data: {data:data},

            success: function(data){

                $('#slectbranch').html(data);

            } 

        });

    });

    $("#slectbranch").change(function(){

        var barnch = $("#slectbranch").val();

        if(barnch==="other"){

            $("#branchnameen").show();   

        }

    });

</script>

<script>

    function Semesterget(event) {

        if (event.target.value === "1") {

            document.getElementById("semetserfeew").value = 1000;

        } else if (event.target.value === "2") {

            document.getElementById("semetserfeew").value = 2000;

        } else if (event.target.value === "3") {

            document.getElementById("semetserfeew").value = 3000;

        }else if (event.target.value === "4") {

            document.getElementById("semetserfeew").value = 4000;

        }else if (event.target.value === "5") {

            document.getElementById("semetserfeew").value = 5000;

        }else if (event.target.value === "6") {

            document.getElementById("semetserfeew").value = 6000;

        }else if (event.target.value === "7") {

            document.getElementById("semetserfeew").value = 7000;

        }else if (event.target.value === "8") {

            document.getElementById("semetserfeew").value = 8000;

        }

    };

</script>

<script>

    function getComboA(selectObject){

    	var gate = $('#discountyouwill').val();

    	$("#discountyouwill").click(function() {

    		var discountyouwill = $('#discountyouwill').val()

    		$(document).ready(function() {

                $('#course_totalFee').keyup(function(ev) {

                var total = $('#course_totalFee').val() * 1;

                var tot_price = total - (total * gate);

                var tot_tax = 0.18 * 1;

				var tttpp = tot_tax * tot_price;

				var tttp = tttpp + tot_price;

                var divobj = document.getElementById('discount_fee');

                var withgst = document.getElementById('tota_withgst');

                var tot_tax = document.getElementById('tax_gstfee');

                    divobj.value = tot_price;

                    tot_tax.value = tttpp;

                    withgst.value = tttp;

                });

            });

    	});

    }

</script>

</div>

<?php include("include/footer.php");?>

<?php }else {header("location: login.php");}?>