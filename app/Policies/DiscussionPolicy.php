<?php

namespace App\Policies;

use App\Discussion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any discussions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function view(Discussion $discussion)
    {
        $conversations = User::with('discussions.users')->where('id', Auth::user()->id )->first()->discussions;
        foreach($conversations as $conversation){
            return true;   
        }
    }

    /**
     * Determine whether the user can create discussions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function update(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can delete the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function delete(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can restore the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function restore(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function forceDelete(User $user, Discussion $discussion)
    {
        //
    }
}
