<?php
declare(strict_types=1);

namespace TacticianSfDi\Application\FlowsOk;

use TacticianSfDi\Util\Domain\Bus\Command;

class FlowsOkCommand extends Command
{
    private $movieTitle;

    public function __construct()
    {
        $this->movieTitle = 'Mary Poppins';
    }

    public function movieTitle(): string
    {
        return $this->movieTitle;
    }

    public function name(): string
    {
        return 'flows_ok_command';
    }

    public function jsonSerialize()
    {
        return [
            'message_type' => $this->messageType(),
            'name' => $this->name(),
            'payload' => [
                'movie_title' => $this->movieTitle()
            ]
        ];
    }
}
