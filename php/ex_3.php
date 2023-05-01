<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        class RankingTable{
            var $array;
            public function __construct($players){
                $index = 1;
                foreach($players as $player){
                    $this->array[$index] = array(
                        'name' => $player,
                        'score' => '0',
                    );
                    $index += 1;
                }
            }

            public function recordResult($name,$score){
                $this->array[ 
                    array_search($name,(array_values($this->array)))
                ]['score'] = $score;
            }

            public function playerRank($rank){
                // var_dump($this->array);
                var_dump($this->array[$rank]);
            }
            public function sortByScore(){
            }
        }

        $table = new RankingTable(array('Jan', 'Maks', 'Monika'));

        $table->recordResult('Jan', 2);
        $table->recordResult('Maks', 3);
        $table->recordResult('Monika', 5);




        $table->sortByScore();

        echo $table->playerRank(1);
        // echo "<br>\n";
        // echo $table->playerRank(2);
        // echo "<br>\n";
        // echo $table->playerRank(3);
    ?>
</body>
</html>