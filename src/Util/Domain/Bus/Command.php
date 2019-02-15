<?php
declare(strict_types=1);

namespace TacticianSfDi\Util\Domain\Bus;

abstract class Command implements Message
{
    public abstract function name(): string;

    public final function messageType(): string
    {
        return 'command';
    }
}
