<?php

namespace yii2bundle\model\domain\enums;

use yii2rails\extension\enum\base\BaseEnum;

class FieldTypeEnum extends BaseEnum {

    const STRING = 'string';
    const SAFE_STRING = 'safe_string';
	const DOUBLE = 'double';
    const INTEGER = 'integer';
    const ENUM = 'enum';

}
