<?php

namespace App\View\Components\Public\Groups;

use Illuminate\View\Component;
use Illuminate\View\View;

class EventCard extends Component
{
    public string $shopName;
    public string $imageUrl;
    public string $imageAlt;
    public string $date;
    public string $title;
    public ?string $url;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $shopName = '雫',
        string $imageUrl,
        string $imageAlt = 'event-image',
        string $date,
        string $title,
        ?string $url = null
    ) {
        $this->shopName = $shopName;
        $this->imageUrl = $imageUrl;
        $this->imageAlt = $imageAlt;
        $this->date = $date;
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.public.groups.event-card');
    }
}
