<?php

namespace yii2bundle\form\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class RuleEntity
 * 
 * @package yii2bundle\form\domain\entities
 * 
 * @property $id
 * @property $field_id
 * @property $name
 * @property $params
 * @property $status
 * @property $sort
 */
class RuleEntity extends BaseEntity {

	protected $id;
	protected $field_id;
	protected $name;
	protected $params;
	protected $status;
	protected $sort;

}
