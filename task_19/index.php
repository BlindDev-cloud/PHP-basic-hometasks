<html>
<head>
    <meta charset="UTF-8">
    <title>Контрольна робота</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
<header>
    <h1>Контрольна робота</h1>
</header>
<main>
    <form action="scripts/check.php" method="post">
        <fieldset>
            <?php for ($i = 0; $i < 12; ++$i):
                $a = random_int(-100, 100);
                $b = random_int(-100, 100);
                $operator = match (true) {
                    0 <= $i && 3 > $i => '+',
                    3 <= $i && 6 > $i => '-',
                    6 <= $i && 9 > $i => '*',
                    9 <= $i && 11 >= $i => '/'
                };

                if (0 === $b && '/' === $operator) {
                    $b = random_int(1, 100);
                }

                $str = (0 > $b) ? $a . ' ' . $operator . ' (' . $b . ')' :
                    $a . ' ' . $operator . ' ' . $b;

                echo '<label>' . ($i + 1) . '. ' . $str . '</label>', PHP_EOL,

                    '<input type="hidden" name="condition[]" value="' . $a . ' ' . $operator . ' ' . $b . '">', PHP_EOL,

                    '<input type="text" name="answer[]" placeholder="0.00">',
                
                    PHP_EOL, '</br>', PHP_EOL;
            endfor ?>
        </fieldset>
        <button type="submit">Submit</button>
    </form>
</main>
</body>
</html>