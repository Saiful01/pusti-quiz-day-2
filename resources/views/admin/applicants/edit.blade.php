@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.applicant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applicants.update", [$applicant->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.applicant.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $applicant->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.applicant.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $applicant->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.applicant.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $applicant->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gender">{{ trans('cruds.applicant.fields.gender') }}</label>
                <input class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text" name="gender" id="gender" value="{{ old('gender', $applicant->gender) }}" required>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ans_1">{{ trans('cruds.applicant.fields.ans_1') }}</label>
                <input class="form-control {{ $errors->has('ans_1') ? 'is-invalid' : '' }}" type="text" name="ans_1" id="ans_1" value="{{ old('ans_1', $applicant->ans_1) }}">
                @if($errors->has('ans_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ans_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.ans_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ans_2">{{ trans('cruds.applicant.fields.ans_2') }}</label>
                <input class="form-control {{ $errors->has('ans_2') ? 'is-invalid' : '' }}" type="text" name="ans_2" id="ans_2" value="{{ old('ans_2', $applicant->ans_2) }}">
                @if($errors->has('ans_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ans_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.ans_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ans_3">{{ trans('cruds.applicant.fields.ans_3') }}</label>
                <input class="form-control {{ $errors->has('ans_3') ? 'is-invalid' : '' }}" type="text" name="ans_3" id="ans_3" value="{{ old('ans_3', $applicant->ans_3) }}">
                @if($errors->has('ans_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ans_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.ans_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ans_4">{{ trans('cruds.applicant.fields.ans_4') }}</label>
                <input class="form-control {{ $errors->has('ans_4') ? 'is-invalid' : '' }}" type="text" name="ans_4" id="ans_4" value="{{ old('ans_4', $applicant->ans_4) }}">
                @if($errors->has('ans_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ans_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.ans_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificate">{{ trans('cruds.applicant.fields.certificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certificate') ? 'is-invalid' : '' }}" id="certificate-dropzone">
                </div>
                @if($errors->has('certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.applicant.fields.certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.certificateDropzone = {
    url: '{{ route('admin.applicants.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="certificate"]').remove()
      $('form').append('<input type="hidden" name="certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($applicant) && $applicant->certificate)
      var file = {!! json_encode($applicant->certificate) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certificate" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection