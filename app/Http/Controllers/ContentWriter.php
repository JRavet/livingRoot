<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resource;
use App\Models\Content;
use App\Models\ContentType;

use App\Services\ContentService;
use App\Services\ResourceService;


class ContentWriter extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($resource_id)
    {
        $data = [
            'resource_id' => $resource_id
        ];

        return view('contentWriter/contentWriter', $data);
    }

    public function save($resource_id)
    {
        // split incoming content into the maximum size allowed by the database
        $contents = str_split($_POST['contents'], 65535);

        $count = 0;
        foreach ($contents as $content)
        {
            $count++;
            // obtain the content-type via a scan
            $content_type_id = ContentService::getTypeByText($content);

            // update or create entries by their resource_id and position
            Content::updateOrCreate([
                'resource_id' => $resource_id,
                'position' => $count
            ],
            [
                'content' => $content,
                'content_type_id' => $content_type_id
            ]);
        }

        // remove extra content if the new contents are fewer than the old ones
        Content::where('resource_id', $resource_id)
            ->where('position', '>', $count)->delete();

        echo json_encode([
            'success' => true
        ]);
    }

    public function load($resource_id)
    {
        $resource = Resource::with('contents.type')->find($resource_id);

        $contents = ResourceService::getOrderedContents($resource);

        echo json_encode([
            'success' => true,
            'contents' => $contents
        ]);
    }
}
