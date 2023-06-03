<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $res = [
            'id'=>$this->id,
            'text'=>$this->content,
            'owner'=>$this->getMessageType(),
            'time'=>$this->getPersianDate(),
        ];


        if($this->attachment()->exists()) {
            $att = $this->attachment->toArray();
            $att['type'] = [
                'key' => trans('types/attachment_type.' . $att['type']),
                'value' => $att['type']
            ];
            $res = array_merge($res, ['attachment' => $att]);
        }

        return $res;
    }
}
