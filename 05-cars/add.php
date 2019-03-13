<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <?php
        $db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        $brand = null;
        $model = null;
        $price = null;
        $picture = null;

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $price = intval($_POST['price']);
            $picture = $_FILES['picture'];

            $errors = [];

            if (strlen($brand) <= 2) {
                $errors['brand'] = 'Marque invalide.';
            }

            if (strlen($model) <= 2) {
                $errors['model'] = 'Modèle invalide.';
            }

            if (!is_numeric($price) || $price < 1) {
                $errors['price'] = 'Prix invalide.';
            }

            if ($picture['error'] !== 0) {
                $errors['picture'] = 'Vous n\'avez pas ajouté d\'image.';
            }

            // L'image est un jpg, jpeg, png, gif
            if (!isset($errors['picture'])) {
                $extension = pathinfo($picture['name'])['extension']; // Renvoie l'extension du fichier uploadé

                if (!in_array(strtolower($extension), ['jpeg', 'jpg', 'png', 'gif'])) {
                    $errors['picture'] = 'Image pas valide';
                }

                // if (!preg_match('/\.(jpg|jpeg|png|gif)$/mi', $extension)) {
                //     $errors['image'] = 'Image pas valide';
                // }
            }

            var_dump($errors);

            if (empty($errors)) {
                // On fait l'upload
                var_dump($picture);
                $fileName = uniqid().'_'.$picture['name'];
                move_uploaded_file($picture['tmp_name'], __DIR__ . './assets/images/'.$fileName);

                // On peut faire la requête
                $query = $db->prepare('INSERT INTO cars (brand, model, price, picture) VALUES (:brand, :model, :price, :picture)');
                $query->bindValue(':brand', $brand);
                $query->bindValue(':model', $model);
                $query->bindValue(':price', $price);
                $query->bindValue(':picture', $fileName);
                
                if ($query->execute()) {
                    echo '<div class="alert alert-success">
                        La voiture a été ajoutée!
                    </div>';
                }
            }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="brand">Marque :</label>
                        <input type="text" name="brand" id="brand" class="form-control" value="<?= $brand; ?>">
                    </div>
                    <div class="form-group">
                        <label for="model">Modèle :</label>
                        <input type="text" name="model" id="model" class="form-control" value="<?= $model; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" class="form-control" value="<?= $price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="file" name="picture" id="picture" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block">Envoyer</button>
                    <a href="index.php" class="btn btn-primary btn-block">Retour</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    
        

    </script>
  </body>
</html>
