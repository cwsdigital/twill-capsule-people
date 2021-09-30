<?php

namespace App\Twill\Capsules\People\Http\Requests;

use A17\Twill\Http\Requests\Admin\Request;

class PersonRequest extends Request
{
    public function rulesForCreate()
    {
        return [];
    }

    public function rulesForUpdate()
    {
        return [];
    }
}
