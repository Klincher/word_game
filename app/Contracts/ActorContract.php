<?php

namespace App\Contracts;

use App\Models\Gamer;

interface Actor
{
    /**
     * Talk to gamer by returning a response
     * @param string|null
     * @return string
     */
    public function talk($data = null): string;

    /**
     * Check whether to respond to a gamer's message
     * @param App\Models\Gamer $gamer
     * @param string $message
     *
     * @return bool
     */
    public static function shouldTalk(Gamer $gamer, string $message): bool;
}
