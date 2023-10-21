<?php

namespace App\Http\Requests;

use App\Models\Applicant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applicant_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'gender' => [
                'string',
                'required',
            ],
            'ans_1' => [
                'string',
                'nullable',
            ],
            'ans_2' => [
                'string',
                'nullable',
            ],
            'ans_3' => [
                'string',
                'nullable',
            ],
            'ans_4' => [
                'string',
                'nullable',
            ],
        ];
    }
}
