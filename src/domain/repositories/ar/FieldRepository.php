<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\FieldInterface;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class FieldRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class FieldRepository extends BaseRepository implements FieldInterface {

	protected $schemaClass = true;

}
