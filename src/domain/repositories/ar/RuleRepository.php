<?php

namespace yii2bundle\form\domain\repositories\ar;

use yii2bundle\form\domain\interfaces\repositories\RuleInterface;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class RuleRepository
 * 
 * @package yii2bundle\form\domain\repositories\ar
 * 
 * @property-read \yii2bundle\form\domain\Domain $domain
 */
class RuleRepository extends BaseRepository implements RuleInterface {

	protected $schemaClass = true;

}
