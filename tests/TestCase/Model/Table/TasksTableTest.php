<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TasksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TasksTable Test Case
 */
class TasksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TasksTable
     */
    protected $Tasks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tasks',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tasks') ? [] : ['className' => TasksTable::class];
        $this->Tasks = $this->getTableLocator()->get('Tasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tasks);

        parent::tearDown();
    }


    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {

        // Build the data to save
        $data = array(
            'tasks' => '',
                
        );
        // Attempt to save
        $taskEntity = $this->Tasks->newEmptyEntity();
        $taskEntity = $this->Tasks->patchEntity($taskEntity , $data);
        $result = $this->Tasks->save($taskEntity);

        // Test save failed
        $this->assertFalse($result);
    }
}
