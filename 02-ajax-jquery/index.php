<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script>
    $(document).ready(function () {
        //executer une requete AJAX avec Jquery
$.get('../01-bases/worker.php').done(function (response) {
    alert(response);
});
    });
    </script>
</body>
</html>