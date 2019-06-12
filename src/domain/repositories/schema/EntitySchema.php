<?php

namespace yii2bundle\model\domain\repositories\schema;

use yii2rails\domain\enums\RelationClassTypeEnum;
use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class EntitySchema
 * 
 * @package yii2bundle\model\domain\repositories\schema
 * 
 */
class EntitySchema extends BaseSchema {

    public function relations() {
        return [
            'fields' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'model.field',
                    'field' => 'entity_id',
                    'classType' => RelationClassTypeEnum::SERVICE,
                ],
            ],
            'book' => [
                'type' => RelationEnum::ONE,
                'field' => 'book_id',
                'foreign' => [
                    'id' => 'model.book',
                    'field' => 'id',
                    'classType' => RelationClassTypeEnum::SERVICE,
                ],
            ],
        ];
    }

}
