<?php

namespace yii2bundle\model\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class FieldEntity
 * 
 * @package yii2bundle\model\domain\entities
 * 
 * @property $id
 * @property $form_id
 * @property $name
 * @property $type
 * @property $title
 * @property $description
 * @property $sort
 * @property $status
 *
 * @property $rules
 * @property $enums
 */
class FieldEntity extends BaseEntity {

	protected $id;
	protected $form_id;
	protected $name;
	protected $type;
	protected $title;
	protected $description;
    protected $sort;
    protected $status;

    protected $rules;
    protected $enums;

}
