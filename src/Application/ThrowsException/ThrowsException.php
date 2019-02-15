<?php
declare(strict_types=1);

namespace TacticianSfDi\Application\ThrowsException;

class ThrowsException
{
    public function handle(ThrowsExceptionCommand $command)
    {
        throw new \Exception(sprintf('Execution has %s', $command->movieTitle()));
    }
}
