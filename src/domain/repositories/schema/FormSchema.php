<?php

namespace yii2bundle\model\domain\repositories\schema;

use yii2rails\domain\enums\RelationClassTypeEnum;
use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class FormSchema
 * 
 * @package yii2bundle\model\domain\repositories\schema
 * 
 */
class FormSchema extends BaseSchema {

    public function relations() {
        return [
            'fields' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'model.field',
                    'field' => 'form_id',
                    'classType' => RelationClassTypeEnum::SERVICE,
                ],
            ],
        ];
    }

}
