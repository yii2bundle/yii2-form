<?php

namespace yii2bundle\model\domain\services;

use yii2bundle\model\domain\entities\BookEntity;
use yii2bundle\model\domain\interfaces\services\BookInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class BookService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\BookInterface $repository
 */
class BookService extends BaseActiveService implements BookInterface {

    public function oneByName($bookName, Query $query = null) : BookEntity
    {
        $query = Query::forge($query);
        $query->andWhere(['name' => $bookName]);
        /** @var SentityEntity $entityEntity */
        $entityEntity = \App::$domain->model->book->one($query);
        return $entityEntity;
    }

}
