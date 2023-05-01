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
            var $arr;
            public function __construct($array){
                $this->arr = $array;
            }

            public function recordResult($name,$score){
                $this->arr[array_search($name,$this->arr)] = $score; 
            }

            public function playerRank($rank){
                echo $this->arr[$rank];
            }
        }

        $table = new RankingTable(array('Jan', 'Maks', 'Monika'));

        $table->recordResult('Jan', 2);
        $table->recordResult('Maks', 3);
        $table->recordResult('Monika', 5);

        echo $table->playerRank(0);
    ?>
</body>
</html>