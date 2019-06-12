<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

class m190611_145810_create_model_entity_table extends Migration {

	public $table = 'model_entity';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
            'book_id' => $this->integer()->notNull(),
			'name' => $this->string()->notNull(),
            'title' => $this->string(),
			'handler' => $this->json(),
			'status' => $this->integer()->notNull()->defaultValue(1),
		];
	}

	public function afterCreate()
	{
        $this->myCreateIndexUnique(['book_id', 'name']);
        $this->myAddForeignKey(
            'book_id',
            'model_book',
            'id',
            'CASCADE',
            'CASCADE'
        );
	}

}