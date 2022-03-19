<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        $student=Auth::user();
        return view('student.profile.index', compact('student'));
    }

    public function update(Request $request)
    {
        $student=User::find(Auth::user()->id);


        try {
            $request_data['img_path'] = $student->img_path;
            if ($request->img_path) {
                Storage::disk('public')->delete('images/' . $student->img_path);
                $image = Image::make($request->img_path)
                    ->encode('jpg', 50);
                Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string)$image, 'public');
                $request_data['img_path'] = $request->img_path->hashName();
            }//end of if


        } catch (Exception $e) {
            dd($e);

        }

        $student->update([
            'email' => request('email'),
            'Firstname' => request('Firstname'),
            'Lastname' => request('Lastname'),
            'password' => bcrypt(request('password')),
            'RegYeer' => request('RegYeer'),
            'Gender' => request('Gender'),
            'Address' => request('Address'),
            'mobileNo' => request('mobileNo'),
            'About' => request('About'),
            'github' => request('github'),
            'linkedin' => request('linkedin'),
            'img_path' => $request_data['img_path'],
        ]);

        return redirect()->back();

    }
}
