<?php
$values = array(
    "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"
);

// Список мастей карт
$suits = array("♠", "❤️", "♦", "♣");

// Создаем колоду карт
$deck = array();
foreach ($suits as $suit) {
    foreach ($values as $value) {
        $deck[] = $value . $suit;
    }
}

// Перемешиваем колоду карт
shuffle($deck);

// Раздача карт
$player1_cards = array();
$player2_cards = array();
foreach ($deck as $key => $card) {
    if ($key % 2 == 0) {
        $player1_cards[] = $card;
    } else {
        $player2_cards[] = $card;
    }
}

// Игра
$round = 1;
while (count($player1_cards) > 0 && count($player2_cards) > 0) {
    $player1_card = array_shift($player1_cards);
    $player2_card = array_shift($player2_cards);

    echo "Раунд " . $round . ":\n";
    echo "Игрок 1 выбирает " . $player1_card . "\n";
    echo "Игрок 2 выбирает " . $player2_card . "\n";

    $result = compareCards($player1_card, $player2_card);
    if ($result > 0) {
        $winner = "Игрок 1";
        $player1_cards[] = $player1_card;
        $player1_cards[] = $player2_card;
    } elseif ($result < 0) {
        $winner = "Игрок 2";
        $player2_cards[] = $player2_card;
        $player2_cards[] = $player1_card;
    } else {
        $winner = "Ничья";
        $player1_cards[] = $player1_card;
        $player2_cards[] = $player2_card;
    }
    echo $winner . " выигрывает раунд\n\n";

    $round++;
}

// Определение победителя
if (count($player1_cards) == 0) {
    echo "Игрок 2 выиграл игру\n";
} else {
    echo "Игрок 1 выиграл игру\n";
}

// Функция для сравнения карт
function compareCards($card1, $card2) {
    $values = array(
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "10" => 10,
        "J" => 11,
        "Q" => 12,
        "K" => 13,
        "A" => 14
    );

    $value1 = $values[substr($card1, 0, -1)];
    $value2 = $values[substr($card2, 0, -1)];

    if ($value1 > $value2) {
        return 1;
    } elseif ($value1 < $value2) {
        return -1;
    } else {
        return 0;
    }
}
