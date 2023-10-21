<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicantRequest;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ApplicantController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('applicant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicants = Applicant::with(['media'])->get();

        return view('admin.applicants.index', compact('applicants'));
    }

    public function create()
    {
        abort_if(Gate::denies('applicant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicants.create');
    }

    public function store(StoreApplicantRequest $request)
    {
        $applicant = Applicant::create($request->all());

        if ($request->input('certificate', false)) {
            $applicant->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $applicant->id]);
        }

        return redirect()->route('admin.applicants.index');
    }

    public function edit(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicants.edit', compact('applicant'));
    }

    public function update(UpdateApplicantRequest $request, Applicant $applicant)
    {
        $applicant->update($request->all());

        if ($request->input('certificate', false)) {
            if (! $applicant->certificate || $request->input('certificate') !== $applicant->certificate->file_name) {
                if ($applicant->certificate) {
                    $applicant->certificate->delete();
                }
                $applicant->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate'))))->toMediaCollection('certificate');
            }
        } elseif ($applicant->certificate) {
            $applicant->certificate->delete();
        }

        return redirect()->route('admin.applicants.index');
    }

    public function show(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.applicants.show', compact('applicant'));
    }

    public function destroy(Applicant $applicant)
    {
        abort_if(Gate::denies('applicant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicant->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicantRequest $request)
    {
        $applicants = Applicant::find(request('ids'));

        foreach ($applicants as $applicant) {
            $applicant->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('applicant_create') && Gate::denies('applicant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Applicant();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
