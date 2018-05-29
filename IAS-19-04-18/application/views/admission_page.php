<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('common/header.php');
?>
<section class="content admission">
<div class="container tab-content">
   <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Admission/ENROLMENT FORM <span class="text-theme-color-2 font-weight-400">SHIKSHA IAS ACADEMY</span>
   <img src="<?php echo base_url(); ?>assets/images/logo-wide.png" width="200" class="pl-20" /></h2>
   <hr style="border:1px solid #202c45" >
   <form method="post" action="<?php echo base_url(); ?>admission-submit" name="onlineTestSubmit" id="onlineTestSubmit" enctype="multipart/form-data">
       <div class="alert alert-danger" style="<?php if(validation_errors()){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(validation_errors()){echo validation_errors();} ?></div>
<div class="alert alert-success" style="<?php if(isset($message)){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if(isset($message)){ echo $message;} ?></div>
<div class="alert alert-success" style="<?php if($this->session->flashdata('message')){ echo 'display: block;'; }else{ echo 'display: none;'; } ?>"><?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?></div>

       
      <!--onsubmit="return validation()"-->
      <table class="table table-bordered">
         <tbody>
            <tr>
               <td class="text">1. Name(Use CAPITAL Letters)*:</td>
               <td colspan="6"><input type="text" name="fullname" placeholder="Fullname" class="form-control" id="fullname" value="<?php if(set_value('fullname')) {echo set_value('fullname'); } ?>" required /></td>
            </tr>
            <tr>
               <td class="text">2. Date of Birth*:</td>
               <td colspan="2"><input type="text" class="form-control admission_datepicker" name="dateofbirth" placeholder="Date of Birth" id="dateofbirth" value="<?php if(set_value('dateofbirth')) {echo set_value('dateofbirth'); } ?>" required></td>
               <td colspan="2" class="text">Gender*:</td>
               <td><input type="radio" name="gender" id="male" <?php if(set_value('gender') && set_value('gender') =='Male') {echo 'checked="checked"'; } ?> class="gender radio" value="Male" required> Male</td>
               <td><input type="radio" name="gender" id="female" <?php if(set_value('gender') && set_value('gender') =='Female') {echo 'checked="checked"'; } ?> class="gender radio" value="Female" required> Female</td>
            </tr>
            <tr>
               <td class="text">3. Medium in which you propose to take the classes:</td>
               <td colspan="3"><input type="radio" name="medium" id="english" <?php if(set_value('medium') && set_value('medium') =='English') {echo 'checked="checked"'; } ?> class="medium" value="English"> English </td>
               <td colspan="3"><input type="radio" name="medium" id="hindi" <?php if(set_value('medium') && set_value('medium') =='Hindi') {echo 'checked="checked"'; } ?> class="medium" value="Hindi"> Hindi </td>
            </tr>
            <tr>
               <td class="text">4. Father's Name & Mob. No. *:</td>
               <td colspan="3"><input type="text" name="father_name" placeholder="Father name" class="form-control" id="father_name" required value="<?php if(set_value('father_name')) {echo set_value('father_name'); } ?>" /></td>
               <td colspan="3"><input type="text" name="father_mobile" maxlength="10" pattern= "[0-9]{10}" maxlength="10" placeholder="Father's Mobile" class="form-control" id="father_mobile" value="<?php if(set_value('father_mobile')) {echo set_value('father_mobile'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">5. Father's Profession:</td>
               <td colspan="6"><input type="text" name="father_profession" placeholder="Father Profession" class="form-control" id="father_profession" value="<?php if(set_value('father_profession')) {echo set_value('father_profession'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">Permanent Address*: <br/>(in CAPITAL letters)</td>
               <td colspan="6"><input type="text" name="permanent_address" placeholder="Permanent Address" class="form-control" id="permanent_address" required value="<?php if(set_value('permanent_address')) {echo set_value('permanent_address'); } ?>" /></td>
            </tr>
            <tr>
               <td></td>
               <td class="text">PIN:</td>
               <td colspan="2"><input type="text" maxlength="6" pattern= "[0-9]{6}" name="permanent_pincode" placeholder="Pincode" class="form-control" id="permanent_pincode" required value="<?php if(set_value('permanent_pincode')) {echo set_value('permanent_pincode'); } ?>" /></td>
               <td class="text">Mobile:</td>
               <td colspan="2"><input type="mobile" maxlength="10" name="permanent_mobile" placeholder="Mobile" class="form-control" id="permanent_mobile" value="<?php if(set_value('permanent_mobile')) {echo set_value('permanent_mobile'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">Local Address*: <br/>(in CAPITAL letters)</td>
               <td colspan="6"><input type="text" name="local_address" placeholder="Local address" class="form-control" id="local_address" required value="<?php if(set_value('local_address')) {echo set_value('local_address'); } ?>" /></td>
            </tr>
            <tr>
               <td></td>
               <td class="text">PIN:</td>
               <td colspan="2"><input type="text" maxlength="6" pattern= "[0-9]{6}" name="local_pincode" placeholder="Pincode" class="form-control" id="local_pincode" value="<?php if(set_value('local_pincode')) {echo set_value('local_pincode'); } ?>" /></td>
               <td class="text">Mobile*:</td>
               <td colspan="2"><input type="mobile" maxlength="10" name="local_mobile" pattern= "[0-9]{10}" placeholder="Mobile Number" class="form-control" id="local_mobile" required value="<?php if(set_value('local_mobile')) {echo set_value('local_mobile'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">7. E-Mail Address*:</td>
               <td colspan="6"><input type="email" name="email" placeholder="Email ID" class="form-control" id="email_id" required value="<?php if(set_value('email')) {echo set_value('email'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">8. Mention the batch/session in which you propose to take classes:</td>
               <td colspan="3" class="text">Regular Classes<input type="text" name="regular_session" placeholder="Regular classes" class="form-control col-xs-6" id="regular_session" value="<?php if(set_value('regular_session')) {echo set_value('regular_session'); } ?>" />
               </td>
               <td colspan="3" class="text">Weekend Classes<input type="text" name="weekend_session" placeholder="Weekend classes" class="form-control col-xs-6" id="weekend_session" value="<?php if(set_value('weekend_session')) {echo set_value('weekend_session'); } ?>" />
               </td>
            </tr>
            <tr>
               <td>9. Mention the course(s) you are enrolling for:</td>
               <td colspan="3"><input type="radio" name="course" id="gsintegrated" class="course" <?php if(set_value('course') && set_value('course') =='GS Integrated Course') {echo 'checked="checked"'; } ?> value="GS Integrated Course" > GS Integrated Course</td>
               <td colspan="3"><input type="radio" name="course" id="optionalsubject" class="course" <?php if(set_value('course') && set_value('course') =='Optional Subject') {echo 'checked="checked"'; } ?> value="Optional Subject" > Optional Subject
                  <input type="text" name="course_optional_subject" placeholder="Optional subject" class="form-control col-xs-6" id="course_optional_subject" value="<?php if(set_value('course_optional_subject')) {echo set_value('course_optional_subject'); } ?>" />
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
               <td><input type="text" name="qualification_12year" placeholder="Year" class="form-control" id="qualification_12year" value="<?php if(set_value('qualification_12year')) {echo set_value('qualification_12year'); } ?>" /></td>
               <td><input type="text" name="qualification_12subject" placeholder="Subjects" class="form-control" id="12_subject" value="<?php if(set_value('qualification_12subject')) {echo set_value('qualification_12subject'); } ?>" /></td>
               <td><input type="text" name="qualification_12univ" placeholder="Board/University" class="form-control" id="12_univ" value="<?php if(set_value('qualification_12univ')) {echo set_value('qualification_12univ'); } ?>" /></td>
               <td><input type="text" name="qualification_12marks" placeholder="% of Marks" class="form-control" id="12_marks" value="<?php if(set_value('qualification_12marks')) {echo set_value('qualification_12marks'); } ?>" /></td>
               <td><input type="text" name="qualification_12division" placeholder="Division/Rank" class="form-control" id="12_division" value="<?php if(set_value('qualification_12division')) {echo set_value('qualification_12division'); } ?>" /></td>
               <td><input type="text" name="qualification_12medium" placeholder="Medium" class="form-control" id="12_medium" value="<?php if(set_value('qualification_12medium')) {echo set_value('qualification_12medium'); } ?>" /></td>
            </tr>
            <tr>
               <td>Graduation</td>
               <td><input type="text" name="qualification_Gradyear" placeholder="Year" class="form-control" id="Grad_year" value="<?php if(set_value('qualification_Gradyear')) {echo set_value('qualification_Gradyear'); } ?>" /></td>
               <td><input type="text" name="qualification_Gradsubject" placeholder="Subjects" class="form-control" id="Grad_subject" value="<?php if(set_value('qualification_Gradsubject')) {echo set_value('qualification_Gradsubject'); } ?>" /></td>
               <td><input type="text" name="qualification_Graduniv" placeholder="Board/University" class="form-control" id="Grad_univ" value="<?php if(set_value('qualification_Graduniv')) {echo set_value('qualification_Graduniv'); } ?>" /></td>
               <td><input type="text" name="qualification_Gradmarks" placeholder="% of Marks" class="form-control" id="Grad_marks" value="<?php if(set_value('qualification_Gradmarks')) {echo set_value('qualification_Gradmarks'); } ?>" /></td>
               <td><input type="text" name="qualification_Graddivision" placeholder="Division/Rank" class="form-control" id="Grad_division" value="<?php if(set_value('qualification_Graddivision')) {echo set_value('qualification_Graddivision'); } ?>" /></td>
               <td><input type="text" name="qualification_Gradmedium" placeholder="Medium" class="form-control" id="Grad_medium" value="<?php if(set_value('qualification_Gradmedium')) {echo set_value('qualification_Gradmedium'); } ?>" /></td>
            </tr>
            <tr>
               <td>Post Graduation</td>
               <td><input type="text" name="qualification_PostGyear" placeholder="Year" class="form-control" id="PostG_year" value="<?php if(set_value('qualification_PostGyear')) {echo set_value('qualification_PostGyear'); } ?>" /></td>
               <td><input type="text" name="qualification_PostGsubject" placeholder="Subjects" class="form-control" id="PostG_subject" value="<?php if(set_value('qualification_PostGsubject')) {echo set_value('qualification_PostGsubject'); } ?>" /></td>
               <td><input type="text" name="qualification_PostGuniv" placeholder="Board/University" class="form-control" id="PostG_univ" value="<?php if(set_value('qualification_PostGuniv')) {echo set_value('qualification_PostGuniv'); } ?>" /></td>
               <td><input type="text" name="qualification_PostGmarks" placeholder="% of Marks" class="form-control" id="PostG_marks" value="<?php if(set_value('qualification_PostGmarks')) {echo set_value('qualification_PostGmarks'); } ?>" /></td>
               <td><input type="text" name="qualification_PostGdivision" placeholder="Division/Rank" class="form-control" id="PostG_division" value="<?php if(set_value('qualification_PostGdivision')) {echo set_value('qualification_PostGdivision'); } ?>" /></td>
               <td><input type="text" name="qualification_PostGmedium" placeholder="Medium" class="form-control" id="PostG_medium" value="<?php if(set_value('qualification_PostGmedium')) {echo set_value('qualification_PostGmedium'); } ?>" /></td>
            </tr>
            <tr>
               <td>Additional Qualification</td>
               <td><input type="text" name="qualification_AddQyear" placeholder="Year" class="form-control" id="AddQ_year" value="<?php if(set_value('qualification_AddQyear')) {echo set_value('qualification_AddQyear'); } ?>" /></td>
               <td><input type="text" name="qualification_AddQsubject" placeholder="Subjects" class="form-control" id="AddQ_subject" value="<?php if(set_value('qualification_AddQsubject')) {echo set_value('qualification_AddQsubject'); } ?>" /></td>
               <td><input type="text" name="qualification_AddQuniv" placeholder="Board/University" class="form-control" id="AddQ_univ" value="<?php if(set_value('qualification_AddQuniv')) {echo set_value('qualification_AddQuniv'); } ?>" /></td>
               <td><input type="text" name="qualification_AddQmarks" placeholder="% of Marks" class="form-control" id="AddQ_marks" value="<?php if(set_value('qualification_AddQmarks')) {echo set_value('qualification_AddQmarks'); } ?>" /></td>
               <td><input type="text" name="qualification_AddQdivision" placeholder="Division/Rank" class="form-control" id="AddQ_division" value="<?php if(set_value('qualification_AddQdivision')) {echo set_value('qualification_AddQdivision'); } ?>" /></td>
               <td><input type="text" name="qualification_AddQmedium" placeholder="Medium" class="form-control" id="AddQ_medium" value="<?php if(set_value('qualification_AddQmedium')) {echo set_value('qualification_AddQmedium'); } ?>" /></td>
            </tr>
            <tr>
               <td colspan="7" class="text">11. Mention the year in which you have completed your last examination:</td>
            </tr>
            <tr>
               <td colspan="7"><input type="text" name="last_exam" placeholder="Last exam" class="form-control" id="last_exam" value="<?php if(set_value('last_exam')) {echo set_value('last_exam'); } ?>" /></td>
            </tr>
            <tr>
               <td colspan="7" class="text">12. Optional subjects for the Main Exam:</td>
            </tr>
            <tr>
               <td colspan="7" ><input type="text" name="optional_subject_main" placeholder="Optional subjects for the Main" class="form-control" id="optional_subject_main" value="<?php if(set_value('optional_subject_main')) {echo set_value('optional_subject_main'); } ?>" /></td>
            </tr>
            <tr>
               <td colspan="7" class="text">13. Have you appeared in the Civil Services/PCS Examination earlier ? If yes, give complete details:</td>
            </tr>
            <tr>
               <td colspan="7"><input type="text" name="appeared_civil_exam" placeholder="Civil exam" class="form-control" id="appeared_civil_exam" value="<?php if(set_value('appeared_civil_exam')) {echo set_value('appeared_civil_exam'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">14. Family background in administration, if any:</td>
               <td colspan="6"><input type="text" name="family_bground" placeholder="Family background" class="form-control" id="family_bground" value="<?php if(set_value('family_bground')) {echo set_value('family_bground'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">15. Are you still a student? If yes, give details:</td>
               <td colspan="6"><input type="text" name="is_student" placeholder="Student Details" class="form-control" id="is_student" value="<?php if(set_value('is_student')) {echo set_value('is_student'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">16. Are you employed? If yes, give details:</td>
               <td colspan="6"><input type="text" name="is_employed" placeholder="Employed details" class="form-control" id="is_employed" value="<?php if(set_value('is_employed')) {echo set_value('is_employed'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">17. Mention the newspaper(s) you read:</td>
               <td colspan="6"><input type="text" name="newspapers" placeholder="Newpaper(s) name" class="form-control" id="newspapers" value="<?php if(set_value('newspapers')) {echo set_value('newspapers'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">18. Mention the magazine(s) you read:</td>
               <td colspan="6"><input type="text" name="magazines" placeholder="Magzine(s) name" class="form-control" id="magazines" value="<?php if(set_value('magazines')) {echo set_value('magazines'); } ?>" /></td>
            </tr>
            <tr>
               <td class="text">19. Do you require hostel facility?</td>
               <td colspan="3"><input type="radio" name="hostel" id="hostel_yes" class="hostel" <?php if(set_value('hostel') && set_value('hostel') =='Yes') {echo 'checked="checked"'; } ?> value="Yes"> Yes </td>
               <td colspan="3"><input type="radio" name="hostel" id="hostel_no" class="hostel" <?php if(set_value('hostel') && set_value('hostel') =='No') {echo 'checked="checked"'; } ?> value="No" > No</td>
            </tr>
            <tr>
               <td colspan="7" class="text">20. Has anybody recommended the Shiksha IAS Academy to you? If yes, tick appropraite box.</td>
            </tr>
            <tr>
               <td><input type="radio" name="recommended" id="parents" class="recommended" value="Parents"> Parents</td>
               <td><input type="radio" name="recommended" id="recommended_friends" class="recommended" <?php if(set_value('recommended') && set_value('recommended') =='Friends') {echo 'checked="checked"'; } ?> value="Friends" > Friends</td>
               <td><input type="radio" name="recommended" id="recommended_teachers" class="recommended" <?php if(set_value('recommended') && set_value('recommended') =='Teachers') {echo 'checked="checked"'; } ?> value="Teachers"> Teachers</td>
               <td><input type="radio" name="recommended" id="recommended_newspapers" class="recommended" <?php if(set_value('recommended') && set_value('recommended') =='Newspapers') {echo 'checked="checked"'; } ?> value="Newspapers"> Newspapers</td>
               <td><input type="radio" name="recommended" id="recommended_magzines" class="recommended" <?php if(set_value('recommended') && set_value('recommended') =='Magzines') {echo 'checked="checked"'; } ?> value="Magzines" > Magazines</td>
               <td><input type="radio" name="recommended" id="recommended_internet" class="recommended" <?php if(set_value('recommended') && set_value('recommended') =='Internet') {echo 'checked="checked"'; } ?> value="Internet"> Internet</td>
               <td></td>
            </tr>
             <tr>
               <td colspan="7"><p>I hereby undertake to obey and comply with all the rules & regulations of Study Circle, which I have read and <br/>
               understood, in force from time to time.<br/>
               I further declare that the particulars/information given by me in this form are correct to the best of my knowledge.
            </p></td>
            </tr>
            <tr>
               <td class="text">Date:</td>
               <td colspan="2"><input type="text" name="todaydate" id="todaydate" class="admission_datepicker col-sm-6 form-control" placeholder="Select Date" required value="<?php if(set_value('todaydate')) {echo set_value('todaydate'); } ?>" ></td>
               <td></td>
               <td class="text">Signature:</td>
               <td colspan="2"><input type="text" name="signature" placeholder="Full name" class="form-control col-sm-6" required value="<?php if(set_value('signature')) {echo set_value('signature'); } ?>" /></td>
            </tr>
            <tr>
               <td colspan="7" ><p><strong>Note- The decision taken by the Shiksha IAS Academy on your above application shall be final and binding,</strong></p></td>
            </tr>
         </tbody>
      </table>

      <input type="submit" id="admission_submit" name="admission_submit" value="SUBMIT / PRINT" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">
      <button type="reset" name="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-20 mb-sm-30 border-left-theme-color-2-4px">RESET</button>
   </form>
</div>
</section>
	  <?php include("common/footer.php"); ?>
	  <script>
    $(function(){
            $(".admission_datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                var date = $(this).val();
            }
        });
    });
    </script>
   </body>
</html>