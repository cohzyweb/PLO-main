<?php

namespace App\View\Components\Public\Groups;

use Illuminate\View\Component;
use Illuminate\View\View;

class ScheduleCard extends Component
{
    public string $name;
    public ?string $age;
    public ?string $height;
    public ?string $bust;
    public ?string $braSize;
    public ?string $waist;
    public ?string $hip;
    public ?string $message;
    public string $shopName;
    public ?string $imageUrl;
    public ?string $frameImageUrl;
    public ?string $profileUrl;
    public ?string $statusText;
    public ?string $timeRange;
    public bool $isWorkingToday;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        ?string $age = null,
        ?string $height = null,
        ?string $bust = null,
        ?string $braSize = null,
        ?string $waist = null,
        ?string $hip = null,
        ?string $message = null,
        string $shopName = '雫',
        ?string $imageUrl = null,
        ?string $frameImageUrl = null,
        ?string $profileUrl = '#',
        ?string $statusText = '本日出勤',
        ?string $timeRange = '12:00〜24:00',
        bool $isWorkingToday = true
    ) {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
        $this->bust = $bust;
        $this->braSize = $braSize;
        $this->waist = $waist;
        $this->hip = $hip;
        $this->message = $message;
        $this->shopName = $shopName;
        $this->imageUrl = $imageUrl;
        $this->frameImageUrl = $frameImageUrl;
        $this->profileUrl = $profileUrl;
        $this->statusText = $statusText;
        $this->timeRange = $timeRange;
        $this->isWorkingToday = $isWorkingToday;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.public.groups.schedule-card');
    }
}
