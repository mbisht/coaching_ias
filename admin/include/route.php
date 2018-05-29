<?php
if(!session_id()){
session_start();
}
ob_start();

ini_set("date.timezone", "Asia/Kolkata");
include DIR_APPLICATION.'include/db.php';
$reg_user = new USER1();
require_once(DIR_APPLICATION.'include/class.user.php');
//$id = $_GET['id'];

$url = strtok(rtrim($_SERVER['REQUEST_URI'], "/"), "?");
$ur = explode("/", $url);
$last_url = array_pop($ur);

if(isset($_SESSION['userSession'])) {

if($last_url === "") {
include DIR_APPLICATION.'include/index.php';
}else if($last_url === "index") {
include DIR_APPLICATION.'include/index.php';
}elseif ($last_url === "login") {
include DIR_APPLICATION.'include/login.php';
}elseif ($last_url === "register") {
include DIR_APPLICATION.'include/register.php';
}elseif ($last_url === "register_db") {
include DIR_APPLICATION.'include/register_db.php'; 
}elseif ($last_url === "header") {
include DIR_APPLICATION.'include/header.php';
}elseif ($last_url === "style") {
include DIR_APPLICATION.'include/style.php';
}elseif ($last_url === "class.user") {
include DIR_APPLICATION.'include/class.user.php';
}elseif ($last_url === "dbconfig") {
include DIR_APPLICATION.'include/dbconfig.php';
}elseif ($last_url === "db") {
include DIR_APPLICATION.'include/db.php'; 
}elseif ($last_url === "login_db") {
include DIR_APPLICATION.'include/login_db.php';
}elseif ($last_url === "logout") {
include DIR_APPLICATION.'include/logout.php';
}

//USER LIST
elseif ($last_url === "user-list") {
include DIR_APPLICATION.'userlist/user-list.php';
}elseif ($last_url === "edit-user-list") {
include DIR_APPLICATION.'userlist/edit-user-list.php';
}elseif ($last_url === "userstatusupdate") {
include DIR_APPLICATION.'userlist/userstatusupdate.php';
}elseif ($last_url === "change-prelims-test-access") {
include DIR_APPLICATION.'userlist/change-prelims-test-access.php';
}

//REQUEST
elseif ($last_url === "view-new-admission") {
include DIR_APPLICATION.'complaints/view-new-admission.php';
}elseif ($last_url === "view-user-enquiry-request") {
include DIR_APPLICATION.'complaints/view-user-enquiry-request.php';
}elseif ($last_url === "view-subscribe-list") {
include DIR_APPLICATION.'complaints/view-subscribe-list.php';
}elseif ($last_url === "view-print-admission") {
include DIR_APPLICATION.'complaints/view-print-admission.php';
}

//QUIZ
elseif ($last_url === "view-quiz-questions") {
include DIR_APPLICATION.'quiz/view-quiz-questions.php';
}elseif ($last_url === "add-quiz-questions") {
include DIR_APPLICATION.'quiz/add-quiz-questions.php';
}elseif ($last_url === "edit-quiz-question") {
include DIR_APPLICATION.'quiz/edit-quiz-question.php';
}elseif ($last_url === "view-quiz-results") {
include DIR_APPLICATION.'quiz/view-quiz-results.php';
}elseif ($last_url === "view-quiz-results-details") {
include DIR_APPLICATION.'quiz/view-quiz-results-details.php';
}

//PRELIMS ONLINE TEST
elseif ($last_url === "view-prelims-questions") {
include DIR_APPLICATION.'course/view-prelims-questions.php';
}elseif ($last_url === "add-prelims-questions") {
include DIR_APPLICATION.'course/add-prelims-questions.php';
}elseif ($last_url === "edit-prelims-question") {
include DIR_APPLICATION.'course/edit-prelims-questions.php';
}elseif ($last_url === "view-prelims-results") {
include DIR_APPLICATION.'course/view-prelims-results.php';
}elseif ($last_url === "view-prelims-results-details") {
include DIR_APPLICATION.'course/view-prelims-results-details.php';
}elseif ($last_url === "view-prelims-questions-details") {
include DIR_APPLICATION.'course/view-prelims-questions-details.php';
}elseif ($last_url === "prelims-questions-statusupdate") {
include DIR_APPLICATION.'course/prelims-questions-statusupdate.php';
}

//MAINS ONLINE TEST
elseif ($last_url === "view-mains-questions") {
include DIR_APPLICATION.'course/view-mains-questions.php';
}elseif ($last_url === "add-mains-questions") {
include DIR_APPLICATION.'course/add-mains-questions.php';
}elseif ($last_url === "edit-mains-question") {
include DIR_APPLICATION.'course/edit-mains-questions.php';
}elseif ($last_url === "view-mains-results") {
include DIR_APPLICATION.'course/view-mains-results.php';
}elseif ($last_url === "upload-mains-corrected-file") {
include DIR_APPLICATION.'course/upload-mains-corrected-file.php';
}

//OPTINAOL ONLINE TEST
elseif ($last_url === "view-optionals-questions") {
include DIR_APPLICATION.'course/view-optionals-questions.php';
}elseif ($last_url === "add-optionals-questions") {
include DIR_APPLICATION.'course/add-optionals-questions.php';
}elseif ($last_url === "edit-optionals-question") {
include DIR_APPLICATION.'course/edit-optionals-questions.php';
}elseif ($last_url === "view-optionals-results") {
include DIR_APPLICATION.'course/view-optionals-results.php';
}elseif ($last_url === "upload-optional-corrected-file") {
include DIR_APPLICATION.'course/upload-optional-corrected-file.php';
}

//Course
elseif ($last_url === "view-course-details") {
include DIR_APPLICATION.'course/view-course-details.php';
}elseif ($last_url === "add-course-details") {
include DIR_APPLICATION.'course/add-course-details.php';
}elseif ($last_url === "edit-course-details") {
include DIR_APPLICATION.'course/edit-course-details.php';
}

//DAILY NEWS
elseif ($last_url === "view-daily-news") {
include DIR_APPLICATION.'news/view-daily-news.php';
}elseif ($last_url === "add-daily-news") {
include DIR_APPLICATION.'news/add-daily-news.php';
}elseif ($last_url === "edit-daily-news") {
include DIR_APPLICATION.'news/edit-daily-news.php';
}

//DAILY NEWS ARTICLE
elseif ($last_url === "view-article-daily-news") {
include DIR_APPLICATION.'news/view-daily-news-article.php';
}elseif ($last_url === "add-article-daily-news") {
include DIR_APPLICATION.'news/add-daily-news-article.php';
}elseif ($last_url === "edit-daily-news-article") {
include DIR_APPLICATION.'news/edit-daily-news-article.php';
}

//FACULTY
elseif ($last_url === "add-faculty") {
include DIR_APPLICATION.'faculty/add-faculty.php';
}elseif ($last_url === "view-faculty") {
include DIR_APPLICATION.'faculty/view-faculty.php';	
}elseif ($last_url === "edit-faculty-list") {
include DIR_APPLICATION.'faculty/edit-faculty-list.php';	
}
//CAREER
elseif ($last_url === "view-career-list") {
include DIR_APPLICATION.'careers/view-career-list.php';	
}
//GUESTBLOG
elseif ($last_url === "view-guestblog") {
include DIR_APPLICATION.'guestblog/view-guestblog.php';	
}elseif ($last_url === "viewguestblogstatusupdate") {
include DIR_APPLICATION.'guestblog/viewguestblogstatusupdate.php';
}elseif ($last_url === "edit-guest-blog") {
include DIR_APPLICATION.'guestblog/edit-guest-blog.php';
}
//SISA VIDEOS
elseif ($last_url === "add-sisavideos") {
include DIR_APPLICATION.'sisavideo/add-sisavideos.php';
}elseif ($last_url === "view-sisavideos") {
include DIR_APPLICATION.'sisavideo/view-sisavideos.php';	
}elseif ($last_url === "edit-sisavideos-list") {
include DIR_APPLICATION.'sisavideo/edit-sisavideos-list.php';	
}
//MATERIALS- Study Resources
elseif ($last_url === "add-study-material") {
include DIR_APPLICATION.'material/add-study-material.php';
}elseif ($last_url === "view-study-material") {
include DIR_APPLICATION.'material/view-study-material.php';	
}elseif ($last_url === "edit-study-material") {
include DIR_APPLICATION.'material/edit-study-material-list.php';	
}
//MATERIALS- UPSC BOX
elseif ($last_url === "add-upsc-box-material") {
include DIR_APPLICATION.'material/add-upsc-box-material.php';
}elseif ($last_url === "view-upsc-box-material") {
include DIR_APPLICATION.'material/view-upsc-box-material.php';	
}elseif ($last_url === "edit-upsc-box-material") {
include DIR_APPLICATION.'material/edit-upsc-box-material.php';	
}

//GALLERIES 
elseif ($last_url === "add-gallery") {
include DIR_APPLICATION.'gallery/add-gallery.php';
}elseif ($last_url === "view-gallery") {
include DIR_APPLICATION.'gallery/view-gallery.php';	
}

//ACHIVERS 
elseif ($last_url === "add-achivers") {
include DIR_APPLICATION.'achiever/add-achivers.php';
}elseif ($last_url === "view-achivers") {
include DIR_APPLICATION.'achiever/view-achivers.php';	
}

//MOVING SLIDER MARQUEE 
elseif ($last_url === "add-slider-marquee") {
include DIR_APPLICATION.'notification/add-slider-marquee.php';
}elseif ($last_url === "view-slider-marquee") {
include DIR_APPLICATION.'notification/view-slider-marquee.php';	
}

//MOVING SLIDER NOTIFICATION 
elseif ($last_url === "add-notification-slider") {
include DIR_APPLICATION.'notification/add-notification-slider.php';
}elseif ($last_url === "view-notification-slider") {
include DIR_APPLICATION.'notification/view-notification-slider.php';	
}

//WEEKLY CURRENT AFFAIRS
elseif ($last_url === "add-weekly-current-affair") {
include DIR_APPLICATION.'currentaffair/add-weekly-current-affair.php';
}elseif ($last_url === "view-weekly-current-affair") {
include DIR_APPLICATION.'currentaffair/view-weekly-current-affair.php';	
}elseif ($last_url === "edit-weekly-current-affair-list") {
include DIR_APPLICATION.'currentaffair/edit-weekly-current-affair-list.php';	
}

//MONTHLY CURRENT AFFAIRS
elseif ($last_url === "add-monthly-current-affair") {
include DIR_APPLICATION.'currentaffair/add-monthly-current-affair.php';
}elseif ($last_url === "view-monthly-current-affair") {
include DIR_APPLICATION.'currentaffair/view-monthly-current-affair.php';	
}elseif ($last_url === "edit-monthly-current-affair-list") {
include DIR_APPLICATION.'currentaffair/edit-monthly-current-affair-list.php';	
}


//DAILY CURRENT AFFAIRS
elseif ($last_url === "add-daily-current-affair") {
include DIR_APPLICATION.'currentaffair/add-daily-current-affair.php';
}elseif ($last_url === "view-daily-current-affair") {
include DIR_APPLICATION.'currentaffair/view-daily-current-affair.php';	
}elseif ($last_url === "edit-daily-current-affair-list") {
include DIR_APPLICATION.'currentaffair/edit-daily-current-affair-list.php';	
}

//HOME Page Details THUMBNAIL NOTIFICATION- VIDEOS 
elseif ($last_url === "add-thumbnail-notification-video") {
include DIR_APPLICATION.'thumbnail/add-thumbnail-notification-video.php';
}elseif ($last_url === "view-thumbnail-notification-video") {
include DIR_APPLICATION.'thumbnail/view-thumbnail-notification-video.php';
}elseif ($last_url === "view-directors-message") {
include DIR_APPLICATION.'thumbnail/view-directors-message.php';
}elseif ($last_url === "edit-directors-message") {
include DIR_APPLICATION.'thumbnail/edit-directors-message.php';
}

//PUSH NOTIFICATION
elseif ($last_url === "view-mobile-notification") {
include DIR_APPLICATION.'notification/view-mobile-notification.php';
}elseif ($last_url === "add-mobile-notification") {
include DIR_APPLICATION.'notification/add-mobile-notification.php';	
}

//ADMIN
elseif ($last_url === "view-admin-list") {
include DIR_APPLICATION.'accounts/view-admin-list.php';
}elseif ($last_url === "add-new-admin") {
include DIR_APPLICATION.'accounts/add-new-admin.php';
}elseif ($last_url === "view-sales-list") {
include DIR_APPLICATION.'accounts/view-sales-list.php';
}elseif ($last_url === "add-new-salesman") {
include DIR_APPLICATION.'accounts/add-new-salesman.php';
}elseif ($last_url === "adminuserstatusupdate") {
include DIR_APPLICATION.'accounts/adminuserstatusupdate.php';
}elseif ($last_url === "salesupdatestatus") {
include DIR_APPLICATION.'accounts/salesupdatestatus.php';
}elseif ($last_url === "edit-admin-list") {
include DIR_APPLICATION.'accounts/edit-admin-list.php';
}elseif ($last_url === "edit-sales-list") {
include DIR_APPLICATION.'accounts/edit-sales-list.php';
}

else{
include DIR_APPLICATION.'include/index.php';
}

}elseif ($last_url === "login_db") {
include DIR_APPLICATION.'include/login_db.php';
}elseif ($last_url === "logout") {
include DIR_APPLICATION.'include/logout.php';
}elseif ($last_url === "login") {
include DIR_APPLICATION.'include/login.php';
}else{
include DIR_APPLICATION.'include/login.php';
}
?>