<?php

namespace yii2bundle\model\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class EnumEntity
 * 
 * @package yii2bundle\model\domain\entities
 * 
 * @property $id
 * @property $field_id
 * @property $name
 * @property $title
 * @property $sort
 * @property $status
 */
class EnumEntity extends BaseEntity {

	protected $id;
	protected $field_id;
	protected $name;
	protected $title;
    protected $sort;
    protected $status;

}
