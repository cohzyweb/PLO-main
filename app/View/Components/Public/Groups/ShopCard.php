<?php

namespace App\View\Components\Public\Groups;

use Illuminate\View\Component;
use Illuminate\View\View;

class ShopCard extends Component
{
    public string $name;
    public string $slug;
    public string $imageUrl;
    public string $description;
    public string $address1;
    public string $address2;
    public string $tel;
    public ?string $openStart;
    public ?string $openEnd;

    public function __construct(
        string $name,
        string $slug,
        string $imageUrl,
        string $description,
        string $address1 = '',
        string $address2 = '',
        string $tel = '',
        ?string $openStart = null,
        ?string $openEnd = null
    ) {
        $this->name = $name;
        $this->slug = $slug;
        $this->imageUrl = $imageUrl;
        $this->description = $description;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->tel = $tel;
        $this->openStart = $openStart;
        $this->openEnd = $openEnd;
    }

    public function render(): View
    {
        return view('components.public.groups.shop-card');
    }
}

