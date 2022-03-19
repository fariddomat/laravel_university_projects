<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collegue;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectForm;
use Error;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use willvincent\Rateable\Rating;

class ProjectController extends Controller
{
    public function __construct()
    { }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all project
        $projects = Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->paginate(6);

        $collegues = Collegue::all();
        $categories = Category::all();
        return view('home.projects', compact('projects', 'collegues', 'categories'));
    }

    public function rateProject(Request $request)
    {
        try {
            // dd(true);
        request()->validate(['rating' => 'required']);
        $project = Project::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rating;
        // $rating->user_id = auth()->user()->id;
        // $movie->ratings()->save($rating);
        $project->rateOnce($rating->rating);
        // return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if(!$project){
            return view('404');
        }
        $rate = 0;

        if (Auth::user()) {
            try {
                $rating = Rating::where('rateable_id', $project->id)
                    ->where('user_id', Auth::user()->id)->first();
                $rate = $rating->rating;
            } catch (\Throwable $th) { }
        }
        $rating_average = $project->averageRating;

        $relatedProject=Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->whenCategory($project->projectForm->category->type)
            ->where('id','<>', $project->id)
            ->latest()->take(2)->get();

            $upcomingEvents = ProjectForm::where('status', 'approved')
            ->orWhere('status', 'approved2')
            ->latest()
            ->take(3)
            ->get();

        if ($project->projectForm->status=="completed") {

            return view('home.project', compact('project', 'rate', 'rating_average', 'relatedProject', 'upcomingEvents'));
        } else
            return view('404');
    }
}
