<?php

namespace yii2bundle\model\tests\rest\v1;

use api\tests\functional\v1\appeal\AppealSchema;
use yii2lab\rest\domain\entities\RequestEntity;
use yii2lab\test\helpers\CurrentIdTestHelper;
use yii2lab\test\Test\BaseActiveApiTest;
use yii2module\account\domain\v3\helpers\test\AuthTestHelper;
use yii2rails\extension\web\enums\HttpMethodEnum;

class ModelEntityTest extends BaseActiveApiTest
{

    public $package = 'api';
    public $point = 'v1';
    public $resource = 'meta-entity';

    public function testAll()
    {
        AuthTestHelper::authByLogin('vitaliy');
        $this->readCollection($this->resource, [], ModelSchema::$entity, 2);
    }

    public function testOne()
    {
        AuthTestHelper::authByLogin('vitaliy');
        $this->readEntity($this->resource, 1, ModelSchema::$entity);
    }

    public function testRelation()
    {
        AuthTestHelper::authByLogin('vitaliy');
        $this->assertRelationContract($this->resource, 1, [
            'book' => ModelSchema::$book,
            'fields' => [ModelSchema::$field],
        ]);
    }

    public function testValidate()
    {
        AuthTestHelper::authByLogin('admin');
        $data = [
            'iin' => '880601300187',
            'birthday' => '1988-06-01',
            'sex' => 'male',
        ];
        $requestEntity = new RequestEntity;
        $requestEntity->method = HttpMethodEnum::PUT;
        $requestEntity->uri = $this->resource . SL . '1';
        $requestEntity->data = $data;
        $responseEntity = $this->sendRequest($requestEntity);
        $this->tester->assertEquals(200, $responseEntity->status_code);
        $this->tester->assertEquals($data, $responseEntity->data);
    }

    public function testFailValidate()
    {
        AuthTestHelper::authByLogin('admin');
        $data = [
            'iin' => '8806013001878',
            'birthday' => '1988-06-01',
            'sex' => 'mal',
        ];
        $requestEntity = new RequestEntity;
        $requestEntity->method = HttpMethodEnum::PUT;
        $requestEntity->uri = $this->resource . SL . '1';
        $requestEntity->data = $data;
        $responseEntity = $this->sendRequest($requestEntity);
        $this->tester->assertEquals(422, $responseEntity->status_code);
        $this->tester->assertUnprocessableEntityExceptionFields(['iin', 'sex'], $responseEntity->data);
    }

}
