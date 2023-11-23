<?php

namespace App\Observers;

use App\Models\Group;
use App\Models\GroupUser;
use Carbon\Carbon;

class GroupUserObserver
{
    public function created(GroupUser $group_user)
    {
        $group = Group::findOrFail($group_user->group_id);
        $expire_hours = $group->expire_hours ?? 0;
        $expired_at = Carbon::now()->addHours($expire_hours);
        $group_user->expired_at = $expired_at;
        $group_user->save();
    }
}
