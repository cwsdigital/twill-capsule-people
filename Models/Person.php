<?php

namespace App\Twill\Capsules\People\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Twill\Capsules\Base\Crops;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;

class Person extends Model implements Sortable
{
    use HasBlocks;
    use HasTranslation;
    use HasSlug;
    use HasMedias;
    use HasFiles;
    use HasRevisions;
    use HasPosition;
    use HasMetadata;

    protected $fillable = [
        'published',
        'name',
        'position',
        'contact_methods'
    ];

    public $translatedAttributes = [
        'name',
        'role',
        'bio',
        'active',
    ];

    protected $casts = [
        'contact_methods' => 'array',
    ];

    public $slugAttributes = [
        'name',
    ];

    public $metadataFallbacks = [
        'title' => 'name',
    ];

    public $mediasParams = Crops::ALL_CROPS;
}
