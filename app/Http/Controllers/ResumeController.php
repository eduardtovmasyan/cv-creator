<?php

namespace App\Http\Controllers;

use PDF;
use Storage;
use App\Skill;
use Validator;
use App\Resume;
use App\Language;
use App\WorkPlace;
use App\Jobs\SendCvToEmail;
use Illuminate\Http\Request;
use App\EducationalEstablishment;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Resume as ResumeResource;

class ResumeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthday' => 'required|date|before:18 years ago',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'educations' => 'required|array',
            'educations.*.name' => 'required|string|max:255',
            'educations.*.facultet' => 'required|string|max:255',
            'educations.*.place' => 'required|string|max:255',
            'educations.*.start' => 'required|date',
            'educations.*.end' => 'required|date|after:educations.*.start',
            'experiences' => 'required|array',
            'experiences.*.name' => 'required|string|max:255',
            'experiences.*.position' => 'required|string|max:255',
            'experiences.*.place' => 'required|string|max:255',
            'experiences.*.start' => 'required|date',
            'experiences.*.end' => 'required|date|after:experiences.*.start',
            'languages' => 'required|array',
            'languages.*.name' => 'required|string|max:255',
            'languages.*.description' => 'required|string|max:65000',
            'skills' => 'required|array',
            'skills.*.name' => 'required|string|max:255',
        ])->validate();

        Resume::where('user_id', Auth::id())->delete();
        $resume = Resume::create([
            'user_id' => Auth::id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
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

        foreach ($request->experiences as $workPlace) {
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
     * Display the user generated resume.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $resume = Resume::where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        return ResumeResource::make($resume);
    }

    public function exportPDF()
    {
        $user = Auth::user();
        $cv = $user->resumes()->orderBy('created_at', 'desc')->first();
        SendCvToEmail::dispatch($cv);

        return response(['message' => 'You\'ll recive the CV by the email soon.']);
    }
}
