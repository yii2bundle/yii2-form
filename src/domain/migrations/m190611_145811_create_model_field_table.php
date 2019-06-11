<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

class m190611_145811_create_model_field_table extends Migration {

	public $table = 'model_field';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'entity_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
			'type' => $this->string()->notNull(),
			'title' => $this->string(),
			'description' => $this->string(),
			'sort' => $this->integer()->notNull()->defaultValue(10),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['entity_id', 'name']);
		$this->myAddForeignKey(
			'entity_id',
			'model_entity',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}