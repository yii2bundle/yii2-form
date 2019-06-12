<?php

namespace yii2bundle\model\domain\repositories\ar;

use yii2bundle\model\domain\interfaces\repositories\BookInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class BookRepository
 * 
 * @package yii2bundle\model\domain\repositories\ar
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 */
class BookRepository extends BaseActiveArRepository implements BookInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'model_book';
    }

}
