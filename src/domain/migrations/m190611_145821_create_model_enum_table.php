<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190611_145821_create_model_enum_table
 * 
 * @package 
 */
class m190611_145821_create_model_enum_table extends Migration {

	public $table = 'model_enum';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'field_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
			'title' => $this->string()->notNull(),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
	    $this->myCreateIndexUnique(['field_id', 'name']);
		$this->myAddForeignKey(
			'field_id',
			'model_field',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}