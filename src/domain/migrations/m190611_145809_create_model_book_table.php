<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class m190612_141923_create_model_book_table
 * 
 * @package 
 */
class m190611_145809_create_model_book_table extends Migration {

	public $table = 'model_book';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'name' => $this->string()->notNull(),
			'title' => $this->string()->notNull(),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['name']);
	}

}