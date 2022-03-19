<?php

use App\Project;
use App\ProjectForm;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $overview='Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
        auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
        vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .';
        // for ($i=1; $i < 5; $i++) {
        //     $project=Project::create([
        //     'name'=>'project'.$i,
        //     'category_id'=>$i,
        //     'user_id'=>3+$i,
        //     'overview'=>$overview,
        // ]);
        // $project->students()->syncWithoutDetaching($i%2+2);

        //}

        // for ($i=1; $i <=2 ; $i++) {
        //     $p=ProjectForm::create([
        //         'title'=>'Project title '.$i,
        //         'category_id'=>$i,
        //         'professorSupervisor'=>'4',
        //         'student'=>'3',
        //         'status'=>'approved',
        //         'skills'=>'web, database, host, network',
        //         'goal'=>'achive project goal',
        //         'about'=>$overview,
        //     ]);

        //     $project=Project::create([
        //         'project_form_id'=>$i
        //     ]);
        //     $project->students()->syncWithoutDetaching(3);
        //     }
        //     for ($i=1; $i <=2 ; $i++) {
        //     $p=ProjectForm::create([
        //         'title'=>'Project new '.$i,
        //         'category_id'=>$i,
        //         'professorSupervisor'=>'4',
        //         'student'=>'2',
        //         'status'=>'completed',
        //         'skills'=>'web, database, host, network',
        //         'goal'=>'achive project goal',
        //         'about'=>$overview,
        //     ]);

        //     $project=Project::create([
        //         'project_form_id'=>$i+2
        //     ]);
        //     $project->students()->syncWithoutDetaching(2);
        // }

        // for ($i=1; $i <=2 ; $i++) {
        //     $p=ProjectForm::create([
        //         'title'=>'Project header '.$i,
        //         'category_id'=>$i,
        //         'professorSupervisor'=>'4',
        //         'student'=>'3',
        //         'status'=>'completed',
        //         'skills'=>'web, database, host, network',
        //         'goal'=>'achive project goal',
        //         'about'=>$overview,
        //     ]);

        //     $project=Project::create([
        //         'project_form_id'=>$i+4
        //     ]);
        //     $project->students()->syncWithoutDetaching(3);
        //     }

        //     for ($i=1; $i <=2 ; $i++) {
        //     $p=ProjectForm::create([
        //         'title'=>'Project form'.$i,
        //         'category_id'=>$i,
        //         'professorSupervisor'=>'4',
        //         'student'=>'2',
        //         'status'=>'approved',
        //         'skills'=>'web, database, host, network',
        //         'goal'=>'achive project goal',
        //         'about'=>$overview,
        //     ]);

        //     $project=Project::create([
        //         'project_form_id'=>$i+6
        //     ]);
        //     $project->students()->syncWithoutDetaching(2);
        // }

    }
}
