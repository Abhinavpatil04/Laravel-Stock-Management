<?php

namespace App\Observers;

use App\Models\Asset;
use App\Models\Stock;
use App\Models\Team;

/**
 * Class AssetObserver
 * @package App\Observers
 */
class AssetObserver
{
    /**
     * Handle the asset "created" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function created(Asset $asset)
    {
        $teams  = Team::all();


    }

    /**
     * Handle the asset "updated" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function updated(Asset $asset)
    {
        //
    }

    /**
     * Handle the asset "deleted" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function deleted(Asset $asset)
    {
        //
    }

    /**
     * Handle the asset "restored" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function restored(Asset $asset)
    {
        //
    }

    /**
     * Handle the asset "force deleted" event.
     *
     * @param Asset $asset
     * @return void
     */
    public function forceDeleted(Asset $asset)
    {
        //
    }
}
