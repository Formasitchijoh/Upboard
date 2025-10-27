<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        // Optimizing the query we need to use the with query to get the
        // relationships to the model else it will cause an N+1 Problem
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');
        // return $jobs;
        return view('jobs.index', [
            'jobs' => $jobs[0],
            'featuredJobs' => $jobs[1],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $jobAAttributes = $request->validate([
        'title' => ['required'],
        'salary' => ['required'],
        'location' => ['required'],
        'schedule' => ['required',Rule::in(['Part Time', 'Full Time'])],
        'url' => ['required', 'active_url'],
        'tags' => ['nullable'],
       ]);
       $jobAAttributes['featured'] = $request->has('featured'); // if the resuest has a value for that checkbox

       // Taking this pathways means that the user is Authenticated
       // and creating the jobs for the employer the employer_id
       // is automatically included into the job created

       $job = Auth::user()->employer->jobs()->create(Arr::except($jobAAttributes, 'tags'));

       if($jobAAttributes['tags'] ?? false)
       {
            // explode splits the tags into an array
            foreach( explode(',', $jobAAttributes['tags']) as $tag)
            {
                $job->tag($tag);
            }
       }

       return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
