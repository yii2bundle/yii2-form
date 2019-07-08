<?php

namespace yii2bundle\model\domain\services;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii2bundle\model\domain\entities\EntityEntity;
use yii2bundle\model\domain\helpers\RuleHelper;
use yii2bundle\model\domain\interfaces\services\EntityInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\exceptions\UnprocessableEntityHttpException;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\extension\common\enums\StatusEnum;

/**
 * Class EntityService
 * 
 * @package yii2bundle\model\domain\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\EntityInterface $repository
 */
class EntityService extends BaseActiveService implements EntityInterface {

    public function createModelByName(string $entityName, array $data) : Model {
        $fieldCollection = $this->allFieldsByEntityName($entityName);
        $model = RuleHelper::createModelFromFields($data, $fieldCollection);
        return $model;
    }

    public function createModel(int $entityId, array $data) : Model {
        $fieldCollection = $this->allFieldsByEntityId($entityId);
        $model = RuleHelper::createModelFromFields($data, $fieldCollection);
        return $model;
    }

    public function oneByName(string $entityName) : EntityEntity {
        $entityNameArr = explode(DOT, $entityName);
        if(count($entityNameArr) > 1) {
            $bookEntity = \App::$domain->model->book->oneByName($entityNameArr[0]);
            $q = new Query;
            $q->andWhere([
                'book_id' => $bookEntity->id,
                'name' => $entityNameArr[1],
            ]);
            $entityEntity = \App::$domain->model->entity->one($q);
            return $entityEntity;
            //d($entityEntity);
        } else {
            throw new NotFoundHttpException('Entity not found!');
        }
    }

    public function validateByName(string $entityName, array $data) : Model {
        $entityEntity = $this->oneByName($entityName);
        $model = $this->createModel($entityEntity->id, $data);
        $isValid = $model->validate();
        if(!$isValid) {
            throw new UnprocessableEntityHttpException($model);
        }
        return $model;
    }

    public function validate(int $entityId, array $data) : Model {
        $model = $this->createModel($entityId, $data);
        $isValid = $model->validate();
        if(!$isValid) {
            throw new UnprocessableEntityHttpException($model);
        }
        return $model;
    }

    public function oneDefault(int $entityId) : array {
        $model = $this->createModel($entityId, []);
        return $model->toArray();
    }

    public function oneDefaultById(int $entityId) : array {
        $model = $this->createModel($entityId, []);
        return $model->toArray();
    }

    public function oneDefaultByName(string $entityName) : array {
        $model = $this->createModel($entityId, []);
        return $model->toArray();
    }

    private function allFieldsByEntityId($entityId, Query $query = null)
    {
        $query = Query::forge($query);
        $query->with(['fields.rules', 'fields.enums']);
        //$query->andWhere(['is_visible' => 1]);
        /** @var SentityEntity $entityEntity */
        $entityEntity = \App::$domain->model->entity->oneById($entityId, $query);
        return $entityEntity->fields;
    }

    private function allFieldsByEntityName($entityName, Query $query = null)
    {
        $query = Query::forge($query);
        $query->with(['fields.rules', 'fields.enums']);
        //$query->andWhere(['is_visible' => 1]);
        $query->andWhere(['name' => $entityName]);
        /** @var SentityEntity $entityEntity */
        $entityEntity = \App::$domain->model->entity->one($query);
        return $entityEntity->fields;
    }

}
