<?php

namespace TacticianSfDi\Util\Domain\Bus;

interface Message extends \JsonSerializable
{
    public function messageType(): string;
}
