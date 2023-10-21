app.controller('quizController', function ($scope, $http, $location) {
    document.getElementById("quiz").style.display = "none";

    $scope.selectedAnswers = [];

    $scope.lastSelectedAnswer = ""; // Add this variable to store the last selected answer
    $scope.currentQuestionIndex = 0;
    $scope.nextQuestion = function () {
        var currentQuestion = $scope.questions[$scope.currentQuestionIndex];

        // Check if the user has selected an answer
        if (!currentQuestion.selectedAnswer) {
            messageError("আপনার উত্তর সিলেক্ট করুন");
            return; // Don't proceed to the next question
        }

        // Check if the selected answer is correct
        if (currentQuestion.selectedAnswer !== currentQuestion.correctAnswer) {

            messageError("আপনার উত্তর ভুল হয়েছে ");
            return; // Don't proceed to the next question
        }

        // If the answer is correct or selected, proceed to the next question
        $scope.currentQuestionIndex++;
    };



    $scope.selectAnswer = function (question, answer) {
        question.selectedAnswer = answer;
        console.log(question.selectedAnswer+' answer')
        $scope.lastSelectedAnswer = answer; // Update the last selected answer
        console.log($scope.lastSelectedAnswer+' latest')
    };


    $scope.answerSave = function () {
        var incorrectAnswers = [];
        var unansweredQuestions = [];

        $scope.questions.forEach(function (question, index) {
            if (!question.selectedAnswer) {
                // Add the question number to the list of unanswered questions
                unansweredQuestions.push(index + 1);
            } else if (question.selectedAnswer !== question.correctAnswer) {
                // Add an error message for incorrect answers
                var errorMessage = "প্রশ্ন " + (index + 1) + ": আপনার উত্তর ভুল.\n";
                errorMessage += "   আপনার উত্তর: " + question.selectedAnswer + "\n";
                /* errorMessage += "   Correct answer: " + question.correctAnswer + "\n";*/
                incorrectAnswers.push(errorMessage);
            }
        });

        var errorMessage = "";

        if (unansweredQuestions.length > 0) {
            // Display an error message for unanswered questions
            errorMessage += "আপনি নিম্নলিখিত প্রশ্নের উত্তর দেননি: " + unansweredQuestions.join(", ") + "\n";
        }

        if (incorrectAnswers.length > 0) {
            // Display an error message for incorrect answers
            errorMessage += "নিম্নলিখিত প্রশ্নগুলিতে আপনার ভুল উত্তর আছে:\n";
            incorrectAnswers.forEach(function (error) {
                errorMessage += error + "\n";
            });
        }

        if (errorMessage) {
            messageError(errorMessage);
            return
        } else {
            messageSuccess("সব উত্তর সঠিক!");

        }

        console.log($scope.questions[0].correctAnswer)
        let url = "/quiz-save";
        let params = {
            'name': $scope.name,
            'phone': $scope.phone,
            'email': $scope.email,
            'gender': $scope.gender,
            'ans_1': $scope.questions[0].correctAnswer,
            'ans_2': $scope.questions[1].correctAnswer,
            'ans_3': $scope.questions[2].correctAnswer,
            'ans_4': $scope.questions[3].correctAnswer,
            'ans_5': $scope.questions[4].correctAnswer,

        };
        $http.post(url, params).then(function success(response) {

            if (response.data.code == 200) {

                // Reset all scope values to null
                $scope.name = null;
                $scope.phone = null;
                $scope.email = null;
                $scope.gender = null;


                $scope.questions.forEach(function (question) {
                    question.selectedAnswer = null;
                });
                document.getElementById("quiz").style.display = "none";


                messageSuccess(response.data.message)
                window.location.href = "/certificate";

            }
            if (response.data.code == 400) {

                messageError(response.data.message)
            }
            console.log(response.data);

        });

    };







    $scope.sendNext = function () {


        if (!$scope.name) {
            messageError('আপনার নাম লিখুন ')
            return;
        }
        if ($scope.phone == null || $scope.phone.toString().length < 10) {
            messageError('আপনার ফোন নাম্বার লিখুন ')
            return;
        }
        if (!$scope.email) {
            messageError('আপনার ই-মেইল  লিখুন ')
            return;
        }
        if (!$scope.gender) {
            messageError('আপনার ঠিকানা লিখুন')
            return;
        }
        document.getElementById("quiz").style.display = "block";
        document.getElementById("intro").style.display = "none";
        messageSuccess('নিম্নলিখিত প্রশ্নগুলির উত্তর সিলেক্ট করুন ')

    }

    $scope.questions = [
        {
            question: "জেনারেল টাও চিকেন রেসিপিতে সস বানাতে কোন সস ব্যবহার করা হয়েছে?",
            answers: [
                "টমেটো কেচাপ ও সয়া সস",
                "চিলি সস",
                "ভিনেগার",
                "ফিশ সস"
            ],
            selectedAnswer: "",
            correctAnswer: "টমেটো কেচাপ ও সয়া সস"
        },
        {
            question: "জেনারেল টাও চিকেন রেসিপিতে মাংসগুলো কী\n" +
                "ভাবে ফ্রাই করা হয়েছে?\n",
            answers: [
                "গ্রিল ফ্রাই\n",
                "সফট ফ্রাই\n",
                "ডিপ ফ্রাই\n",
                "হার্ড ফ্রাই\n",
            ],
            selectedAnswer: "",
            correctAnswer: "ডিপ ফ্রাই\n"
        },
        {
            question: "অন্যান্য খাবারের সাথে চাইনিজ খাবারের পার্থক্য কী?",
            answers: [
                "বেশি মসলা আর কম সস ব্যবহার হয়",
                "বেশি মসলা আর বেশি সস ব্যবহার হয়\n ",
                "কম মসলা আর বেশি সস ব্যবহার হয়",
                "কম মসলা আর কম সস ব্যবহার হয়\n",
            ],
            selectedAnswer: "",
            correctAnswer: "কম মসলা আর বেশি সস ব্যবহার হয়"
        },
        {
            question: "নিচের কোন উপাদানটি চাইনিজ রান্নার বহুল ব্যবহৃত উপাদান?",
            answers: [
                "সয়া সস\n",
                "চিলি সস\n",
                "টমেটো সস\n",
                "ফিশ সস\n",
            ],
            selectedAnswer: "",
            correctAnswer: "সয়া সস\n"
        },

        {
            question: "জেনারেল টাও চিকেন রান্নায় মুরগির মাংসের কোন ধরনের টুকরো ব্যবহার করা হয়?\n",
            answers: [
                "ব্রেস্টের মাংস\n",
                "ব্রেস্টের হাড়বিহীন মাংস",
                "লেগ পিস\n",
                "হাড়বিহীন লেগ পিস\n",
            ],
            selectedAnswer: "",
            correctAnswer: "ব্রেস্টের হাড়বিহীন মাংস"
        },

    ];



    function messageError(message) {

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: message,
            showConfirmButton: true,
            timer: 3000,
            customClass: "Custom_Cancel",

        })

    }

    function messageSuccess(message) {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: true,
            timer: 3000,
            customClass: "Custom_Cancel",

        })

    }


});
