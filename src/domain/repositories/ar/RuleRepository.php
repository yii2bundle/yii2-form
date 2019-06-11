<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\RuleInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class RuleRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class RuleRepository extends BaseActiveArRepository implements RuleInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'model_rule';
    }

}
