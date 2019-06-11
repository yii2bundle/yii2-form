<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\EntityInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class EntityRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class EntityRepository extends BaseActiveArRepository implements EntityInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'model_entity';
    }
}
