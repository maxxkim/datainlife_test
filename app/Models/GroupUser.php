<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class User extends Pivot
{
    protected $table = 'group_student';

}
