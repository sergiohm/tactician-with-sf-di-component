<?php
declare(strict_types=1);

namespace TacticianSfDi\Application\FlowsOk;

class FlowsOk
{
    public function handle(FlowsOkCommand $command): string
    {
        return $command->message();
    }
}
