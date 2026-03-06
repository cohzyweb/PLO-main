<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cast' => $this->cast->name,
            'title' => $this->subject,
            'body' => $this->body,
            'photo' => $this->photo,
            'slug' => $this->slug,
            'date' => \Carbon\Carbon::createFromTimeString($this->created_at)->format('n/j H:i'),
        ];
    }
}
