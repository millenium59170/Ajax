<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <!--
        Formulaire:
        1. Ajouter Bootstrap sur la page.
        2. Ajouter un formulaire en POST avec deux champs (Nom et message).
        3. Le formulaire sera traité sur le fichier worker.php (action).
        4. On va vérifier que le nom et le message fasse au moins 2 caractères.
        5. Si le formulaire est valide, on affiche "Succès".
        6. S'il y a des erreurs, on les affiche.
        7. AJAX en BONUS
    -->

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <ul id="smartphones">Chargement en cours...</ul>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    
        $.get('./smartphone.php').done(function (smartphones) {
            $('#smartphones').html(''); // supprimer "Chargement en cours..."
            for (smartphone of smartphones) {
                var li = $('<li></li>'); // On créé le li
                li.html(smartphone.brand + ' ' + smartphone.model + ' <br /> ' + smartphone.price + '€'); // On ajoute la marque et le modèle du smartphone dans le contenu du li
                $('#smartphones').append(li); // On ajoute le li dans le ul
            }
        });
    
    </script>
  </body>
</html>