<?php

namespace App\Twill\Capsules\People\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleJsonRepeaters;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Services\Blocks\BlockCollection;
use App\Twill\Capsules\People\Models\Person;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;
use Illuminate\Support\Arr;

class PersonRepository extends ModuleRepository
{
    use HandleBlocks;
    use HandleTranslations;
    use HandleSlugs;
    use HandleMedias;
    use HandleFiles;
    use HandleRevisions;
    use HandleMetadata;
    use HandleJsonRepeaters;

    protected $jsonRepeaters = [
        'contact_methods'
    ];

    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $fields
     * @param string $repeaterName
     * @param array $serializedData
     * @return array
     */
    public function getJsonRepeater($fields, $repeaterName, $serializedData)
    {
        $repeatersFields = [];
        $repeatersBrowsers = [];
        $repeatersList = app(BlockCollection::class)->getRepeaterList()->keyBy('name');

        foreach ($serializedData as $index => $repeaterItem) {
            $id = $repeaterItem['id'] ?? $index;

            $repeaters[] = [
                'id' => $id,
                'type' => $repeatersList[$repeaterName]['component'],
                'title' => $repeatersList[$repeaterName]['title'],
                'titleField' => $repeatersList[$repeaterName]['titleField'],
                'hideTitlePrefix' => $repeatersList[$repeaterName]['hideTitlePrefix'],
            ];

            if (isset($repeaterItem['browsers'])) {
                foreach ($repeaterItem['browsers'] as $key => $values) {
                    $repeatersBrowsers["blocks[$id][$key]"] = $values;
                }
            }

            $itemFields = Arr::except($repeaterItem, ['id', 'repeaters', 'files', 'medias', 'browsers', 'blocks']);

            foreach ($itemFields as $index => $value) {
                $repeatersFields[] = [
                    'name' => "blocks[$id][$index]",
                    'value' => $value,
                ];
            }
        }

        $fields['repeaters'][$repeaterName] = $repeaters;
        $fields['repeaterFields'][$repeaterName] = $repeatersFields;
        $fields['repeaterBrowsers'][$repeaterName] = $repeatersBrowsers;

        return $fields;
    }
}
