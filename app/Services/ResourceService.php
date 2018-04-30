<?php

namespace App\Services;

class ResourceService {

    public static function getOrderedContents($resource)
    {
        $contents = '';

        for ($i = 1; $i < count($resource->contents)+1; $i++)
        {
            $contents .= $resource->contents->where('position', $i)->first()->content;
        }

        return $contents;
    }

}
