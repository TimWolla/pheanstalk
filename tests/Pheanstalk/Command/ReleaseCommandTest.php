<?php

declare(strict_types=1);

namespace Pheanstalk\Tests\Command;

use Pheanstalk\Command\ReleaseCommand;
use Pheanstalk\Contract\JobIdInterface;
use Pheanstalk\JobId;
use Pheanstalk\RawResponse;
use Pheanstalk\ResponseType;
use Pheanstalk\Success;
use PHPUnit\Framework\Assert;

/**
 * @covers \Pheanstalk\Command\ReleaseCommand
 */
final class ReleaseCommandTest extends JobCommandTest
{
    public function testInterpretReleased(): void
    {
        $command = $this->getSubject();

        $command->interpret(new RawResponse(ResponseType::Released));
        $this->expectNotToPerformAssertions();
    }

    protected function getSupportedResponses(): array
    {
        return [ResponseType::NotFound, ResponseType::Released];
    }

    protected function getSubject(JobIdInterface $jobId = null): ReleaseCommand
    {
        return new ReleaseCommand($jobId ?? new JobId(5), 123, 321);
    }
}