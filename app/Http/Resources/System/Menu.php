<?php

namespace App\Http\Resources\System;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends BaseResource
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
            'code' => $this->getCode(),
            'msg' => $this->getMsg(),
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'name_path' => $this->name_path,
                'id_path' => $this->id_path,
                'icon' => $this->icon,
                'level' => $this->level,
            ]
        ];
    }
}
