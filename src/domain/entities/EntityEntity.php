<?php

namespace yii2bundle\model\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class EntityEntity
 * 
 * @package yii2bundle\model\domain\entities
 * 
 * @property $id
 * @property $book_id
 * @property $name
 * @property $title
 * @property $handler
 * @property $status
 *
 * @property FieldEntity[] $fields
 * @property BookEntity $book
 */
class EntityEntity extends BaseEntity {

	protected $id;
	protected $book_id;
	protected $name;
	protected $title;
	protected $handler;
    protected $status;

    protected $fields;
    protected $book;

}
