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

    class Thesaurus{
        private $thesaurus;

        function __construct(array $thesaurus){
            $this->thesaurus = $thesaurus;
        }

        public function getSynonyms(string $word) : string{
            return (array_key_exists($word, $this->thesaurus)) ? 
            '{"word":'.json_encode($word)
                .',"synonyms":'.json_encode($this->thesaurus[$word]).'}' 
                : '{"word":'.json_encode($word).',"synonyms":[]}';
        }
    }

    $thesaurus = new Thesaurus(
        [
            "small" => array("little","compact"),
            "big" => array("humongous", "huge",'large')
        ]
    );

    echo $thesaurus->getSynonyms("big");
    echo "<br>\n";
    echo $thesaurus->getSynonyms("asleast");

    ?>
</body>
</html>