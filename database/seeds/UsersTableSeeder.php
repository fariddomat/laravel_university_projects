<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about="Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
        auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
        vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .";

        $role_admin=Role::create(['name' => 'Admin']);
        $user=User::create([
            'Firstname'=>'super admin',
            'email'=>'admin@test.com',
            'password'=>bcrypt('admin'),
        ]);
        $user->assignRole($role_admin);


        $role_student=Role::create(['name' => 'Student']);
        $user=User::create([
            'Firstname'=>'Student',
            'Lastname'=>'St',
            'Gender'=>'male',
            'email'=>'student@uok.com',
            'RegYeer'=>'2010',
            'Address'=>'Damas 123',
            'MobileNo'=>'0123456789',
            'password'=>bcrypt('password'),
            'collegue_id'=>'1',
            'About'=>$about,

        ]);
        $user->assignRole($role_student);




        $role_Professor=Role::create(['name' => 'Professor']);
        $permission_Professor = Permission::create(['name' => 'Professor']);


        $role_HeadOfDepartment=Role::create(['name' => 'HeadOfDepartment']);
        $permission_HeadOfDepartment = Permission::create(['name' => 'HeadOfDepartment']);

        $role_ViceDean=Role::create(['name' => 'ViceDean']);
        $permission_ViceDean = Permission::create(['name' => 'ViceDean']);

        $role_Dean=Role::create(['name' => 'Dean']);
        $permission_Dean = Permission::create(['name' => 'Dean']);

        $role_LabTeacher=Role::create(['name' => 'LabTeacher']);
        $permission_LabTeacher = Permission::create(['name' => 'LabTeacher']);

        // $user->assignRole($role);
        // $user->givePermissionTo($permission);


