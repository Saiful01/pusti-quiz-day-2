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
   {{-- <meta property="og:description"
          content="†gwij cª_g Av‡jv cyi¯‹vi 2023">--}}

    <script>
        var app = angular.module('myApp', []);
        console.log("app created")
    </script>

    <script src="/custom_angular.js"></script>
</head>

<body>


<!-- Score Board S -->
<section class="score-board-area with-common-bg" style="background-image: url('/new/assets/img/nm-bg.jpg');">
    <div class="container">
        <div class="section-logo-wrap text-center text-md-start mb-5">
            <img src="/new/assets/img/meril-prothomalo-left-logo.png" alt="meril-prothomalo"
                 class="section-logo img-fluid">
        </div>

        <div class="max-w-840 mx-auto">
            <div class="cs-score-box-wrap">
                <div class="cs-score-heading text-center">
                    আপনার স্কোর {{$applicant->total_marks}}
                </div>

                <div class="cs-score-wrap">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="#leaderboard" type="button" class="btn btn-ls-primary w-100">লিডারবোর্ড</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="/" type="button" class="btn btn-ls-primary w-100">আবার খেলুন</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="button" class="btn btn-ls-primary w-100" onclick="shareOnFacebook()">শেয়ার করুন</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Score Board E -->

<!-- Leader Board S -->
<section class="leader-board-area with-common-bg" style="background-image: url('/new/assets/img/nm-bg.jpg');">
    <div class="container">
        <div class="section-logo-wrap text-center text-md-start mb-5">
            <img src="/new/assets/img/meril-prothomalo-left-logo.png" alt="meril-prothomalo"
                 class="section-logo img-fluid">
        </div>

        <div class="max-w-840 mx-auto" id="leaderboard">
            <div class="cs-lb-box-wrap">
                <div class="text-center mb-3">
                    <div class="cs-lb-heading text-center">
                        লিডারবোর্ড
                    </div>
                </div>

                <div class="cs-lb-wrap">
                    <div class="cs-lb-row">

                        @php($i=1)

                        @foreach($leaders as $item)
                            <div class="cs-lb-col mb-3">
                                <div class="cs-lb-text-wrap mb-3">
                                    <span class="cs-lb-text">{{$item->name}}</span>
                                    @if($i==1)
                                        <span class="cs-lb-position">১ম</span>
                                    @elseif($i==2)
                                        <span class="cs-lb-position">২য়</span>
                                    @elseif($i==3)
                                        <span class="cs-lb-position">৩য়</span>
                                    @elseif($i==4)
                                        <span class="cs-lb-position">৪র্থ</span>
                                    @elseif($i==5)
                                        <span class="cs-lb-position">৫ম</span>
                                    @elseif($i==6)
                                        <span class="cs-lb-position">৬ষ্ঠ</span>
                                    @elseif($i==7)
                                        <span class="cs-lb-position">৭ম</span>
                                    @elseif($i==8)
                                        <span class="cs-lb-position">৮ম</span>
                                    @elseif($i==9)
                                        <span class="cs-lb-position">৯ম</span>
                                    @elseif($i==10)
                                        <span class="cs-lb-position">১০ম</span>
                                    @else

                                    @endif

                                </div>
                            </div>

                            @php($i++)

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Leader Board E -->


<script>
    function shareOnFacebook() {
        const url = "https://merilprothomalo.webaidsolution.com"; // এখানে আপনার শেয়ার করতে চান এমন URL দিন
        const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
        window.open(facebookShareUrl, 'facebook-share-dialog', 'width=800,height=600');
        return false;
    }

</script>


<script src="/new/assets/js/bundle.js"></script>
</body>

</html>
