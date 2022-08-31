<?php

namespace App\Actors;

use App\Actors\Actor;
use App\Models\Gamer;
use App\Constants\Keywords;
use App\Constants\Conversations;

class SaluteActor extends Actor
{
    /**
     * should talk
     */
    public static function shouldTalk(Gamer $gamer, string $message): bool
    {
        return $gamer->game == null;
    }

    /**
     * Converse
     * @return string
     */
    public function talk($data = null): string
    {
        $conversation = Conversations::SALUTE;

        foreach ($this->buildConvo() as $key => $value) {
            $conversation = str_replace($key, $value, $conversation);
        }
        return $conversation;
    }

    /**
     * Build Conversation
     */
    protected function buildConvo()
    {
        $extra_greet_key = $this->addExtraGreeting();

        return compact('extra_greet_key');
    }

    /**
     * Add Extra Greeting
     */
    protected function addExtraGreeting()
    {
        $extraGreeting = "";
        if ($this->gamer->level < 1) {
            $extraGreeting .= Conversations::EXTRA_GREETING;
        } elseif ($this->gamer->level > 1 && $this->gamer->points < 7) {
            $extraGreeting .= "Nice to see you again.
            You didn't do well the last time. You are in the bottom " . rand(10, 100) . " players
            with just {$this->gamer->points} points. Try beating your last score";
        } else {
            $extraGreeting .= "Nice to see you again.
            You are smashing it. You're in the top " . rand(10, 100) . " players with {$this->gamer->points} points.
            Try beating your last score";
        }
        return $extraGreeting;
    }
}