//////////////////////////////////

        $professors=[
            ['Saed', 'Al Nazer', 'Dean'],
            ['Ihsan', 'Al Najjar', 'ViceDean'],
            ['Mariam', 'Saai', 'HeadOfDepartment'],
            ['Kamal', 'Qamar', 'Professor'],
            ['Suhail', 'ALHamoud', 'Professor'],
            ['Shaza', 'Jaraa', 'Professor'],
            ['Lina', 'Murad', 'Professor'],
            ['Elham', 'Al Qasem', 'Professor'],
            ['Yesser', 'Atassi', 'Professor'],
            ['Mazen', 'Yousef', 'Professor'],
            ['Rabeh', 'Shaheen', 'Professor'],
            ['Fadwa', 'Safiyah', 'Professor'],
            ['Lamis', ' Al Hamoud', 'Professor']
        ];

        foreach ($professors as $key => $value) {
            $user=User::create([
                'Firstname'=>$value[0],
                'Lastname'=>$value[1],
                'email'=>$value[0].'@uok.com',
                'RegYeer'=>'2010',
                'MobileNo'=>'0988776655',
                'password'=>bcrypt('password'),
                'About'=>$about,

            ]);
            $role="role_$value[2]";
            $user->assignRole($role_Professor);
            $user->assignRole($$role);
            $permission="permission_$value[2]";
            $user->givePermissionTo($$permission);

        }

        $Teachers=[
            ['Maher', 'Nouh'],
            ['Reem', 'Sharaf'],
            ['Haitham', 'Saffour'],
            ['Zahra', 'Rahmoon'],
            ['Maria', 'Atia'],
            ['Hanan', 'Al Nesser'],
            ['Kinda', 'Dandan'],
            ['Amal', 'Al Khodari'],
        ];

        foreach ($Teachers as $key => $value) {
            $user=User::create([
                'Firstname'=>$value[0],
                'Lastname'=>$value[1],
                'email'=>$value[0].'@uok.com',
                'RegYeer'=>'2010',
                'MobileNo'=>'0988776655',
                'password'=>bcrypt('password'),
                'About'=>$about,

            ]);

            $user->assignRole($role_Professor);
            $user->assignRole($role_LabTeacher);
            $user->givePermissionTo($permission_LabTeacher);

        }





        $professors2=[
            ['Atallah', 'Seda' , 'HeadOfDepartment'],
            ['Abd AlMoeen', 'Rifai', 'Professor'],
            ['Ghader', 'Madi', 'Professor'],
            ['Joseph', 'Trad', 'Professor'],
            ['Mohamad Saeed', 'Twqatli', 'Professor'],
        ];
        foreach ($professors2 as $key => $value) {
            $user=User::create([
                'Firstname'=>$value[0],
                'Lastname'=>$value[1],
                'email'=>$value[0].'@uok.com',
                'RegYeer'=>'2010',
                'MobileNo'=>'0988776655',
                'password'=>bcrypt('password'),
                'About'=>$about,

            ]);
            $role="role_$value[2]";
            $user->assignRole($role_Professor);
            $user->assignRole($$role);
            $permission="permission_$value[2]";
            $user->givePermissionTo($$permission);

        }

        $IT_student=[
            ["Rama", "Neameh", "201410022"],
            ["Mohamad_Ali" ,"Arafeh", "201520037"],
            ["Bahaa" ,"Kallas", "201520051"],
            ["Ahmad", "Tupaji" ,"201410306"],
            ["Nour" ,"Arab" ,"201610384"],
            ["George" ,"Darouj", "201720197"],
            ["Fatima", "Ktimish", "201510363"],
            ["Maya", "Ghajghouj" ,"201820042"],
            ["Mariamm", "Qairot" ,"201610905"],
            ["Owis" ,"Hamoud", "201811330"],
            ["Duaa", "Al Shehet", "201710168"],
            ["Mohamad", "Dabjan" ,"201210315"]
        ];

        foreach ($IT_student as $key => $value) {
            $user=User::create([
                'Firstname'=>$value[0],
                'Lastname'=>$value[1],
                'email'=>$value[0].'@uok.com',
                'RegYeer'=>'2010',
                'MobileNo'=>'0988776655',
                'password'=>bcrypt('password'),
                'collegue_id'=>'1',
                'About'=>$about,
                'uok_id'=>$value[2]

            ]);
            $user->assignRole($role_student);
        }

        $user=User::create([
            'Firstname'=>'Belal',
            'Lastname'=>'Kawokji',
            'email'=>'Belal@uok.com',
            'RegYeer'=>'2010',
            'MobileNo'=>'0988776655',
            'password'=>bcrypt('password'),
            'collegue_id'=>'2',
            'About'=>$about,
            'uok_id'=>201610678

        ]);
        $user->assignRole($role_student);


        $user=User::create([
            'Firstname'=>'Zain',
            'Lastname'=>'Askar',
            'email'=>'Zain@uok.com',
            'RegYeer'=>'2010',
            'MobileNo'=>'0988776655',
            'password'=>bcrypt('password'),
            'collegue_id'=>'3',
            'About'=>$about,
            'uok_id'=>201711397

        ]);
        $user->assignRole($role_student);


        $user=User::create([
            'Firstname'=>'Abd_Albadih',
            'Lastname'=>'Zanabili',
            'email'=>'Abd_Albadih@uok.com',
            'RegYeer'=>'2010',
            'MobileNo'=>'0988776655',
            'password'=>bcrypt('password'),
            'collegue_id'=>'4',
            'About'=>$about,
            'uok_id'=>201610416

        ]);
        $user->assignRole($role_student);

        $user=User::create([
            'Firstname'=>'Lana',
            'Lastname'=>'Wannes',
            'email'=>'Lana@uok.com',
            'RegYeer'=>'2010',
            'MobileNo'=>'0988776655',
            'password'=>bcrypt('password'),
            'collegue_id'=>'4',
            'About'=>$about,
            'uok_id'=>201510077

        ]);
        $user->assignRole($role_student);
    }
}
