<?php

namespace App\Http\Controllers;

use App\Models\ExperienceContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceContentRequest;
use App\Http\Requests\UpdateExperienceContentRequest;

class ExperienceContentController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExperienceContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExperienceContent  $experienceContent
     * @return \Illuminate\Http\Response
     */
    public function show(ExperienceContent $experienceContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExperienceContent  $experienceContent
     * @return \Illuminate\Http\Response
     */
    public function edit(ExperienceContent $experienceContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExperienceContentRequest  $request
     * @param  \App\Models\ExperienceContent  $experienceContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceContentRequest $request, ExperienceContent $experienceContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExperienceContent  $experienceContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExperienceContent $experienceContent)
    {
        //
    }
}
