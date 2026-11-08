<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(3)->create();

        foreach ($users as $user) {
            $projects = Project::factory(2)->create(['user_id' => $user->id]);

            foreach ($projects as $project) {
                $tasks = Task::factory(5)->create([
                    'project_id' => $project->id,
                    'author_id' => $user->id,
                    'assigned_to' => $users->random()->id
                ]);

                foreach ($tasks as $task) {
                    Comment::factory(rand(2, 3))->create([
                        'task_id' => $task->id,
                        'user_id' => $users->random()->id
                    ]);
                }
            }
        }
    }
}