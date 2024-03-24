<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nahrávání obrázku</title>
</head>
<body>
    <h1>Nahrání obrázku</h1><br>
    
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
        echo'<pre>';
        echo var_dump($_FILES);


        $nazev = $_POST['novyNazev'];
        if (empty($nazev)){
            $nazev = $_FILES['soubor']['name'];
        }else{
            $nazev = $_POST['novyNazev'.'.jpg'];
        }
        
        
        //kontrola, zda soubour je obrázek
        $filename = $_FILES['soubor']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = array('jpg','png','gif', 'JPG', 'PNG', 'GIF');
        if( ! in_array( $ext, $allowed ) ) {
            echo 'Chybný formát. Akceptováno je JPG, GIF, PNG.';
        }else{//pokud je obrazek, ulozi se pod zadaným názvem
            if(isset($_FILES['soubor'])){
                move_uploaded_file($_FILES['soubor']['tmp_name'], $nazev);
            } 
        }

    ?>
</body>
</html>