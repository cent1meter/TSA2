<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTasksAndAuthentication extends Migration
{
    public function up(): void
    {
        if ($this->db->tableExists('users') && ! $this->db->fieldExists('password', 'users')) {
            $this->forge->addColumn('users', [
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                    'after' => 'full_name',
                ],
            ]);
        }

        if (! $this->db->tableExists('tasks')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'title' => ['type' => 'VARCHAR', 'constraint' => 150],
                'description' => ['type' => 'TEXT', 'null' => true],
                'task_date' => ['type' => 'DATE'],
                'is_archived' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey(['is_archived', 'task_date']);
            $this->forge->createTable('tasks', true);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('tasks', true);

        if ($this->db->tableExists('users') && $this->db->fieldExists('password', 'users')) {
            $this->forge->dropColumn('users', 'password');
        }
    }
}
