<?php

namespace yii2bundle\form\domain;

use yii2rails\app\domain\helpers\EnvService;

/**
 * Class Domain
 * 
 * @property-read \yii2bundle\form\domain\interfaces\services\ModelInterface $model
 * @property-read \yii2bundle\form\domain\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\form\domain\interfaces\services\FieldInterface $field
 * @property-read \yii2bundle\form\domain\interfaces\services\RuleInterface $rule
 */
class Domain extends \yii2rails\domain\Domain {

	public function config() {
		return [
			'services' => [

			],
		];
	}

}
