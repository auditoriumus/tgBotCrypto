<?php

namespace App\Http\Services\MenuButtonServices;

trait ButtonTrait
{
    public function getMenu($destination)
    {
        $data = [];
        if ($destination != null) {
            $array = $this->getAll()->where('destination', $destination)->toArray();
            if (empty($array)) return false;
            $i = 0;
            foreach ($array as $item) {
                if ($i % 2 == 0) $data[0][] = $item['title'];
                else $data[1][] = $item['title'];
                $i++;
            }
        }
        $data[][] = 'В начало';
        return $data;
    }
}
