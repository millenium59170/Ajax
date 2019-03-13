var form = $('form'); // select du formulaire

form.on('submit', function (event) {
    event.preventDefault();// on annule la redirection du formulaire

    // on recup les donnee du formulaire
    var formData = form.serialize();

    // on execute la requete AJAX
    $.ajax({
       type: 'POST',
       url: form.attr('action'),
       data: formData // on passe les donnes a message.php
     }).done(function (response) {
         console.log(response);
         $('#messages').append(`
         <div class="media mt-5">
             <div class="media-body">
                 <h5>`+response.pseudo+` à `+response.date+` :</h5>
                 `+response.message+`
             </div>
             <img src="default-avatar.png" alt="`+response.pseudo+`">
         </div>
     `);
     });
});

// Récupère tous les messages quand on arrive sur le tchat
$.get('./list-message.php').done(function (messages) {
    for (message of messages) {
        $('#messages').append(`
            <div class="media mt-5">
                <div class="media-body">
                    <h5>`+message.pseudo+` à `+message.date+` :</h5>
                    `+message.message+`
                </div>
                <img src="default-avatar.png" alt="`+message.pseudo+`">
            </div>
        `);
    }
});
