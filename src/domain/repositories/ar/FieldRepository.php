<?php

namespace yii2bundle\form\domain\repositories\ar;

use yii2bundle\form\domain\interfaces\repositories\FieldInterface;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class FieldRepository
 * 
 * @package yii2bundle\form\domain\repositories\ar
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 */
class FieldRepository extends BaseRepository implements FieldInterface {

	protected $schemaClass = true;

}
