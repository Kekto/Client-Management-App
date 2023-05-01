<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ex_2.php" method="get">
        TextInput: <input type="text" name="textInput">
        NumericInput: <input type="text" name="numericInput" pattern="[0-9]+">
        <input type="submit">
    </form>
    <br/>

    <?php
        $substring = "";

        class TextInput{
            var $string;

            public function add($text){
                if(!empty($_GET)){
                    $this->string .= $text;
                }
            }
            public function getValue(){
                return $this->string; 
            }
        }
        class NumericInput extends TextInput{
            function add($text){
                if(!empty($_GET)){
                    if (ctype_digit($text)) {
                        $this->string .= $text;
                    }
                }
            }
        }

        $textInput = new TextInput;
        if(!empty($_GET)){
            $textInput->add($_GET["textInput"]);
            $substring .= $textInput->getValue();
        }

        $numericInput = new NumericInput;
        if(!empty($_GET)){
            $numericInput->add($_GET["numericInput"]);
            $substring .= $numericInput->getValue();
        }
        echo $substring;
    ?>
</body>
</html>