/*
 * IIFE to avoid global namespace pollution and keep code safe.
 */
(function(){
    /*
     * creating a factory called quizMetrics and attaching that to the 
     * turtleFacts module. 
     *
     * This factories job is to hold all the data the pertains to the quiz. 
     * This could be:
     *          -the questions themselves. What kind of question it is(text or 
     *              image)
     *          -Whether the current question has been answered or is still 
     *              blank. 
     *          -Hold data to show if quiz is active, results are active or 
     *              neither
     *          -Method to change the state of the quiz and results (active or
     *              inactive)
     *          -Hold what the actual correct answers are
     *          -Method to mark the answers
     *          -hold how many correct answers the user gave
     *          
     */
    angular
        .module("iasShiksha")
        .factory("quizMetrics", QuizMetrics);

        /*
         * dependency injection as seen in all the controllers. See comments 
         * there for a deeper explaination of dependency injection
         */
        QuizMetrics.$inject = ['DataService'];

        /*
         * function definition for the factory
         */
        function QuizMetrics(DataService){
            /*
             * quizObj is an object that will hold all of the above mentioned 
             * properties and methods and will be the return value of the 
             * factory
             *
             * As per pattern used in the controllers, the methods will 
             * reference named functions that are at the bottom of this function
             */
            var quizObj = {
                quizActive: false,
                resultsActive: false,
                changeState: changeState, // changeState is a named function below
                correctAnswers: [],
                countTimer:countTimer,
                markQuiz: markQuiz, // markQuiz is a named function below
                getResultDetails : getResultDetails,
                numCorrect: 0
            };

            /*
             * Return the quizObj. This is done near the top of the function to
             * allow a quick glance above the fold in the code to see 
             * functionality. Implementation of that functionality can then be
             * seen by scrolling down.
             */
            return quizObj;
            
            function countTimer(){
            var timer = setInterval(function(){
                DataService.usertimetakken++;
                timer_countdown = DataService.usertimetakken;
                var getTimer = GetTimer();
                if(getTimer >= 7200){
                    
                    alert("The Given Time is Exceed. Your test will be automatically save once you click OK");
                    
                    markQuiz();
                    changeState("quiz", false);
                    changeState("results", true);
                    getResultDetails();
                    DataService.ajaxcall();
                    clearInterval(timer)
                }
            }, 1000);  
        }

            /*
             * Function to change the state of either the quiz or the results.
             *
             * It accepts two arguments, one is which metric to change (quiz or
             * results) and the other is what to change the state too.
             */
            function changeState(metric, state){
                if(metric === "quiz"){
                    quizObj.quizActive = state;
                }else if(metric === "results"){
                    quizObj.resultsActive = state;
                }else{
                    return false;
                }
            }
            
            
            function getResultDetails(){
            /*
             * simply calculating the percentage of correct answers and returning the number
             */
             var calculate = quizObj.numCorrect / DataService.quizQuestions.length * 100;
             DataService.userQuizResult['calculatePerc']=calculate;
            // set quizLength variable to keep code clean
            var quizLength = DataService.quizQuestions.length;
            
            var questionsAnswered = 0;
            //For loop added to loop through all questions and recount questions
            //that have been answered. This avoids infinite loops.
            for(var x = 0; x < quizLength; x++){
                if(DataService.quizQuestions[x].selected !== null){
                    questionsAnswered++;
                }
            }
            DataService.userQuizResult['questionAnswered']= questionsAnswered;
            //Set quizLength variable to keep code clean
            var wrongAnswered = DataService.quizQuestions.length - quizObj.numCorrect;
            DataService.userQuizResult['TotalQuestion']= DataService.quizQuestions.length;
            DataService.userQuizResult['numCorrect']= quizObj.numCorrect;
            DataService.userQuizResult['wrongAnswered']= wrongAnswered;
            //Set quizLength variable to keep code clean
            var result;
            if(quizObj.numCorrect){
             result = (quizObj.numCorrect - ((questionsAnswered - quizObj.numCorrect) / 3)) * 2;
            }else{
                result = quizObj.numCorrect;
            }
            DataService.userQuizResult['marks']=result;
            }

            /*
             * When called, the markQuiz method will loop through all the users
             * answers and compare them to the know correct answers to each
             * question. The total number of correct answers by the user is 
             * calculated and saved in the numCorrect property of the quizObj 
             * object
             */
            function markQuiz(){
                DataService.userQuizResult['Selected_Questions']=[];
                DataService.userQuizResult['Selected_Answers'] = [];
                quizObj.correctAnswers = DataService.correctAnswers;
                for(var i = 0; i < DataService.quizQuestions.length; i++){
                    if(DataService.quizQuestions[i].selected != null){
                        DataService.userQuizResult['Selected_Answers'].push(DataService.quizQuestions[i].selected + 1);
                        DataService.userQuizResult['Selected_Questions'].push(i + 1);
                    }
                    
                    if(DataService.quizQuestions[i].selected === DataService.correctAnswers[i]){
                        DataService.quizQuestions[i].correct = true;
                        quizObj.numCorrect++;
                    }else{
                        DataService.quizQuestions[i].correct = false;
                    }
                }
            }
        }
})();