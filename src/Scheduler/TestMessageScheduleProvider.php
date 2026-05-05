<?php

namespace App\Scheduler;

use App\Message\TestMessageOne;
use App\Message\TestMessageTwo;
use App\Message\TestMessageThree;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;

#[AsSchedule('test')]
class TestMessageScheduleProvider implements ScheduleProviderInterface
{
    public function __construct()
    {
    }

    public function getSchedule(): Schedule
    {
        return (new Schedule())->add(
            RecurringMessage::every('1 minute', new TestMessageOne()),
            RecurringMessage::every('3 minutes', new TestMessageTwo()),
            RecurringMessage::every('10 minutes', new TestMessageThree())
        );
    }
}
