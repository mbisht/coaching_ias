/*
 * IIFE to encapsulate code and avoid global variables
 */
(function(){

    /*
     * attaching results controller function to the turtleFacts module 
     */
    angular
        .module("iasShiksha")
        .controller("resultsCtrl", ResultsController);

    /*
     * injecting the custom service quizMetrics into the results controller 
     * using the $inject method.
     *
     * Injecting dependencies like this is done so as to avoid issues when 
     * uglifying the code. Function arguments will get shortened during the 
     * uglify process but strings will not. Therefore by injecting the argument
     * as strings in an array using the $inject method we can be sure angular 
     * still knows what we want to do.
     */
    ResultsController.$inject = ['quizMetrics', 'DataService'];

    /*
     * definition of the results controller function itself. Taking 
     * quizMetrics as an argument
     */
    function ResultsController(quizMetrics, DataService){
        var vm = this;

        /*
         * The pattern used in the controllers in this app puts all the 
         * properties and methods available to the view at the top of the 
         * function. Any methods are referenced as named functions which are 
         * defined at the bottom.
         *
         * This allows the interface of the controller to be seen at a glance. 
         * Which is not usually the case when defining methods as anon 
         * functions inline.
         */
        vm.quizMetrics = quizMetrics; // binding the object from factory to vm 
        vm.dataService = DataService;
        vm.getAnswerClass = getAnswerClass; // named function defined below
        vm.setActiveQuestion = setActiveQuestion; // named function defined below
        vm.reset = reset; // named function defined below
        vm.calculatePerc = calculatePerc; // named function defined below
        vm.getquestionAnswered = getquestionAnswered; // named function defined below
        vm.getwrongAnswered = getwrongAnswered;
        vm.getmarks = getmarks;
        vm.getUnanswered = getUnanswered;
        vm.activeQuestion = 0;

        function calculatePerc(){
            /*
             * simply calculating the percentage of correct answers and returning the number
             */
             var calculate = quizMetrics.numCorrect / DataService.quizQuestions.length * 100;
             DataService.userQuizResult['calculatePerc']=calculate;
            return calculate;
        }

        function setActiveQuestion(index){
            /*
             * setting active question on the results page
             */
            vm.activeQuestion = index;
        }

        function getAnswerClass(index){
            /*
             * returning the class to style the answer depending on whether it 
             * is right or wrong. quizMetrics can be referenced here without 
             * vm. as the object is passed by reference. We can manipulate 
             * the object directly here. vm. is only needed when it is being
             * manipulated by the view as the view does not have direct access
             * to the quizMetrics service. But as we are in the controller
             * we can directly manipulate it
             */
            if(index === quizMetrics.correctAnswers[vm.activeQuestion]){
                return "bg-success";
            }else if(index === DataService.quizQuestions[vm.activeQuestion].selected){
                return "bg-danger";
            }
        }
        
        function getquestionAnswered(){
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
            return questionsAnswered;
        }
        
        function getwrongAnswered(){
            // set quizLength variable to keep code clean
            var wrongAnswered = DataService.userQuizResult['questionAnswered'] - quizMetrics.numCorrect;
            DataService.userQuizResult['TotalQuestion']= DataService.quizQuestions.length;
            DataService.userQuizResult['numCorrect']= quizMetrics.numCorrect;
            DataService.userQuizResult['wrongAnswered']= wrongAnswered;
            return wrongAnswered;
        }
        function getmarks(){
            // set quizLength variable to keep code clean
            var result;
            if(quizMetrics.numCorrect){
             result = (2 * quizMetrics.numCorrect - ( 2 * (DataService.userQuizResult['questionAnswered'] - quizMetrics.numCorrect) / 3));
            }else{
                result = 0;
            }
            
            DataService.userQuizResult['marks']=result;
            return result;
        }
        
        function getUnanswered(){
            return (DataService.quizQuestions.length - DataService.userQuizResult['questionAnswered']);
        }
        
        function reset(){
            /*
             * reseting all the data. This includes reverting the results state
             * back to false which will return the view to the lists.
             *
             * Also all the variables on each question object is returned to 
             * the default state using the for loop to iterate through all 
             * questions.
             */
            quizMetrics.changeState("results", false);
            quizMetrics.numCorrect = 0;
            DataService.usertimetakken = 0;

            for(var i = 0; i < DataService.quizQuestions.length; i++){
                var data = DataService.quizQuestions[i]; //binding the current question to data to keep code clean
                data.selected = null;
                data.correct = null;
            }
        }
    }
})();
