<?php

namespace App\Observers;

use App\Models\Asset;
use App\Models\Stock;
use App\Models\Team;

/**
 * Class TeamObserver
 * @package App\Observers
 */
class TeamObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function created(Team $team)
    {
        $assets = Asset::all();

    }

    /**
     * Handle the team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updated(Team $team)
    {
        //
    }

    /**
     * Handle the team "deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function deleted(Team $team)
    {
        //
    }

    /**
     * Handle the team "restored" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function restored(Team $team)
    {
        //
    }

    /**
     * Handle the team "force deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function forceDeleted(Team $team)
    {
        //
    }
}
