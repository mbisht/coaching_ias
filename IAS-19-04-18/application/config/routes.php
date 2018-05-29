<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'error';
$route['translate_uri_dashes'] = FALSE;

$route['about-us'] = "page/about";
$route['courses'] = "page/courses";
$route['foundation'] = "page/foundation";
$route['prelims'] = "page/prelims";
$route['mains-course'] = "page/mains_course";
$route['fee-payment'] = "page/fee_payment";
$route['optional-course'] = "page/optional";
$route['daily-quiz'] = "page/daily_quiz";
$route['start-quiz'] = "page/start_quiz";
$route['date-quiz'] = "page/date_quiz";
$route['quiz-user-details'] = "login/quiz_user_details";

$route['submit_quiz'] = "page/submit_quiz";
$route['submit_online_test'] = "page/submit_online_test";
$route['daily-news'] = "page/daily_news";
$route['load-daily-news'] = "page/load_daily_news";
$route['news-article'] = "page/daily_news_article";
$route['load-daily-news-article'] = "page/load_daily_news_article";
$route['faculty'] = "page/faculty";
$route['gallery'] = "page/gallery";

$route['about-cs-exam'] = "civil/about_cs_exam";
$route['civil-services'] = "civil/civil_services";
$route['civil-services-eligibility-criteria'] = "civil/civil_services_eligibility_criteria";
$route['civil-services-syllabus'] = "civil/civil_services_syllabus";
$route['upsc-notification'] = "civil/upsc_notification";

$route['current-affair'] = "page/current_affair";
$route['siasa-blog'] = "page/siasa_blog";
$route['siasa-videos'] = "page/siasa_videos";
$route['load-siasa-video'] = "page/load_siasa_video";
$route['material'] = "page/materials";

$route['study-resources'] = "resource/study_resources";
$route['upsc-box'] = "resource/upsc_box";
$route['weekly-currentaffair'] = "resource/weekly_currentaffair";
$route['load-weekly-currentaffair'] = "resource/load_weekly_currentaffair";

$route['daily-currentaffair'] = "resource/daily_currentaffair";
$route['load-daily-currentaffair'] = "resource/load_daily_currentaffair";

$route['online-test-prelims'] = "resource/online_test_prelims";
$route['online-test-prelims/(:any)'] = "resource/start_online_test/$1";
$route['print-prelims'] = "resource/print_prelims";


$route['online-test-mains'] = "resource/online_test_mains";
$route['online-test-mains-submit'] = "resource/online_test_mains_submit";
$route['online-test-optional'] = "resource/online_test_optional";
$route['online-test-optional-submit'] = "resource/online_test_optional_submit";

$route['monthly-currentaffair'] = "resource/monthly_currentaffair";
$route['load-monthly-currentaffair'] = "resource/load_monthly_currentaffair";
$route['guest-blog'] = "resource/guest_blog";
$route['guest-blog/(:any)'] = "resource/view_guest_blog/$1";

$route['contact-us'] = "page/contact";
$route['contact-submission'] = "page/contact_submission";
$route['home-contact-submission'] = "page/home_contact_submission";
$route['careers'] = "page/careers";
$route['career-submit'] = "page/career_submit";
$route['admission'] = "page/admission";
$route['admission-submit'] = "page/admission_submit";

$route['login-page-submission'] = "login/submission_page";
$route['login-submission'] = "login/submission";
$route['signup-submission'] = "login/signup_submission";
$route['new-enquiry-submission'] = "login/enquiry_submission";
$route['new-admission-submission'] = "login/admission_submission";
$route['new-subscription-submission'] = "login/subscription_submission";

$route['login'] = "login/page";
$route['logout'] = "login/logout";
$route['forgot_password'] = "login/forgot_password";

$route['my-account'] = "account";
$route['add-guest-blog'] = "account/add_blog";
$route['add-blog-submit'] = "account/add_blog_submit";

$route['change-password'] = "account/change_password";
$route['change-password-submission'] = "account/change_password_submission";
$route['view-prelims-test-result'] = "account/prelims_test_result";
$route['view-mains-test-result'] = "account/mains_test_result";
$route['view-optional-test-result'] = "account/optional_test_result";

$route['my-complaint'] = "account/my_complaint";
$route['view-complaint'] = "account/view_complaint";
$route['new-complaint-submission'] = "account/complaint_submission";

$route['download'] = "page/download_app";

//API
$route['api_add_guest_blog'] = "api/add_guest_blog";
$route['api_submit_mains_test'] = "api/submit_main_test";
$route['api_submit_optional_test'] = "api/submit_optional_test";
$route['api_check_user_to_access_test'] = "api/check_user_to_access_test";
