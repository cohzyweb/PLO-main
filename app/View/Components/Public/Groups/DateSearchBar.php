<?php

namespace App\View\Components\Public\Groups;

use Illuminate\View\Component;
use Illuminate\View\View;
use Carbon\Carbon;

class DateSearchBar extends Component
{
    public ?string $icon;
    public string $heading;
    public array $dates;
    public ?string $activeDate;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $icon = null,
        ?string $heading = null,
        ?array $dates = null,
        ?string $activeDate = null
    ) {
        $this->icon = $icon ?? asset('assets/img/groups/datesearch-icon.png');
        $this->heading = $heading ?? '出勤日で検索';
        
        // Generate dates if not provided (next 6 days from today)
        if ($dates === null) {
            $dates = [];
            Carbon::setLocale('ja');
            for ($i = 0; $i < 6; $i++) {
                $date = Carbon::now()->addDays($i);
                $dates[] = [
                    'date' => $date->format('Y-m-d'),
                    'display' => $date->format('m/d'),
                    'label' => $date->format('m/d')
                ];
            }
        }
        $this->dates = $dates;
        
        // Set active date to first date if not provided
        $this->activeDate = $activeDate ?? ($dates[0]['date'] ?? null);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.public.groups.date-search-bar');
    }
}
