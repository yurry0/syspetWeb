<html>

<head>

</head>

<body>

    <?php

    $teste = "a";


    if (empty(trim($teste))) {
        // Its empty so throw a validation error
        echo 'Input is empty!';
    } else {
        // Input has some text and is not empty.. process accordingly.. 

        echo 'Input not empty!';
    }

    ?>

</body>

</html>