<?php
$activepage="daily-quiz";
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" ng-app="iasShiksha">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<base href="<?php echo base_url(); ?>" />

<meta name="description" content="Best IAS Academy in Bangalore |Best IAS coaching in Bangalore" />
<meta name="keywords" content="IAS Academy, IAS coaching, course, education, education html theme, elearning, learning," />
<meta name="author" content="ThemeMascot" />
<!-- Page Title -->
<title>Shiksha IAS</title>
<!-- Favicon and Touch Icons -->
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="shortcut icon" type="image/jpeg">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="72x72">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="114x114">
<link href="<?php echo base_url(); ?>assets/images/favi_ico.jpeg" rel="apple-touch-icon" sizes="144x144">

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/css-plugin-collections.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="<?php echo base_url(); ?>assets/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/css/preloader.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo base_url(); ?>assets/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/style-main.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
</head>
<body class="">
<section class="content quiz" id="start_quiz_content">
    <div class="container">
    <button class="btn btn-primary" onclick='printDiv();'>Print</button>
    </div>
	<div class="container" id="prelims_test_result_content2">
	    <?php //print_r($lastPrelimsQuestions);
	    
	    foreach($lastPrelimsResult as $value){ ?>
			<h2 class="ng-binding"><?php if(is_array($getUserDetails) && $getUserDetails[0]['full_name']){ echo $getUserDetails[0]['full_name']." (".$getUserDetails[0]['id'].")"; } ?>'s Prelims Results</h2>
			<div class="col-xs-12 top-buffer ">
                    <h2 class="result-msg">Total Questions: <span><?php echo $value['total_questions'];?></span></h2>
                    <h2 class="result-msg">User Answered Questions: <span><?php echo $value['answered_questions'];?></span></h2>
                    <h2 class="result-msg">Correct Answered: <span><?php echo $value['corrected_answers'];?></span></h2>
                    <h2 class="result-msg">Wrong Answered: <span><?php echo ($value['answered_questions'] - $value['corrected_answers']);?></span></h2>
                    <h2 class="result-msg">Not Answered: <span><?php echo ($value['total_questions'] - $value['answered_questions']);?></span></h2>
                    <h2 class="result-msg">User Percentage: <span><?php echo $value['percentage'];?></span></h2>
                    <h2 class="result-msg">User Marks: <span><?php echo $value['marks'];?></span></h2>
                    <h2 class="result-msg">For Every wrong Answer: <span>-(2/3) or -(0.67)</span></h2>
               </div>
               <br />
	    <?php
			$question_id = json_decode($value['question_id']);
			$selected_answers = json_decode($value['selected_answers']);
			$count = 1;
			foreach($question_id as $key_ques=>$value_ques){
            $selected_questions = false;
            if(in_array($count,json_decode($value['selected_questions']))){
                $selected_questions = true;
                $pos_arr = array_search($count, json_decode($value['selected_questions']));
            }
            ?>
            <br />
			<div class="all-results ng-scope ">
               <h3 class="title">Question <?php echo $count; ?>: <small><?php if($selected_questions){ echo "<span class='selected alert alert-success'>Answered</span>"; }else{echo "<span class='not-selected alert alert-danger'>Not Answered</span>"; } ?></small></h3>
               <div class="well well-sm">
                   <div class="row">
                       <div class="col-xs-12">
                           <h4 class="ng-binding"><?php echo $count.". ".$lastPrelimsQuestions[$value_ques][0]['question_title']; ?></h4>
                           <div class="row ng-scope">
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '1'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '1'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">1. <?php echo $lastPrelimsQuestions[$value_ques][0]['option1']; ?></div>
                                       <?php
                                       if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '1'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '1'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '2'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '2'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">2. <?php echo $lastPrelimsQuestions[$value_ques][0]['option2']; ?></div>
                                       <?php
                                       if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '2'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '2'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '3'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '3'){echo 'bg-danger';}?>">
                                       <div class="ng-binding">3. <?php echo $lastPrelimsQuestions[$value_ques][0]['option3']; ?></div>
                                       <?php
                                       if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '3'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '3'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                               <div class="col-sm-6 ng-scope">
                                   <h4 class="answer <?php if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '4'){ echo 'bg-success'; }elseif($selected_questions && $selected_answers[$pos_arr] == '4'){echo 'bg-danger';}?>" >
                                       <div class="ng-binding">4. <?php echo $lastPrelimsQuestions[$value_ques][0]['option4']; ?></div>
                                       <?php
                                       if($lastPrelimsQuestions[$value_ques][0]['correct_answer'] == '4'){?>
                                       <p class="pull-right Correct-Answer">Correct Answer</p>
                                       <?php }elseif($selected_questions && $selected_answers[$pos_arr] == '4'){?>
                                       <p class="pull-right Your-Answer">User Answer</p>
                                       <?php }?>
                                   </h4>
                               </div>
                           </div>
                           </div>
                       </div><!-- row -->
                   </div>
               </div>
               <?php $count++; } } ?>
    </div>
</section>
<script>
$(document).ready(function () {
window.print();
});

function printDiv(){
    window.print();
}
</script>
</body>
</html>