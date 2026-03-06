<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MiyabiPageLayout extends Component
{
    public string $pageTitle;
    public string $pageSubtitle;
    public string $breadcrumb;
    public array $assets;
    public $banners;

    public function __construct(
        string $pageTitle,
        string $pageSubtitle,
        string $breadcrumb,
        array $assets = [],
        $banners = []
    ) {
        $this->pageTitle = $pageTitle;
        $this->pageSubtitle = $pageSubtitle;
        $this->breadcrumb = $breadcrumb;
        $this->assets = $assets;
        $this->banners = $banners ?? [];
    }

    /**
     * Get the data that should be available to the view.
     */
    public function data(): array
    {
        // dd($this->banners);
        return [
            'pageTitle' => $this->pageTitle,
            'pageSubtitle' => $this->pageSubtitle,
            'breadcrumb' => $this->breadcrumb,
            'assets' => $this->assets,
            'banners' => $this->banners,
        ];
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.miyabi-page-layout');
    }
}

