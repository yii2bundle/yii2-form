<?php

namespace yii2bundle\model\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class FieldEntity
 * 
 * @package yii2bundle\model\domain\entities
 * 
 * @property $id
 * @property $entity_id
 * @property $name
 * @property $type
 * @property $is_required
 * @property $default
 * @property $title
 * @property $description
 * @property $sort
 * @property $status
 *
 * @property RuleEntity $rules
 * @property EnumEntity $enums
 */
class FieldEntity extends BaseEntity {

	protected $id;
	protected $entity_id;
	protected $name;
	protected $type;
	protected $is_required = 0;
	protected $default;
	protected $title;
	protected $description;
    protected $sort;
    protected $status;

    protected $rules;
    protected $enums;

}
