<?php

namespace App\Observers;

use App\Models\Sector;
use Illuminate\Support\Str;
use App\Helpers;

use function App\Helpers\removeAccents;

class SectorObserver
{
    /**
     * Handle the sector "creating" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function creating(Sector $sector)
    {
       $sector->url = Str::kebab($sector->name);
    }

    /**
     * Handle the sector "updating" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function updating(Sector $sector)
    {
        
        $url = removeAccents($sector->name);
        $sector->url = Str::slug($url);
    }

    /**
     * Handle the sector "deleted" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function deleted(Sector $sector)
    {
        //
    }

    /**
     * Handle the sector "restored" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function restored(Sector $sector)
    {
        //
    }

    /**
     * Handle the sector "force deleted" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function forceDeleted(Sector $sector)
    {
        //
    }
}
