<?php

namespace yii2bundle\model\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class EntityEntity
 * 
 * @package yii2bundle\model\domain\entities
 * 
 * @property $id
 * @property $name
 * @property $handler
 * @property $status
 *
 * @property $fields
 */
class EntityEntity extends BaseEntity {

	protected $id;
	protected $name;
	protected $handler;
    protected $status;

    protected $fields;

}
