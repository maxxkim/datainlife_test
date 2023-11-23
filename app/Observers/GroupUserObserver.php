<?php

namespace App\Observers;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Carbon\Carbon;

class GroupUserObserver
{
    public function created(GroupUser $pivot, User $user, Group $group)
    {
        $expire_hours = $pivot['expired_at'] ?? $group->expire_hours ?? 0;
        $expired_at = Carbon::now()->addHours($expire_hours);
        $user->groups()->updateExistingPivot($group->id, ['expired_at' => $expired_at]);
    }
}
