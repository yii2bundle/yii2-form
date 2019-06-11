<?php

namespace yii2bundle\form\domain\repositories\ar;

use yii2bundle\form\domain\interfaces\repositories\ModelInterface;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class ModelRepository
 * 
 * @package yii2bundle\form\domain\repositories\ar
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 */
class ModelRepository extends BaseRepository implements ModelInterface {

	protected $schemaClass = true;

}
