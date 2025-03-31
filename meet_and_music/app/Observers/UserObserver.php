<?php

namespace App\Observers;

use App\Models\User;
use App\Models\User_xp;

class UserObserver
{

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

        public function created(User $user)
    {
       User_xp::create([
            'user_id' => $user->id,
            'xp_atual' => 0,
            'nivel_atual' => 1,
        ]);
    }
}
