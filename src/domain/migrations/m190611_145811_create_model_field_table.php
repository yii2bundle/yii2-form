<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190611_145821_create_model_field_table
 * 
 * @package 
 */
class m190611_145811_create_model_field_table extends Migration {

	public $table = 'model_field';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'form_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
			'title' => $this->string(),
			'description' => $this->string(),
			'sort' => $this->integer()->notNull()->defaultValue(10),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['form_id', 'name']);
		$this->myAddForeignKey(
			'form_id',
			'model_form',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}