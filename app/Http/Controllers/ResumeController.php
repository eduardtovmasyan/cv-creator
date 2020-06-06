<?php

namespace App\Http\Controllers;

use App\Skill;
use Validator;
use App\Resume;
use App\Language;
use App\WorkPlace;
use Illuminate\Http\Request;
use App\EducationalEstablishment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Resume as ResumeResource;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = Resume::paginate(parent::PER_PAGE);

        return ResumeResource::collection($resumes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthday' => 'required|date|before:18 years ago',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'educations' => 'required|array',
            'educations.*.name' => 'required|string|max:255',
            'educations.*.facultet' => 'required|string|max:255',
            'educations.*.place' => 'required|string|max:255',
            'educations.*.start' => 'required|date',
            'educations.*.end' => 'required|date|after:educations.*.start',
            'work_places' => 'required|array',
            'work_places.*.name' => 'required|string|max:255',
            'work_places.*.position' => 'required|string|max:255',
            'work_places.*.place' => 'required|string|max:255',
            'work_places.*.start' => 'required|date',
            'work_places.*.end' => 'required|date|after:work_places.*.start',
            'languages' => 'required|array',
            'languages.*.name' => 'required|string|max:255',
            'languages.*.description' => 'required|string|max:65000',
            'skills' => 'required|array',
            'skills.*.name' => 'required|string|max:255',
        ])->validate();

        $resume = Resume::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $skillModels = [];
        $eduModels = [];
        $workModels = [];
        $langModels = [];

        foreach ($request->skills as $skill) {
            $skillModels[] = Skill::make($skill);
        }
        $resume->skills()->saveMany($skillModels);

        foreach ($request->educations as $education) {
            $eduModels[] = EducationalEstablishment::make($education);
        }
        $resume->educationEstablishments()->saveMany($eduModels);

        foreach ($request->work_places as $workPlace) {
            $workModels[] = WorkPlace::make($workPlace);
        }
        $resume->workPlaces()->saveMany($workModels);

        foreach ($request->languages as $language) {
            $langModels[] = Language::make($language);
        }
        $resume->languages()->saveMany($langModels);

        return ResumeResource::make($resume);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
