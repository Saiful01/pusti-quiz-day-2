@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                @php

                    $applicants = \App\Models\Applicant::orderBy('total_marks', 'DESC')
            ->orderBy('time', 'ASC')

            ->take(50)->get();
                @endphp

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card">
                            <div class="card-header">
                              Leaderboard
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-bordered table-striped table-hover datatable datatable-Applicant">
                                        <thead>
                                        <tr>
                                            <th width="10">

                                            </th>
                                            <th>
                                                {{ trans('cruds.applicant.fields.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.applicant.fields.name') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.applicant.fields.phone') }}
                                            </th>
                                            <th>
                                                Total Marks
                                            </th>
                                            <th>
                                                Time
                                            </th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applicants as $key => $applicant)
                                            <tr data-entry-id="{{ $applicant->id }}">
                                                <td>

                                                </td>
                                                <td>
                                                    {{ $applicant->id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $applicant->name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $applicant->phone ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $applicant->total_marks ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $applicant->time ?? '' }}
                                                </td>



                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {{--{{$applicants->links('pagination::bootstrap-4')}}--}}
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
