<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\EnumInterface;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class EnumRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class EnumRepository extends BaseRepository implements EnumInterface {

	protected $schemaClass = true;

}
