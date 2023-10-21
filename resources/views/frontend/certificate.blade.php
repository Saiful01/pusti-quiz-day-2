@extends("layouts.frontend")
@section('title', $title)
@section('description', $description)
@section('image', $image)
@section("content")

<div class="container-fluid ">
    <img src="{{$applicant->file}}" width="100%">
</div>


<div class="container-fluid desktop-background-c desktop">
    <div class="row">
        <div class="row mb-5">
            <div class="col-md-6 col-8 mx-auto" style="background: #E0262B; margin-top: 200px; padding: 20px; border-radius: 20px; color: white">
                <div class="row">
                    <div class="col-md-4 col-12 text-center mt-3 mx-auto">
                        <a class="btn btn-default1 text-center" href="{{$applicant->file}}" download="certificate"><i
                                class="fa fa-download" aria-hidden="true"></i> সার্টিফিকেট ডাউনলোড করুন </a>
                    </div>
                    <div class="col-md-4 col-12  mt-3 mx-auto">
                        <div class="text-center ">
                            <h6 class="mb-3">সার্টিফিকেট শেয়ার করুন  </h6>
                            <span class="">{!! $shareComponent !!}</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="container-fluid mobile-background-c mobile">
    <div class="row">
        <div class="row mb-5">
            <div class="col-md-6 col- 10 " style="background: #E0262B; margin-top: 100px; margin-left: 10px; padding: 0px; border-radius: 20px; color: white">
                <div class="row " style="padding-bottom: 25px">
                    <div class="col-md-6 col-6 text-center ">
                        <a class="btn btn-default1 text-center" href="{{$applicant->file}}" download="certificate"><i
                                class="fa fa-download" aria-hidden="true"></i> সার্টিফিকেট ডাউনলোড করুন </a>
                    </div>
                    <div class="col-md-6 col-6  ">
                        <div class="">
                            <h6 class="mt-4" style="font-size: 14px">সার্টিফিকেট শেয়ার করুন  </h6>
                            <span class="" style="margin-top: -10px; position: absolute">{!! $shareComponent !!}</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


@endsection



