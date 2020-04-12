<?php

namespace App;

class Game implements GameInterface
{
    private $currentPlayerInAction;
    private $currentSymbol;
    private $currentPosX;
    private $currentPosY;
    private $resultCalculator;
    private $allActions;

    public function __construct(ResultCalculatorInterface $resultCalculator)
    {
        $this->resultCalculator = $resultCalculator;
        $this->allActions = [];
    }

    public function play()
    {
        return $this->resultCalculator->calculateResultForAGivenSuite([]);
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayerInAction;
    }

    public function currentPlayer(PlayerActionInterface $playerAction)
    {
        $this->currentPlayerInAction = $playerAction;

        return $this;
    }

    public function playerGiveSymbolAtPosition(string $symbole, int $x, int $y)
    {
        $this->currentSymbol = $symbole;
        $this->currentPosX = $x;
        $this->currentPosY = $y;
    }

    public function getCurrentSymbole()
    {
        return [$this->currentSymbol, $this->currentPosX, $this->currentPosY];
    }

    public function getAllAction()
    {
        return $this->allActions;
    }

    public function addAction(array $action)
    {
        $this->allActions[] = $action;
    }
}
