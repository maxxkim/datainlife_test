<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Group;
use Illuminate\Console\Command;

class AddUserToGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:member';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Добавляет пользователя в группу и активирует его';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_id = $this->ask('Введите ID пользователя:');
        $group_id = $this->ask('Введите ID группы:');

        $user = User::findOrFail($user_id);
        $group = Group::findOrFail($group_id);

        if (!$user->active) {
            $user->active = true;
            $user->save();
        }

        $user->groups()->attach($group->id);

        $this->info("User {$user->name} added to group {$group->name}");
    }
}
