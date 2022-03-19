<?php

namespace App\Http\Controllers;

use App\Category;
use App\Collegue;
use App\Project;
use App\ProjectForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $collegues = Collegue::all();
        $categories = Category::all();
        $lastProjects = Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->OrderBy('grade','desc')->take(5)->get();
        // dd($lastProjects);

        $teachers = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->take(4)->get();

        $upcomingEvents = ProjectForm::where('status', 'approved')
            ->orWhere('status', 'approved2')
            ->latest()
            ->take(3)
            ->get();

        $highRatedProject = Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->select('projects.*')
            ->leftJoin('ratings', 'projects.id', '=', 'ratings.rateable_id')
            ->addSelect(DB::raw('AVG(ratings.rating) as average_rating'))
            ->groupBy('projects.id')
            ->orderBy('average_rating', 'desc')->take(5)->get();

        // dd($highRatedProject);
        return view('welcome', compact('collegues', 'categories', 'lastProjects', 'highRatedProject', 'teachers', 'upcomingEvents'));
    }

    public function search(Request $request)
    {

        switch (request()->filter) {
            case 'latest':
                $projects = Project::whereHas('projectForm', function($q){
                    return $q->where('status','like','completed');
                })
                ->whenSearch(request()->search)
                ->whenCategory(request()->category)
                ->whenCollegues(request()->colleague)
                ->latest()->paginate(6);
                break;
            case 'rated';
            $projects = Project::whereHas('projectForm', function($q){
                return $q->where('status','like','completed');
            })->select('projects.*')
                ->leftJoin('ratings', 'projects.id', '=', 'ratings.rateable_id')
                ->addSelect(DB::raw('AVG(ratings.rating) as average_rating'))
                ->groupBy('projects.id')
                ->orderBy('average_rating', 'desc')
                ->whenSearch(request()->search)
                ->whenCategory(request()->category)
                ->whenCollegues(request()->colleague)
                ->paginate(6);
                break;

            case 'grade':
            $projects = Project::whereHas('projectForm', function($q){
                return $q->where('status','like','completed');
                })
                ->OrderBy('grade','desc')
                ->whenSearch(request()->search)
                ->whenCategory(request()->category)
                ->whenCollegues(request()->colleague)
                ->paginate(6);
            break;

            default:

        $projects = Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->whenSearch(request()->search)
            ->whenCategory(request()->category)
            ->whenCollegues(request()->colleague)
            ->latest()->paginate(6);
            break;

        }
        // dd($projects);

        $collegues = Collegue::all();
        $categories = Category::all();
        return view('home.projects', compact('projects','collegues','categories'));
    }

    public function events()
    {
        $events = ProjectForm::where('status', 'approved')
        ->orWhere('status', 'approved2')
        ->latest()
        ->paginate(6);

        return view('home.events', compact('events'));
    }

    public function about()
    {
        $students=User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->count();
        $professors=User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->count();
        $projects=Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->count();
        return view('home.about', compact('projects', 'professors', 'students'));
    }

    public function contact()
    {
        return view('home.contact');

    }
}
