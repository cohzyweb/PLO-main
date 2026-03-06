<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PublicGroupsSubPageLayout extends Component
{
    public ?string $titleEn;
    public ?string $titleJa;
    public ?string $bannerImage;
    public ?string $vectorImage;
    public bool $showButtonGroup;
    public ?array $buttonGroup;
    public bool $showLoadMore;
    public ?string $searchHeading;
    public bool $showDateSearchBar;
    public ?array $dateSearchDates;
    public ?string $dateSearchActiveDate;
    public ?string $dateSearchIcon;
    public ?string $dateSearchHeading;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $titleEn = null,
        ?string $titleJa = null,
        ?string $bannerImage = null,
        ?string $vectorImage = null,
        bool $showButtonGroup = true,
        ?array $buttonGroup = null,
        bool $showLoadMore = true,
        ?string $searchHeading = null,
        bool $showDateSearchBar = false,
        ?array $dateSearchDates = null,
        ?string $dateSearchActiveDate = null,
        ?string $dateSearchIcon = null,
        ?string $dateSearchHeading = null
    ) {
        $this->titleEn = $titleEn ?? 'Photo Diary';
        $this->titleJa = $titleJa ?? '写メ日記';
        $this->bannerImage = $bannerImage ?? asset('assets/img/groups/banner.jpg');
        $this->vectorImage = $vectorImage ?? asset('assets/img/groups/Vector.png');
        $this->showButtonGroup = $showButtonGroup;
        $this->buttonGroup = $buttonGroup;
        $this->showLoadMore = $showLoadMore;
        $this->searchHeading = $searchHeading;
        $this->showDateSearchBar = $showDateSearchBar;
        $this->dateSearchDates = $dateSearchDates;
        $this->dateSearchActiveDate = $dateSearchActiveDate;
        $this->dateSearchIcon = $dateSearchIcon;
        $this->dateSearchHeading = $dateSearchHeading;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.public-groups-sub-page');
    }
}
