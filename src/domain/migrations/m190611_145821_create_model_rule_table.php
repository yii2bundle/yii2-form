<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190611_145821_create_model_rule_table
 * 
 * @package 
 */
class m190611_145821_create_model_rule_table extends Migration {

	public $table = 'model_rule';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'field_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
			'params' => $this->json(),
			'sort' => $this->integer()->notNull()->defaultValue(10),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'field_id',
			'model_field',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}