<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        $data['point_valid'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [0, 3, 2, 5])
            ->where('confirm', 1)
            ->sum('valid_point');
        $data['point_confirm'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [0, 3, 2, 5])
            ->where('confirm', 0)
            ->sum('point');

        $data['point_come_valid'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [0, 2])
            ->where('confirm', 1)
            ->sum('valid_point');
        $data['point_come_confirm'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [0, 2])
            ->where('confirm', 0)
            ->sum('point');
        $data['point_pay_valid'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [3, 5])
            ->where('confirm', 1)
            ->sum('valid_point');
        $data['point_pay_confirm'] = \App\Models\Point::where('user_id', $this->user_id)
            ->where('history_id', '<=', $this->id)
            ->whereIn('type', [3, 5])
            ->where('confirm', 0)
            ->sum('point');

        $data['history_count'] = \App\Models\History::where('user_id', $this->user_id)
            ->where('id', '<=', $this->id)
            ->where('office_id', '=', $this->office_id)
            ->where('name', '来店')
            ->count();
        dd($this->shop_id,$this->user_id,$this->id);
        $data['history_shop_count'] = \App\Models\History::where('user_id', $this->user_id)
            ->where('id', '<=', $this->id)
            ->where('shop_id', '=', $this->shop_id)
            ->where('name', '来店')
            ->count();

        // $data['memo'] = (str_replace(["\\r\\n"], "\n", $data['memo']));
        // $data['memobr'] = nl2br(str_replace(["\\r\\n"], "\n", $data['memo']));

        $data['user']['comment'] = (str_replace(["\\r\\n"], "\n", $data['user']['comment']));
        // $data['user']['commentbr'] = nl2br(str_replace(["\\r\\n"], "\n", $data['user']['comment']));
        // setlocale(LC_ALL, 'ja_JP.UTF-8');
        // $data['created_at_with_a'] = $this->created_at->formatLocalized('%Y-%m-%d(%a)');
        
        return $data;
    }
}
