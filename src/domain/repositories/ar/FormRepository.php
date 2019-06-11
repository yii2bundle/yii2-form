<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\FormInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class FormRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class FormRepository extends BaseActiveArRepository implements FormInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'model_form';
    }
}
