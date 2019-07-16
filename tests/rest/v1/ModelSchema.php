<?php

namespace yii2bundle\model\tests\rest\v1;

use yii2lab\test\enums\TypeEnum;

class ModelSchema
{

    public static $entity = [
        'id' => TypeEnum::INTEGER,
        'book_id' => TypeEnum::INTEGER,
        'name' => TypeEnum::STRING,
        'title' => TypeEnum::STRING,
        'status' => TypeEnum::INTEGER,
    ];

    public static $book = [
        'id' => TypeEnum::INTEGER,
        'name' => TypeEnum::STRING,
        'title' => TypeEnum::STRING,
    ];

    public static $field = [
        'id' => TypeEnum::INTEGER,
        'entity_id' => TypeEnum::INTEGER,
        'name' => TypeEnum::STRING,
        'type' => TypeEnum::STRING,
        'is_required' => TypeEnum::INTEGER,
        //'default' => TypeEnum::,
        'title' => TypeEnum::STRING,
        'description' => [TypeEnum::STRING, TypeEnum::NULL],
        'sort' => TypeEnum::INTEGER,
        'status' => TypeEnum::INTEGER,
    ];

}
