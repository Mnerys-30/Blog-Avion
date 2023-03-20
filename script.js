$(document).ready(function() {
    $('form').submit(function(event) { //on stoppe la progression pour donner le relais à JS
        event.preventDefault();
        const comment = $("InputContent").val();
        const userPseudo = $("#pseudo").val();
        const date = "a few moment later";
        //on envoi en base de données via la requête ajax
        $.post('', {
            content: comment,
        });
        $('<div><h3>' + userPseudo + '</h3><span>' + date + '</span><p>' + comment + '</p></div>').appendTo('#comments');
        // comme le champ de commentaire est toujours plein, on le vide
        $('#InputContent').val('');
    })
})