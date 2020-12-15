<?php
use Migrations\AbstractMigration;

class AddColumnsTobiditems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('biditems');
        $table->addColumn('description', 'text', [
            'default' => null,
            'after' => 'finished',
            'null' => false,
        ]);
        $table->addColumn('image_path', 'string', [
            'default' => null,
            'after' => 'description',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
