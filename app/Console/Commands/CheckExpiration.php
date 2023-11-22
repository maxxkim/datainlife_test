<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\MembershipExpired;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CheckExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check_expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверка просроченных подписок пользователей на группы';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereHas('groups', function ($query) {
            $query->where('expired_at', '<', Carbon::now());
        })->get();

        foreach ($users as $user) {
            $groups = $user->groups()->where('expired_at', '<', Carbon::now())->get();

            foreach ($groups as $group) {
                $user->groups()->detach($group->id);

                $this->info("User {$user->name} removed from group {$group->name}");

                Mail::to($user)->send(new MembershipExpired($user, $group));

                if ($user->groups()->count() == 0) {
                    $user->active = false;
                    $user->save();
                }
            }
        }
    }
}
