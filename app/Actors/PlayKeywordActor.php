<?php

namespace App\Actors;

use App\Actors\Actor;
use App\Traits\ActorTrait;
use App\Constants\Keywords;
use App\Factories\QuestionFactory;

class PlayKeywordActor extends Actor
{
    use ActorTrait;

    /**
     * should talk
     */
    public static function shouldTalk($gamer, $message): bool
    {
        return $gamer->game == null &&
            Keywords::START == $message;
    }

    /**
     * Converse
     * @return string
     */
    public function talk($data = null): string
    {
        $question = QuestionFactory::make()->generate();

        $puzzle = join("\n", $question["puzzle"]);

        $this->gamer->game()->updateOrCreate(['gamer_id' =>
        $this->gamer->id], [
            "question" => $question
        ]);

        return $this->printPuzzle($puzzle, $question["shuffled"]);
    }
}
