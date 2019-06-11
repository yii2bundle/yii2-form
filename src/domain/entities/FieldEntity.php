<?php

namespace yii2bundle\form\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class FieldEntity
 * 
 * @package yii2bundle\form\domain\entities
 * 
 * @property $id
 * @property $model_id
 * @property $name
 * @property $title
 * @property $hint
 */
class FieldEntity extends BaseEntity {

	protected $id;
	protected $model_id;
	protected $name;
	protected $title;
	protected $hint;

}
