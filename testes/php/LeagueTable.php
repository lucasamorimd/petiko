<?php
/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

A classe LeagueTablr acompanha o score de cada jogador em uma liga. Depois de cada jogo, o score do jogador é salvo utilizanod a função recordResult.

O Rank de jogar na liga é calculado utilizando a seguinte lógica:

1- O jogador com a pontuação mais alta fica em primeiro lugar. O jogador com a pontuação mais baixa fica em último.
2- Se dois jogadores estiverem empatados, o jogador que jogou menos jogos é melhor posicionado.
3- Se dois jogadores estiverem empatados na pontuação e no número de jogos disputados, então o jogador que foi o primeiro na lista de jogadores é classificado mais alto.


Implemente a funação playerRank que retorna o jogador de uma posição escolhida do ranking.

Exemplo:

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);


Todos os jogadores têm a mesma pontuação. No entanto, Arnold e Chris jogaram menos jogos do que Mike, e como Chris está acima de Arnold na lista de jogadores, ele está em primeiro lugar.

Portanto, o código acima deve exibir "Chris".


*/

class LeagueTable
{
    public function __construct($players)
    {
        $this->standings = array();
        foreach ($players as $index => $p) {
            $this->standings[$p] = array(
                'index' => $index,
                'games_played' => 0,
                'score' => 0
            );
        }
    }

    public function recordResult($player, $score)
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank($rank)
    {
        /* 
1- O jogador com a pontuação mais alta fica em primeiro lugar. O jogador com a pontuação mais baixa fica em último.
VERIFICAR QUAL O JOGADOR COM MAIOR SCORE
SE TIVER UM EMPATE ENTRE OS MAIORES SCORES
MOSTRAR OS EMPATADOS

2- Se dois jogadores estiverem empatados, o jogador que jogou menos jogos é melhor posicionado.
VERIFICAR QUAL JOGADOR ENTRE OS EMPATADOS TEM MENOS JOGOS
SE TIVER UM EMPATE ENTRE ESSES JOGADORES
MOSTRAR ESSES JOGADORES

3- Se dois jogadores estiverem empatados na pontuação e no número de jogos disputados, então o jogador que foi o primeiro na lista de jogadores é classificado mais alto.
VERIFICAR QUAL TEM O VALOR MENOR NA KEY DO ARRAY
*/
        $players_list = $this->standings;
        foreach ($players_list as $player => $values) {
            $score[$values['index']] = ['nome' => $player, 'score' => $values['score']];
            $score_count[$player] = $values['score'];
            $games_played[$values['index']] =  ['nome' => $player, $values['games_played']];
            $games_played_count[] = $values['games_played'];
            $index[$values['index']] = ['nome' => $player, $values['index']];
            $players[$player] = $player;
        }
        rsort($score);
        $count_score = array_count_values($score_count);
        $count_games_played = array_count_values($games_played_count);
        if (array_values($count_score) > 1 && count(array_keys($count_score)) != 1) {
            sort($games_played);
        } else {
            echo "teste";
            return $score[$rank - 1]['nome'];
        }
        if (array_values($count_games_played) > 1 && count(array_keys($count_games_played)) != 1) {
            rsort($index);
        } else {
            return $games_played[$rank - 1]['nome'];
        }




        /*echo "<pre>";

        print_r($count_score);
        print_r($score);
        print_r($games_played);
        print_r($count_games_played);
        print_r($index);
        print_r($players);*/


        return $index[$rank - 1]['nome'];
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);
