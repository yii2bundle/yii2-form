<?php

namespace yii2bundle\model\domain;

use yii2rails\app\domain\helpers\EnvService;
use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @property-read \yii2bundle\model\domain\interfaces\services\FormInterface $model
 * @property-read \yii2bundle\model\domain\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\model\domain\interfaces\services\FieldInterface $field
 * @property-read \yii2bundle\model\domain\interfaces\services\RuleInterface $rule
 * @property-read \yii2bundle\model\domain\interfaces\services\EnumInterface $enum
 */
class Domain extends \yii2rails\domain\Domain {

	public function config() {
		return [
			'repositories' => [
                'form' => Driver::ACTIVE_RECORD,
                'field' => Driver::ACTIVE_RECORD,
                'rule' => Driver::ACTIVE_RECORD,
                'enum' => Driver::ACTIVE_RECORD,
			],
            'services' => [
                'form',
                'field',
                'rule',
                'enum',
            ],
		];
	}

}
