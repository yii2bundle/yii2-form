<?php

namespace yii2bundle\form\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class ModelEntity
 * 
 * @package yii2bundle\form\domain\entities
 * 
 * @property $id
 * @property $name
 * @property $handler
 */
class ModelEntity extends BaseEntity {

	protected $id;
	protected $name;
	protected $handler;

}
