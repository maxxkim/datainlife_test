<?php

use App\Models\User;
use App\Models\Group;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class MembershipExpired extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $group;

    public function __construct(User $user, Group $group)
    {
        $this->user = $user;
        $this->group = $group;
    }

    public function build()
    {
        return $this->view('emails.membership_expired') //Этой view не существует, написано для примера
                    ->subject('Закончилось членство в группе ' . $this->group->name);
    }
}
