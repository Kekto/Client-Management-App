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
        class Pipeline {
            public static function make(...$functions)
            {
                $result = function($arg) use ($functions)
                {
                    foreach($functions as $funcs)
                    {
                        if(!isset($value)){
                            $value = $funcs($arg);
                        }
                        else{
                            $value = $funcs($value);
                        }
                    }
                    return $value;
                };
                return $result;
            }
        }

        $pipeline = Pipeline::make(
            function($x) { return $x * 3; }, 
            function($x) { return $x + 1; },
            function($x) { return $x / 2; }
        );
        echo $pipeline(3);
    ?>
</body>
</html>