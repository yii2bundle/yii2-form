<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190611_145821_create_model_form_table
 * 
 * @package 
 */
class m190611_145810_create_model_form_table extends Migration {

	public $table = 'model_form';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'name' => $this->string()->notNull(),
			'handler' => $this->json(),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['name']);
	}

}