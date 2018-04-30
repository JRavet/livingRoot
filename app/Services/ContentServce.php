<?php
namespace App\Services;

use App\Models\ContentType;

class ContentService {

    public static function getTypeByText($text)
    {
        return ContentType::TEXT;
    }
}
