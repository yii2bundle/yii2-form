<?php

namespace yii2bundle\model\domain;

use yii2rails\app\domain\helpers\EnvService;
use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @property-read \yii2bundle\model\domain\interfaces\services\EntityInterface $entity
 * @property-read \yii2bundle\model\domain\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\model\domain\interfaces\services\FieldInterface $field
 * @property-read \yii2bundle\model\domain\interfaces\services\RuleInterface $rule
 * @property-read \yii2bundle\model\domain\interfaces\services\EnumInterface $enum
 * @property-read \yii2bundle\model\domain\interfaces\services\BookInterface $book
 */
class Domain extends \yii2rails\domain\Domain {

	public function config() {
		return [
			'repositories' => [
                'entity' => Driver::ACTIVE_RECORD,
                'field' => Driver::ACTIVE_RECORD,
                'rule' => Driver::ACTIVE_RECORD,
                'enum' => Driver::ACTIVE_RECORD,
                'book' => Driver::ACTIVE_RECORD,
			],
            'services' => [
                'entity',
                'field',
                'rule',
                'enum',
                'book',
            ],
		];
	}

}
