@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.applicant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.id') }}
                        </th>
                        <td>
                            {{ $applicant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.name') }}
                        </th>
                        <td>
                            {{ $applicant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.phone') }}
                        </th>
                        <td>
                            {{ $applicant->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.email') }}
                        </th>
                        <td>
                            {{ $applicant->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $applicant->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.ans_1') }}
                        </th>
                        <td>
                            {{ $applicant->ans_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.ans_2') }}
                        </th>
                        <td>
                            {{ $applicant->ans_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.ans_3') }}
                        </th>
                        <td>
                            {{ $applicant->ans_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.ans_4') }}
                        </th>
                        <td>
                            {{ $applicant->ans_4 }}
                        </td>
                    </tr>
                {{--    <tr>
                        <th>
                            {{ trans('cruds.applicant.fields.certificate') }}
                        </th>
                        <td>
                            @if($applicant->certificate)
                                <a href="{{ $applicant->certificate->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>--}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
