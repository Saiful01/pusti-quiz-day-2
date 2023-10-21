@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")

    <div class="container-fluid desktop-background1 desktop">
        <div class="row" >
            <img src="/img/button-bg.jpg" class="btn-img" >
            <div class="col-md-6 mx-auto">
                <div class="row">

                        <div class="col-md-3">
                            <a href="">
                                <img src="/img/icon-1.png" class="icon">
                            </a>

                        </div>


                    <div class="col-md-3 icon-opacity">
                        <img src="/img/icon-2.png"class="icon" >
                    </div>
                    <div class="col-md-3 icon-opacity">
                        <img src="/img/icon-3.png" class="icon">
                    </div>
                    <div class="col-md-3 icon-opacity">
                        <img src="/img/icon-4.png"class="icon" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mobile-background1 mobile">
        <div class="row">
            <img src="/img/button-bg.jpg" class="btn-img">
            <div class="col-md-6 col-10 mx-auto">
                <div class="row">

                    <div class="col-md-3 col-3">
                        <a href="">
                            <img src="/img/icon-1.png" class="icon">
                        </a>

                    </div>


                    <div class="col-md-3 col-3 icon-opacity">
                        <img src="/img/icon-2.png"class="icon" >
                    </div>
                    <div class="col-md-3 col-3 icon-opacity">
                        <img src="/img/icon-3.png" class="icon">
                    </div>
                    <div class="col-md-3 col-3 icon-opacity">
                        <img src="/img/icon-4.png"class="icon" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form>
        <div class="container-fluid"
             style="background: url('../img/form-bg.png') center; background-repeat: no-repeat; height: 406px"
             id="intro">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h3 class="text-danger fw-bold mt-5 text-center">হ্যান্ডস অন কোর্সের জন্য <br> নিচের তথ্যগুলো দিয়ে সহায়তা করুন </h3>

                    <div class="row">
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="name" ng-model="name" placeholder="আপনার নাম"
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-5">
                            <input type="text" class="form-control" name="phone" ng-model="phone"
                                   placeholder="ফোন নাম্বার "
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-3">
                            <input type="email" class="form-control" name="email" ng-model="email" placeholder="ই-মেইল "
                                   required>
                        </div>
                        <div class="col-md-6 col-6 mt-3">
                            <input type="text" class="form-control" name="gender" ng-model="gender" placeholder="ঠিকানা"
                                   required>
                        </div>
                        <div class="col-md-2 col-4 mx-auto mt-5">
                            <a class="btn btn-danger "> <span class="p-3" ng-click="sendNext()">পরবর্তী</span> </a>
                        </div>

                    </div>

                </div>


            </div>
        </div>
        <div class="container-fluid quiz"
             style="background: url('../img/quiz-bg.png') center; background-repeat: no-repeat; " id="quiz">


            <div class="row" id="quiz-design">


                <div class="col-md-4 col-10 mx-auto mt-3" style="text-align: center">
                    <h3 class="fw-bold text-center header-text mb-5">সার্টিফিকেট ডাউনলোড করতে নিচের প্রশ্নগুলোর সঠিক উত্তর দিন </h3>

                    <div class="row">
                        <label class="text-center quiz-header">@{{ questions[currentQuestionIndex].question }}</label><br>

                        <input type="hidden" class="form-control red-text" ng-model="questions[currentQuestionIndex].selectedAnswer" placeholder="Choose an answer">

                            <div class="col-md-6 col-6 mt-2" ng-repeat="answer in questions[currentQuestionIndex].answers">
                                <label
                                    ng-click="selectAnswer(questions[currentQuestionIndex], answer)"
                                    ng-class="{
                'selected-answer': questions[currentQuestionIndex].selectedAnswer === answer && questions[currentQuestionIndex].selectedAnswer !== questions[currentQuestionIndex].correctAnswer,
                'correct-answer': questions[currentQuestionIndex].selectedAnswer === questions[currentQuestionIndex].correctAnswer && questions[currentQuestionIndex].selectedAnswer === answer,
                'incorrect-answer': questions[currentQuestionIndex].selectedAnswer === answer && questions[currentQuestionIndex].selectedAnswer !== questions[currentQuestionIndex].correctAnswer,
            }"
                                    class="red-text"
                                >
                                 <span style="margin: auto">@{{ answer }}</span>
                                    <span ng-if="questions[currentQuestionIndex].selectedAnswer === answer">
                <span ng-if="questions[currentQuestionIndex].correctAnswer === answer" class="correct-icon answer-icon"></span>
                <span ng-if="questions[currentQuestionIndex].selectedAnswer !== questions[currentQuestionIndex].correctAnswer" class="incorrect-icon answer-icon"></span>
            </span>
                                </label>
                            </div>


                    </div>


                    <div ng-show="currentQuestionIndex < questions.length - 1">
                        <a class="btn btn-default mt-5" ng-click="nextQuestion()">পরবর্তী</a>

                    </div>
                    <div ng-show="currentQuestionIndex === questions.length - 1">
                        <a class="btn btn-default mt-5" ng-click="answerSave()">সাবমিট করুন</a>
                    </div>
                </div>


            </div>
        </div>


        </div>
    </form>
    <div class="container-fluid desktop-background2">
        <div class="row">
            <!-- Content for desktop -->
        </div>
    </div>
    <div class="container-fluid mobile-background2">
        <div class="row">
            <!-- Content for mobile -->
        </div>
    </div>

@endsection
