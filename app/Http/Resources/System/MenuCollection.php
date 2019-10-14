<?php

namespace App\Http\Resources\System;

use App\Http\Resources\BaseCollection;

class MenuCollection extends BaseCollection
{
    /**
     * 通常，资源集合的 $this->collection 属性会自动填充，结果是将集合的每个项映射到其单个资源类。
     * 假定单一资源类是集合的类名，但结尾没有 Collection 字符串。
     * 例如，UserCollection 将给定的用户实例映射到 User 资源中。
     * 若要自定义此行为，可以重写资源集合的 $collects 属性，属性值为要映射到的资源类名称
     *
     * @var string
     */
    public $collects = MenuItem::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->getCode(),
            'msg'  => $this->getMsg(),
            'data' => $this->collection,
        ];
    }
}
