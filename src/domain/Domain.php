<?php

namespace yii2bundle\model\domain;

use yii2rails\app\domain\helpers\EnvService;

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
			'services' => [

			],
		];
	}

}
