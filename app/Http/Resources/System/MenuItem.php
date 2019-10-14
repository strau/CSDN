<?php

namespace App\Http\Resources\System;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItem extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_path' => $this->name_path,
            'icon' => $this->icon,
            'level' => $this->level,
        ];
    }
}
