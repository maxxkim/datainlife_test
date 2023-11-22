<?php

namespace App\Observers;

use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;

class GroupObserver
{
    public function pivotAttached(User $user, Group $group, $pivot)
    {
        $expire_hours = $pivot['expired_at'] ?? $group->expire_hours ?? 0;
        $expired_at = Carbon::now()->addHours($expire_hours);
        $user->groups()->updateExistingPivot($group->id, ['expired_at' => $expired_at]);
    }
}
