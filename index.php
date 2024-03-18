<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nahrávání obrázku</title>
</head>
<body>
    <h1>Nahrání nového obrázku</h1><br>
    
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="soubor">Soubor obrázku: </label>
        <input type="file" name="soubor"><br>
        <label for="novyNazev">Nový název souboru: </label>
        <input type="text" name="novyNazev"><br>
        <input type="checkbox" name="zobraz">
        <label for="zobraz">Po uložení obrázek zobrazit</label><br>
        <button>Nahraj obrázek</button>
        <hr>
    </form>
    
    <?php
    //input
    echo'<pre>';
    echo var_dump($_FILES);
    if(isset($_FILES['soubor'])){//hlidani zda byl soubor skutecne nahran
        move_uploaded_file($_FILES['soubor']['tmp_name'], ['novyNazev']); //nutnost nahrat obrazek, jinak je docasne ulozeny na serveru v adrese pod tmp_name
    }


    ?>
</body>
</html>