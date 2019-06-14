<?php

namespace yii2bundle\model\domain\interfaces\services;

use yii\base\Model;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface EntityInterface
 * 
 * @package yii2bundle\model\domain\interfaces\services
 * 
 * @property-read \yii2bundle\model\domain\Domain $domain
 * @property-read \yii2bundle\model\domain\interfaces\repositories\EntityInterface $repository
 */
interface EntityInterface extends CrudInterface {

    public function createModelByName(string $entityName, array $data) : Model;
    public function validateByName(string $entityName, array $data) : Model;
    public function validate(int $entityId, array $data) : Model;
    public function oneDefault(int $entityId) : array;
    public function oneDefaultById(int $entityId) : array;

}
