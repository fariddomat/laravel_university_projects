<?php

namespace App\Http\Controllers;

use App\Collegue;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RegisterUOKController extends Controller
{
    public function register()
    {

        $message = "";
        $validator =  Validator::make(request()->all(), [
            'username' => 'required|digits:9',
            // 'password' => 'required|min:4',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $username = request()->username;
        $password = request()->password;

        try {
            $student = User::where('uok_id', $username)->get();
            if ($student->count() > 0) {

                $message = "Already registerd. if forget your password contact with the adminstrator";
                return view('auth.register', compact('message'));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            //code...
            $json = json_decode(file_get_contents("http://moodle.uok.edu.sy/login/token.php?username=$username&password=$password&service=moodle_mobile_app"), false);

            if ($json->token)
                $collegues = Collegue::get();

            return view('auth.student', compact('username', 'collegues'));
        } catch (\Throwable $th) {
            $message = "Your info not belong to a student in our system";
            return view('auth.register', compact('message'));
        }
    }

    public function registersave(Request $request)
    {
        $validator = "";

            //Validate input
            $validator=Validator::make(request()->all(), [
                'email' => 'required|email',
                'Firstname' => 'required',
                'Lastname' => 'required',
                'password' => ['required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                ],
                'RegYeer' => 'required',
                'Gender' => 'required',
                'Address' => 'required',
                'mobileNo' => 'required|regex:/(09)[0-9]{8}/',
                'collegue_id' => 'required',
                'img_path' => 'required',
            ]);
            // dd($validator);
            if ($validator->fails()) {

        $username = request()->username;
        $collegues = Collegue::get();

            return view('auth.student', compact('username', 'collegues'))->withErrors($validator,$request);
            }

            try {

                if ($request->img_path) {
                    $image = Image::make($request->img_path)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string)$image, 'public');
                    $request_data['img_path'] = $request->img_path->hashName();
                }//end of if


            } catch (Exception $e) {
                dd($e);

            }

            //Create Student
            $student = User::create([
                'email' => request('email'),
                'Firstname' => request('Firstname'),
                'Lastname' => request('Lastname'),
                'password' => bcrypt(request('password')),
                'RegYeer' => request('RegYeer'),
                'Gender' => request('Gender'),
                'Address' => request('Address'),
                'mobileNo' => request('mobileNo'),
                'About' => request('About'),
                'collegue_id' => request('collegue_id'),
                'img_path' => $request_data['img_path'],
                'uok_id' => request('uok_id'),



            ]);

            //assign student Role

            $role = Role::findByName('Student');
            $student->assignRole($role);

            return redirect()->route('login');


    }
}
