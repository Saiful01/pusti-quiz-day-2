<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>মেরিল-প্রথম আলো পুরস্কার</title>
    <link rel="shortcut icon" type="image/x-icon" href="/fav.png">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="/new/assets/css/fonts/stylesheet.css">
    <link rel="stylesheet" href="/new/assets/css/style.css">

    <meta property="og:image" content="/new/assets/img/fisrt-page-intro.png"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="628"/>
    <meta property="og:title" content="মেরিল-প্রথম আলো পুরস্কার 2023">
 {{--   <meta property="og:description"
          content="†gwij cª_g Av‡jv cyi¯‹vi 2023">--}}

    <script>
        var app = angular.module('myApp', []);
        console.log("app created")
    </script>

    <script src="/custom_angular.js"></script>
</head>

<body>
<section class="banner-area with-common-bg" style="background-image: url('/new/assets/img/nm-bg.jpg');">
    <div class="container d-flex h-100 align-items-center">
        <div class="img-wrap max-w-840 mx-auto">
            <img src="/new/assets/img/fisrt-page-intro.png" alt="meril-prothomalo" class="img-fluid">
        </div>
    </div>
</section>


<section class="setp-forms-area with-common-bg" style="background-image: url('/new/assets/img/nm-bg.jpg');">
    <div class="container">
        <div class="section-logo-wrap text-center text-md-start mb-5">
            <img src="/new/assets/img/meril-prothomalo-left-logo.png" alt="meril-prothomalo"
                 class="section-logo img-fluid">
        </div>
        <div class="setp-forms-wrapper">
            <form id="quiz-form" action="/form-submit" method="post">
                @csrf
                <div class="setp-form form-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="নাম" id="name" name="name"
                                       required>
                                <div class="error-message text-danger d-none" id="name-error">Please enter your name.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="মোবাইল নম্বর" id="mobile"
                                       name="mobile"
                                       {{--pattern="[0-9]{11}" --}}title="Please enter a valid 11-digit mobile number"
                                       required>
                                <div class="error-message text-danger d-none" id="mobile-error">Please enter a valid
                                    mobile number.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" onclick="startQuiz()" class="btn btn-primary-submit">শুরু করুন
                            </button>
                        </div>
                    </div>
                </div>
                <!-- form 1 End -->

                <div class="setp-form form-2" style="display: none;">
                    <div id="timer" class="text-center mb-4" style="display: none">Time elapsed: 0 seconds</div>

                    @foreach($selectedQuestions as $index => $item)
                        <div class="cs-radio-box-wrap mb-4 question-item {{ $index > 0 ? 'd-none' : '' }}"
                             id="{{ $index }}">
                            <div class="cs-radio-heading text-center">{{ $item['question'] }}</div>
                            <div class="cs-radio-wrap">
                                <div class="cs-radio-row">
                                    @foreach($item['options'] as $optionKey => $optionValue)
                                        <div class="cs-radio-col">
                                            <label class="cs-radio-label" for="{{ $item['id'] }}_{{ $optionKey }}">
                                                <input type="radio" name="{{ $item['id'] }}"
                                                       id="{{ $item['id'] }}_{{ $optionKey }}"
                                                       value="{{ $optionValue }}">
                                                <span class="cs-radio-text">{{ $optionKey }}) {{ $optionValue }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="error-message text-danger d-none" id="error_{{ $index }}">Please select an
                                answer.
                            </div>
                        </div>
                    @endforeach

                    <input type="hidden" name="time_taken" id="time_taken" value="">

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary-submit" id="next-question">পরবর্তী</button>
                            <button type="submit" class="btn btn-primary-submit d-none" id="submit-questions">সাবমিট
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
</section>


<!-- Rules Start -->
<section class="rules-area with-common-bg" style="background-image: url('/new/assets/img/nm-bg.jpg');">
    <div class="container">
        <div class="section-logo-wrap text-center text-md-start mb-5">
            <img src="/new/assets/img/meril-prothomalo-left-logo.png" alt="meril-prothomalo"
                 class="section-logo img-fluid">
        </div>

        <div class="rules-content-area max-w-840 mx-auto">
            <h4 class="rules-heading font-tatsam-robi">wbqgvewjt</h4>

            <ol class="font-tatsam-robi">
                <li>GKRb e¨w³ GKvwaKevi AskMªnY Ki‡Z cvi‡eb|</li>
                <li>Ask wb‡Z Aek¨B AskMªnYKvixi bvg I †gvevBj b¤^i cª`vb Ki‡Z n‡e|</li>
                <li>†gwij cª_g Av‡jv cyi¯‹vi 2023 Abyôv‡b AskMªn‡Yi Rb¨ Aek¨B me¸‡jv cª‡kœi mwVK DËi w`‡Z n‡e|</li>
                <li>cªwZ‡hvwMZvi wel‡q Av‡qvRK‡`i wm×všÍB P~ovšÍ e‡j MY¨ n‡e|</li>
                <li>¯‹qvi Uq‡jwUªR wjwg‡UW †h‡Kv‡bv mgq GB cªwZ‡hvwMZvi †h‡Kv‡bv wm×všÍ cwieZ©b, cwiea©b I evwZj
                    Kivi AwaKvi msi¶Y K‡i|
                </li>
                <li>‡Kvb cªKvi fyj Z_¨ cª`vb Ki‡j Zv evwZj e‡j MY¨ Kiv n‡e|</li>
                <li>Kg mg‡q mwVK DËi w`‡Z cvi‡j weRqx nIqvi m¤¢vebv †ewk _vK‡e|</li>
                <li>cªwZ‡hvwMZvq AskMªnY Kivi †kl mgq AvMvgx 21 †g, 2024|</li>
            </ol>
        </div>
    </div>
</section>
<!-- Rules End -->

<script>
    let timer;
    let startTime;

    function startQuiz() {
        let name = document.getElementById('name').value.trim();
        let mobile = document.getElementById('mobile').value.trim();
        let valid = true;

        if (!name) {
            document.getElementById('name-error').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('name-error').classList.add('d-none');
        }

        if (!mobile) {
            document.getElementById('mobile-error').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('mobile-error').classList.add('d-none');
        }

        if (valid) {
            document.querySelector('.form-1').style.display = 'none';
            document.querySelector('.form-2').style.display = 'block';
            startTime = new Date();
            console.log("Timer started at: " + startTime);
            timer = setInterval(updateTime, 1000);
        }
    }

    function updateTime() {
        let now = new Date();
        let elapsed = Math.floor((now - startTime) / 1000);
        document.getElementById('timer').innerText = 'Time elapsed: ' + elapsed + ' seconds';
        console.log('Time elapsed: ' + elapsed + ' seconds');
    }

    document.addEventListener('DOMContentLoaded', function () {
        let currentQuestion = 0;
        const totalQuestions = {{ count($selectedQuestions) }};
        const questionIds = @json(array_column($selectedQuestions, 'id'));

        document.getElementById('next-question').addEventListener('click', function () {
            const questionId = questionIds[currentQuestion];
            const selectedOption = document.querySelector('input[name="' + questionId + '"]:checked');

            if (!selectedOption) {
                document.getElementById('error_' + currentQuestion).classList.remove('d-none');
                return;
            } else {
                document.getElementById('error_' + currentQuestion).classList.add('d-none');
            }

            document.getElementById('' + currentQuestion).classList.add('d-none');
            currentQuestion++;

            if (currentQuestion < totalQuestions) {
                document.getElementById('' + currentQuestion).classList.remove('d-none');
            }

            if (currentQuestion === totalQuestions - 1) {
                document.getElementById('next-question').classList.add('d-none');
                document.getElementById('submit-questions').classList.remove('d-none');
            }
        });

        document.getElementById('quiz-form').addEventListener('submit', function (event) {
            const questionId = questionIds[currentQuestion];
            const selectedOption = document.querySelector('input[name="' + questionId + '"]:checked');

            if (!selectedOption) {
                document.getElementById('error_' + currentQuestion).classList.remove('d-none');
                event.preventDefault();
            } else {
                let now = new Date();
                let totalTimeTaken = Math.floor((now - startTime) / 1000);
                console.log("Form submitted at: " + now);
                console.log("Total time taken: " + totalTimeTaken + " seconds");
                document.getElementById('time_taken').value = totalTimeTaken;
                clearInterval(timer); // Stop the timer
            }
        });
    });


</script>


<script src="/new/assets/js/bundle.js"></script>
</body>

</html>
