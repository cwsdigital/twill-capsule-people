<?php

namespace App\Twill\Capsules\People\Http\Controllers;


use App\Twill\Capsules\Base\ModuleController;

class PersonController extends ModuleController
{
    protected $moduleName = 'people';

    protected $permalinkBase = 'people';

    // Blade view to be rendered for previews
    protected $previewView = 'site.people.show';

    // set this to the prefix configured in twill-navigation if module is not running at top level.
    protected $routePrefix = '';

    protected $titleColumnKey = 'name';

    protected $titleFormKey = 'name';

    // Columns to show on the index page
    protected $indexColumns = [
        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],
        'role' => [
            'title' => 'Role',
            'field' => 'role',
        ]
    ];

    // Allow drag-and-drop reordering of pages
    protected $indexOptions = [
        'reorder' => true,
    ];

    protected function previewData($item)
    {
        $data = [];
        $data['page'] = $item;

        return $data;
    }

    protected function formData($request)
    {
        return [
            'metadata_card_type_options' => config('metadata.card_type_options'),
            'metadata_og_type_options' => config('metadata.opengraph_type_options'),
        ];
    }

}
