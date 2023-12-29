<?php

namespace App\Http\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'formated_name' => $this->formated_name,
                'url' => $this->url
            ];
    }

    public function with($request)
    {
        return [
            'additional_info' => [
                'name' => $this->name,
                'formated_name' => $this->formated_name,
                'url' => $this->url
            ],
        ];
    }

    public function getUrl($request)
    {
        return [
            'url' => $this->url
        ];
    }
}
