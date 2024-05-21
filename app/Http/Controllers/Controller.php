<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Jorenvh\Share\Share;
use Illuminate\Support\Facades\Schema;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $title = "পুষ্টি হোম শেফ";
        $description = "পুষ্টি হোম শেফ";
        $pageUrl = "http://cookandconnect.pustihomechef.com/";
        $image = "/img/landing-page.png";


        $questions = [

            [
                "id" => 1,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২৩-এ কত তম আসর অনুষ্ঠিত হতে যাচ্ছে?",
                "options" => [
                    "a" => "২২",
                    "b" => "২৩",
                    "c" => "২৪",
                    "d" => "২৫"
                ]
            ],

            [
                "id" => 2,
                "question" => "মেরিল প্রথম আলো পুরস্কারের ইতিহাসে সর্বোচ্চ মনোনয়ন পেয়েছেন কোন তারকা?",
                "options" => [
                    "a" => "শাকিব খান",
                    "b" => "মোশাররফ করিম",
                    "c" => "শাবনূর",
                    "d" => "জাহিদ হাসান"
                ]
            ],
            [
                "id" => 3,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২২-এ কে সেরা সংগীত শিল্পী (পুরুষ) পুরস্কার পেয়েছেন?",
                "options" => [
                    "a" => "ইমরান",
                    "b" => "তাহসান খান",
                    "c" => "এরফান মৃধা শিবলু",
                    "d" => "প্রীতম হাসান"
                ]
            ],
            [
                "id" => 4,
                "question" => "কোন চলচ্চিত্র সবচেয়ে বেশি অভিনেত্রী মেরিল প্রথম আলো পুরস্কার জয়লাভ করেছেন?",
                "options" => [
                    "a" => "শাবনূর",
                    "b" => "ববিতা",
                    "c" => "মৌসুমী",
                    "d" => "পপি"
                ]
            ],
            [
                "id" => 5,
                "question" => "১৯৯৮ - ২০০৫ পর্যন্ত কোন অনুষ্ঠানটি শ্রেষ্ঠ টিভি অনুষ্ঠানের পুরস্কার জিতেছে?",
                "options" => [
                    "a" => "আনন্দ ধারা",
                    "b" => "ছায়াছন্দ",
                    "c" => "ইত্যাদি",
                    "d" => "হৃদয়ে মাটি ও মানুষ"
                ]
            ],
            [
                "id" => 6,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২১-এ কে আজীবন সম্মাননা পুরস্কার পেয়েছেন?",
                "options" => [
                    "a" => "রুনা লায়লা ও সাবিনা ইয়াসমিন",
                    "b" => "সুভাষ দত্ত",
                    "c" => "সৈয়দ আব্দুল হাদী",
                    "d" => "ববিতা ও রোজিনা"
                ]
            ],
            [
                "id" => 7,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২২-এ  উপস্থাপক কে ছিলেন?",
                "options" => [
                    "a" => "চঞ্চল চৌধুরী ও মোশাররফ করিম",
                    "b" => "তাহসান খান ও প্রীতম হাসান",
                    "c" => "আরেফিন শুভ ও সিয়াম আহমেদ",
                    "d" => "সিয়াম আহমেদ ও প্রীতম হাসান"
                ]
            ],
            [
                "id" => 8,
                "question" => "কত সালে প্রথম মেরিল প্রথম আলো পুরস্কার অনুষ্ঠানটি শুরু হয়?",
                "options" => [
                    "a" => "১৯৯২",
                    "b" => "১৯৯৫",
                    "c" => "১৯৯৮",
                    "d" => "২০০১"
                ]
            ],
            [
                "id" => 9,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০১৮ -এ সেরা নবাগত অভিনেতা পুরস্কার কে জয়লাভ করেন?",
                "options" => [
                    "a" => "শবনম বুবলী",
                    "b" => "সিয়াম আহমেদ",
                    "c" => "নাজিফা তুষি",
                    "d" => "শবনম ফারিয়া"
                ]
            ],
            [
                "id" => 10,
                "question" => "সেরা চলচ্চিত্র অভিনেতা বিভাগে কে সবচেয়ে বেশি পুরস্কার পেয়েছেন?",
                "options" => [
                    "a" => "শাকিব খান",
                    "b" => "মান্না",
                    "c" => "জাহিদ হাসান",
                    "d" => "কাজী মারুফ"
                ]
            ],
            [
                "id" => 11,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২২-এ সেরা চলচ্চিত্র পরিচালক পুরস্কার কে পেয়েছেন?",
                "options" => [
                    "a" => "রায়হান রাফি",
                    "b" => "মেজবাউর রহমান সুমন",
                    "c" => "মালেক আফসারী",
                    "d" => "হিমেল আশরাফ"
                ]
            ],
            [
                "id" => 12,
                "question" => "সর্বাধিক টিভি অভিনেতা পুরস্কার কে পেয়েছেন?",
                "options" => [
                    "a" => "চঞ্চল চৌধুরী",
                    "b" => "মোশাররফ করিম",
                    "c" => "জাহিদ হাসান",
                    "d" => "মাহফুজ আহমেদ"
                ]
            ],
            [
                "id" => 13,
                "question" => "প্রথম আসরে কে শ্রেষ্ঠ চলচ্চিত্র অভিনেতা পুরস্কার পেয়েছেন?",
                "options" => [
                    "a" => "মান্না",
                    "b" => "আমিন খান",
                    "c" => "সালমান শাহ",
                    "d" => "রিয়াজ"
                ]
            ],
            [
                "id" => 14,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০২২-এ সেরা নাট্য অভিনেতা পুরস্কার কে পেয়েছেন?",
                "options" => [
                    "a" => "তৌসিফ মাহবুব",
                    "b" => "অ্যালেন শুভ্র",
                    "c" => "আফরান নিশো",
                    "d" => "জিয়াউল ফারুক অপূর্ব"
                ]
            ],
            [
                "id" => 15,
                "question" => "মেরিল প্রথম আলো পুরস্কার ২০১৬-এ কোন নাট্য নির্দেশক পুরস্কার পেয়েছেন?",
                "options" => [
                    "a" => "মিজানুর রহমান আরিয়ান",
                    "b" => "সাগর জাহান",
                    "c" => "আশফাক নিপুণ",
                    "d" => "কাজল আরেফিন অমি"
                ]
            ]
        ];
        // প্রথম প্রশ্নটি আলাদা করে রাখুন
        $fixedQuestion = $questions[0];

        // বাকি প্রশ্নগুলো থেকে ৪টি র‌্যান্ডম প্রশ্ন নির্বাচন করুন
        $remainingQuestions = Arr::except($questions, [0]);
        $randomQuestions = Arr::random($remainingQuestions, 4);

        // প্রথম প্রশ্নটি সহ সব প্রশ্নগুলো একত্র করুন
        $selectedQuestions = array_merge([$fixedQuestion], $randomQuestions);


        return view('frontend.new_index', compact('title', 'description', 'pageUrl', 'image', 'selectedQuestions'));

    }

    public function formSubmit(Request $request)
    {
        // সঠিক উত্তরগুলি সংরক্ষণ করা
        $correctAnswers = [
            1 => '২৫',
            2 => 'শাবনূর',
            3 => 'এরফান মৃধা শিবলু',
            4 => 'শাবনূর',
            5 => 'ইত্যাদি',
            6 => 'রুনা লায়লা ও সাবিনা ইয়াসমিন',
            7 => 'সিয়াম আহমেদ ও প্রীতম হাসান',
            8 => '১৯৯৮',
            9 => 'শবনম ফারিয়া',
            10 => 'শাকিব খান',
            11 => 'মেজবাউর রহমান সুমন',
            12 => 'মোশাররফ করিম',
            13 => 'রিয়াজ',
            14 => 'আফরান নিশো',
            15 => 'সাগর জাহান',
        ];

        $totalMarks = 0;
        $responses = $request->all();
        $answers = [];
        $questionIds = [];

        foreach ($correctAnswers as $questionId => $correctAnswer) {
            $answerKey = (string)$questionId;
            if (isset($responses[$answerKey]) && $responses[$answerKey] === $correctAnswer) {
                $totalMarks += 10;
            }
            if (isset($responses[$answerKey])) {
                $answers[] = $responses[$answerKey];
                $questionIds[] = $questionId;
            }
        }

        $timeTaken = $request->input('time_taken');
        if ($timeTaken >= 0 && $timeTaken <= 4) {
            $timeTaken = 1000;
        } /*elseif ($timeTaken >= 4 && $timeTaken <= 9) {
            $timeTaken = 400;
        }*/ else {
            $timeTaken = $request->input('time_taken');
        }


        // Data save to database
        $applicant = new Applicant();
        $applicant->name = $request->input('name');
        $applicant->phone = $request->input('mobile');
        $applicant->total_marks = $totalMarks;
        $applicant->time = $timeTaken;

        // Dynamically setting the answers and question IDs
        for ($i = 0; $i < 5; $i++) {
            if (isset($answers[$i])) {
                $answerField = 'ans_' . ($i + 1);
                $questionField = 'question_id_' . ($i + 1);
                $applicant->$answerField = $answers[$i];
                $applicant->$questionField = $questionIds[$i];
            }
        }

        // return $applicant;

        $applicant->save();

        return redirect()->route('leaderBoard', $applicant->id);


    }


    public function leaderBoard($id)
    {
        if (!$id) {
            return redirect()->route('home');
        }
        $applicant = Applicant::find($id);

        $leaders = Applicant::select('name', 'total_marks', 'time')
            ->orderBy('total_marks', 'DESC')
            ->orderBy('time', 'ASC')
            ->distinct('name')
            ->take(10)
            ->get();
        return view('frontend.leader', compact('applicant', 'leaders'));

    }

    public function urlRedirect($value)
    {

        $image = '/certificates/' . $value . '_certificate.png';

        return \view('welcome', compact('image'));
        // return redirect()->route('home');
    }

    public function certificate()
    {
        $applicantIds = request()->session()->get('applicant_id');
        if (!$applicantIds) {
            return redirect()->route('home');
        }
        $firstApplicantId = $applicantIds[0];

        $applicant = Applicant::find($firstApplicantId);
        $updatedFilename = str_replace("_certificate.png", "", $applicant->file);

        $shareComponent = \Share::page(
            "http://cookandconnect.pustihomechef.com/" . $updatedFilename,
            "পুষ্টি হোম শেফ",
        )->facebook([
            'title' => "পুষ্টি হোম শেফ ",
            'description' => "পুষ্টি হোম শেফ ",
            'image' => $applicant->file
        ]);
        /*  ->twitter()
          ->linkedin()
          ->telegram()
          ->whatsapp()
          ->reddit();*/


        $title = "পুষ্টি হোম শেফ";
        $description = "পুষ্টি হোম শেফ";
        $pageUrl = "http://cookandconnect.pustihomechef.com/" . $applicant->file;
        $image = "http://cookandconnect.pustihomechef.com/" . $applicant->file;

        Session::forget('applicant_id');

        return view('frontend.certificate', compact('applicant', 'shareComponent', 'title', 'description', 'pageUrl', 'image'));

    }

    public function quizSave(Request $request)
    {
        //return $request->all();


        try {

            // Load the certificate template image
            $template = Image::make(public_path('certificate.jpg'));

            // Add the applicant's name to the certificate
            $template->text($request['name'], 430, 395, function ($font) {
                $font->file(public_path('/font/HindSiliguri-Bold.ttf'));
                $font->size(50);
                $font->color('#fffff');
            });


            // Save the certificate image with a dynamic name
            $imageName = time() . '_certificate.png';
            $template->save(public_path('certificates/' . $imageName));
            $request['file'] = 'certificates/' . $imageName;

            $applicant = Applicant::create($request->all());

            Session::push('applicant_id', $applicant->id);

            return [
                'code' => 200,
                'message' => "অভিনন্দন! আপনি সফলভাবে উত্তর দিয়েছেন, অনুগ্রহ করে আপনার সার্টিফিকেট ডাউনলোড করুন এবং সোশ্যাল মিডিয়াতে শেয়ার করুন",
                'data' => $applicant,
            ];
        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }
}


