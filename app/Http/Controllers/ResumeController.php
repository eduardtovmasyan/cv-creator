<?php

namespace App\Http\Controllers;

use Validator;
use App\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'age' => 'required|integer|between:18,100',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|numeric|unique:users,phone',
            'educations' => 'required|array',
            'educations.*.name' => 'required|string|max:255',
            'educations.*.facultet' => 'required|string|max:255',
            'educations.*.place' => 'required|string|max:255',
            'educations.*.start' => 'required|date',
            'educations.*.end' => 'required|date|after:start',
            'work_places' => 'required|array',
            'work_places.*.name' => 'required|string|max:255',
            'work_places.*.position' => 'required|string|max:255',
            'work_places.*.place' => 'required|string|max:255',
            'work_places.*.start' => 'required|date',
            'work_places.*.end' => 'required|date|after:start',
            'languages' => 'required|array',
            'languages.*.name' => 'required|string|max:255',
            'languages.*.description' => 'required|string|max:65000',
            'skills' => 'required|array',
            'skills.*.name' => 'required|string|max:255',
        ])->validate();
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
