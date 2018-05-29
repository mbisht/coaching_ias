<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="" />
<meta name="author" content="">
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://use.fontawesome.com/ef3000c315.js"></script>
<style>*{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
:after, :before{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.raisetick {position: fixed;right: 100px;top: 0px;z-index: 9999;width: 120px;}.raisetick img {width: 120px;}div#infor { position: fixed;right: 0;background: #fff;top: 60px;}</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://www.iasshiksha.com/admin/vendor/bootstrap4/css/bootstrap.min.css">
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="https://www.iasshiksha.com/admin/admin/vendor/summernote/summernote.css">
		<link rel="stylesheet" href="https://www.iasshiksha.com/admin/css/core.css">
		<style>.note-popover.popover {display: none;}.site-content {background: #fff;width:750px;margin:auto;}.table-bordered p {
    margin: 0px 0px;
}.table td, .table th {
    padding: 7px 5px;
    line-height: 1;
    vertical-align: top;
    border-top: 1px solid #eceeef;
    outline: 0;
    margin: 0;
    height: auto;
}.table-bordered td, .table-bordered th {border: 1px solid #999;height: 30px;min-width: 80px;}

.table-bordered td input[type=checkbox] {
    cursor: not-allowed;
    float: left;
}
.table-bordered td span{ float: left;}
h2.mt-0.text-uppercase.font-18.line-bottom.line-height-1 {
    font-size: 20px;
    text-align: center;
}
img.logo {
    width: 165px;
    display: inline-block;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 0rem;
}
</style>
</head>
<body>
<div class="site-content">
<div class="main" id="dvContents">
<?php
if(!isset($_GET[id]) && empty($_GET[id])){
    header("Location: view-new-admission");
}

$stmt = $reg_user->runQuery("SELECT * FROM request_admission WHERE id='$_GET[id]'");
$stmt->execute();
for($i=1; $stmt1 = $stmt->fetchObject(); $i++)
{
?>
<!--onsubmit="return validation()"-->
<h2 class="mt-0 text-uppercase font-18 line-bottom line-height-1">Admission/ENROLMENT FORM <span class="text-theme-color-2 font-weight-400">SHIKSHA IAS ACADEMY</span>
   <img src="/assets/images/logo-wide.png" width="200" class="pl-20 logo" /></h2>
   <hr style="border:1px solid #202c45" >
      <table class="table table-bordered" id="printTable">
         <tbody>
            <tr>
               <td colspan="2" class="text">1. Name(Use CAPITAL Letters)*:</td>
               <td colspan="6"><p><?php echo $stmt1->fullname; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">2. Date of Birth*:</td>
               <td ><p><?php echo $stmt1->dateofbirth; ?></p></td>
               <td class="text">Gender*:</td>
               <td colspan="3">
                    <div class="col-xs-6"><input type="checkbox" name="gender" id="male" <?php if($stmt1->gender =='Male') {echo 'checked="checked"'; } ?> class="gender radio" value="Male" required disabled> <span>Male</span></div>
                    <div class="col-xs-6"><input type="checkbox" name="gender" id="female" <?php if($stmt1->gender =='Female') {echo 'checked="checked"'; } ?> class="gender radio" value="Female" required disabled> <span>Female</span></div>
               </td>
            </tr>
            <tr>
               <td colspan="2" class="text">3. Medium in which you propose to take the classes:</td>
               <td colspan="2"><input type="checkbox" name="medium" id="english" <?php if($stmt1->medium =='English') {echo 'checked="checked"'; } ?> class="medium" value="English" disabled> <span>English</span> </td>
               <td colspan="3"><input type="checkbox" name="medium" id="hindi" <?php if($stmt1->medium =='Hindi') {echo 'checked="checked"'; } ?> class="medium" value="Hindi" disabled> <span>Hindi</span> </td>
            </tr>
            <tr>
               <td colspan="2" class="text">4. Father's Name & Mob. No. *:</td>
               <td colspan="3"><p><?php echo $stmt1->father_name; ?></p></td>
               <td colspan="3"><p><?php echo $stmt1->father_mobile; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">5. Father's Profession:</td>
               <td colspan="6"><p><?php echo $stmt1->father_profession; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">Permanent Address*: <br/>(in CAPITAL letters)</td>
               <td colspan="6"><p><?php echo $stmt1->permanent_address; ?></p></td>
            </tr>
            <tr>
               <td></td>
               <td class="text">PIN:</td>
               <td colspan="2"><p><?php echo $stmt1->permanent_pincode; ?></p></td>
               <td class="text">Mobile:</td>
               <td colspan="2"><p><?php echo $stmt1->permanent_mobile; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">Local Address*: <br/>(in CAPITAL letters)</td>
               <td colspan="6"><p><?php echo $stmt1->local_address; ?></p></td>
            </tr>
            <tr>
               <td></td>
               <td class="text">PIN:</td>
               <td colspan="2"><p><?php echo $stmt1->local_pincode; ?></p></td>
               <td class="text">Mobile*:</td>
               <td colspan="2"><p><?php echo $stmt1->local_mobile; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">7. E-Mail Address*:</td>
               <td colspan="6"><p><?php echo $stmt1->email; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">8. Mention the batch/session in which you propose to take classes:</td>
               <td colspan="2" class="text">Regular Classes <p><?php echo $stmt1->regular_session; ?></p>
               </td>
               <td colspan="3" class="text">Weekend Classes <p><?php echo $stmt1->weekend_session; ?></p>
               </td>
            </tr>
            <tr>
               <td colspan="2">9. Mention the course(s) you are enrolling for:</td>
               <td colspan="2"><input type="checkbox" name="course" id="gsintegrated" class="course" <?php if($stmt1->course =='GS Integrated Course') {echo 'checked="checked"'; } ?> disabled value="GS Integrated Course" > GS Integrated Course</td>
               <td colspan="3"><input type="checkbox" name="course" id="optionalsubject" class="course" <?php if($stmt1->course =='Optional Subject') {echo 'checked="checked"'; } ?> disabled value="Optional Subject" > Optional Subject
                  <p><?php echo $stmt1->course_optional_subject; ?></p>
               </td>
            </tr>
            <tr>
               <td colspan="7" class="text">10. Education Qualification:</td>
            </tr>
            <tr>
               <td>Name of Exam</td>
               <td>Year</td>
               <td>Subjects</td>
               <td>Board/University</td>
               <td>% of Marks</td>
               <td>Division/Rank</td>
               <td>Medium</td>
            </tr>
            <tr>
               <td>Class XII</td>
               <td><p><?php echo $stmt1->qualification_12year; ?></p></td>
               <td><p><?php echo $stmt1->qualification_12subject; ?></p></td>
               <td><p><?php echo $stmt1->qualification_12univ; ?></p></td>
               <td><p><?php echo $stmt1->qualification_12marks; ?></p></td>
               <td><p><?php echo $stmt1->qualification_12division; ?></p></td>
               <td><p><?php echo $stmt1->qualification_12medium; ?></p></td>
            </tr>
            <tr>
               <td>Graduation</td>
               <td><p><?php echo $stmt1->qualification_Gradyear; ?></p></td>
               <td><p><?php echo $stmt1->qualification_Gradsubject; ?></p></td>
               <td><p><?php echo $stmt1->qualification_Graduniv; ?></p></td>
               <td><p><?php echo $stmt1->qualification_Gradmarks; ?></p></td>
               <td><p><?php echo $stmt1->qualification_Graddivision; ?></p></td>
               <td><p><?php echo $stmt1->qualification_Gradmedium; ?></p></td>
            </tr>
            <tr>
               <td>Post Graduation</td>
               <td><p><?php echo $stmt1->qualification_PostGyear; ?></p></td>
               <td><p><?php echo $stmt1->qualification_PostGsubject; ?></p></td>
               <td><p><?php echo $stmt1->qualification_PostGuniv; ?></p></td>
               <td><p><?php echo $stmt1->qualification_PostGmarks; ?></p></td>
               <td><p><?php echo $stmt1->qualification_PostGdivision; ?></p></td>
               <td><p><?php echo $stmt1->qualification_PostGmedium; ?></p></td>
            </tr>
            <tr>
               <td>Additional Qualification</td>
               <td><p><?php echo $stmt1->qualification_AddQyear; ?></p></td>
               <td><p><?php echo $stmt1->qualification_AddQsubject; ?></p></td>
               <td><p><?php echo $stmt1->qualification_AddQuniv; ?></p></td>
               <td><p><?php echo $stmt1->qualification_AddQmarks; ?></p></td>
               <td><p><?php echo $stmt1->qualification_AddQdivision; ?></p></td>
               <td><p><?php echo $stmt1->qualification_AddQmedium; ?></p></td>
            </tr>
            <tr>
               <td colspan="7" class="text">11. Mention the year in which you have completed your last examination:</td>
            </tr>
            <tr>
               <td colspan="7"><p><?php echo $stmt1->last_exam; ?></p></td>
            </tr>
            <tr>
               <td colspan="7" class="text">12. Optional subjects for the Main Exam:</td>
            </tr>
            <tr>
               <td colspan="7" ><p><?php echo $stmt1->optional_subject_main; ?></p></td>
            </tr>
            <tr>
               <td colspan="7" class="text">13. Have you appeared in the Civil Services/PCS Examination earlier ? If yes, give complete details:</td>
            </tr>
            <tr>
               <td colspan="7"><p><?php echo $stmt1->appeared_civil_exam; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">14. Family background in administration, if any:</td>
               <td colspan="5"><p><?php echo $stmt1->family_bground; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">15. Are you still a student? If yes, give details:</td>
               <td colspan="5"><p><?php echo $stmt1->is_student; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">16. Are you employed? If yes, give details:</td>
               <td colspan="6"><p><?php echo $stmt1->is_employed; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">17. Mention the newspaper(s) you read:</td>
               <td colspan="6"><p><?php echo $stmt1->newspapers; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">18. Mention the magazine(s) you read:</td>
               <td colspan="6"><p><?php echo $stmt1->magazines; ?></p></td>
            </tr>
            <tr>
               <td colspan="2" class="text">19. Do you require hostel facility?</td>
               <td colspan="3"><input type="checkbox" name="hostel" id="hostel_yes" class="hostel" <?php if($stmt1->hostel =='Yes') {echo 'checked="checked"'; } ?> disabled value="Yes"> Yes </td>
               <td colspan="3"><input type="checkbox" name="hostel" id="hostel_no" class="hostel" <?php if($stmt1->hostel =='No') {echo 'checked="checked"'; } ?> disabled value="No" > No</td>
            </tr>
            <tr>
               <td colspan="7" class="text">20. Has anybody recommended the Shiksha IAS Academy to you? If yes, tick appropraite box.</td>
            </tr>
            <tr>
               <td colspan="7">
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="parents" class="recommended" <?php if($stmt1->recommended =='Parents') {echo 'checked="checked"'; } ?> disabled value="Parents"> <span>Parents</span></div>
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="recommended_friends" class="recommended" <?php if($stmt1->recommended =='Friends') {echo 'checked="checked"'; } ?> disabled value="Friends" > <span>Friends</span></div>
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="recommended_teachers" class="recommended" <?php if($stmt1->recommended =='Teachers') {echo 'checked="checked"'; } ?> disabled value="Teachers"> <span>Teachers</span></div>
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="recommended_newspapers" class="recommended" <?php if($stmt1->recommended =='Newspapers') {echo 'checked="checked"'; } ?> disabled value="Newspapers"> <span>Newspapers</span></div>
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="recommended_magzines" class="recommended" <?php if($stmt1->recommended =='Magzines') {echo 'checked="checked"'; } ?> disabled value="Magzines" > <span>Magazines</span></div>
                   <div class="col-xs-2"><input type="checkbox" name="recommended" id="recommended_internet" class="recommended" <?php if($stmt1->recommended =='Internet') {echo 'checked="checked"'; } ?> disabled value="Internet"> <span>Internet</span></div>
                   </td>
            </tr>
             <tr>
               <td colspan="7"><p><strong>I hereby undertake to obey and comply with all the rules & regulations of Study Circle, which I have read and 
               understood, in force from time to time.<br/><br/>
               I further declare that the particulars/information given by me in this form are correct to the best of my knowledge.</strong>
            </p></td>
            </tr>
            <tr>
               <td class="text">Date:</td>
               <td colspan="3"><p><?php echo $stmt1->todaydate; ?></p></td>
               <td class="text">Signature:</td>
               <td colspan="2"><p><?php echo $stmt1->fullname; ?></p></td>
            </tr>
            <tr>
               <td colspan="7" ><p><strong>Note- The decision taken by the Shiksha IAS Academy on your above application shall be final and binding,</strong></p></td>
            </tr>
         </tbody>
      </table>
      <?php } ?>
      </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    window.print();
});
</script>
</body>
</html>