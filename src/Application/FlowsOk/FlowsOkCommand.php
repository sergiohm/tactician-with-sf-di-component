<?php
declare(strict_types=1);

namespace TacticianSfDi\Application\FlowsOk;

class FlowsOkCommand
{
    private $message;

    public function __construct()
    {
        $this->message = 'Mary Poppins';
    }

    public function message(): string
    {
        return $this->message;
    }
}
