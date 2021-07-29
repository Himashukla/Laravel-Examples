<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Tasks;
use App\Events\TaskCreated;
use Tests\CreatesApplication;
use App\Listeners\TaskAssigned;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Query\Builder as QueryBuilder;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use CreatesApplication;
    public $taskCreatedEvent;
    public $taskListener;
    public $user;
    public $mail;
    public $queryBuilder;
    public function setUp(): void
    {
        $this->createApplication();

        $this->taskCreatedEvent = $this->getMockBuilder(TaskCreated::class)
            ->disableOriginalConstructor()
            ->getMock();

        //$this->taskCreatedEvent = Tasks::find(1);
        $this->taskListener = $this->getMockBuilder(TaskAssigned::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->user = $this->getMockBuilder(User::class)
            ->addMethods(['find'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->mail = $this->getMockBuilder(Mail::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->queryBuilder = $this->getMockBuilder(QueryBuilder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['select', 'get', 'first','where','find'])
            ->getMock();
    }
    
    public function test_example()
    {
        $this->expectsEvents(TaskCreated::class);

        $this->queryBuilder->expects($this->once())
            ->method('find')
            ->willReturn($this->user);

        $this->taskListener->handle($this->taskCreatedEvent);
    }
}
