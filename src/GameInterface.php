<?php

namespace App;

interface GameInterface
{
    public function play();
    public function getCurrentPlayer();
    public function playerGiveSymbolAtPosition(string $symbole, int $x, int $y);
    public function getCurrentSymbole();
}
