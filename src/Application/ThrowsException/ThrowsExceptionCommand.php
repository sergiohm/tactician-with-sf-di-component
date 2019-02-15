<?php
declare(strict_types=1);

namespace TacticianSfDi\Application\ThrowsException;

use TacticianSfDi\Util\Domain\Bus\Command;

/**
 * Declared dynamically to avoid validations
 */
class ThrowsExceptionCommand extends Command
{
    private $movieTitle;

    public function __construct()
    {
        $this->movieTitle = 'Blown Away';
    }

    public function movieTitle(): string
    {
        return $this->movieTitle;
    }

    public function name(): string
    {
        return 'throws_exception';
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
