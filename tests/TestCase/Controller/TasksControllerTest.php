<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TasksController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TasksController Test Case
 *
 * @uses \App\Controller\TasksController
 */
class TasksControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tasks',
    ];
    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $data = [
            'tasks' => 'Get new job'
        ];
        //add form security token
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/tasks/add', $data);
        //save form data then query database to check is result is saved
        $this->assertResponseSuccess();
        $tasks = $this->getTableLocator()->get('Tasks');
        $query = $tasks->find()->where(['tasks' => $data['tasks']]);
        $this->assertEquals(1, $query->count());  
    }

}
