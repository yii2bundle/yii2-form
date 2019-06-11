<?php

namespace yii2bundle\model\domain\repositories\schema;

use yii2rails\domain\enums\RelationClassTypeEnum;
use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class FieldSchema
 * 
 * @package yii2bundle\model\domain\repositories\schema
 * 
 */
class FieldSchema extends BaseSchema {

    public function relations() {
        return [
            'rules' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'model.rule',
                    'field' => 'field_id',
                    'classType' => RelationClassTypeEnum::SERVICE,
                ],
            ],
            'enums' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'model.enum',
                    'field' => 'field_id',
                    'classType' => RelationClassTypeEnum::SERVICE,
                ],
            ],
        ];
    }

}
