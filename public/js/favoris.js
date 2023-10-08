$('.add-favori').off().on('click', function(event){
    let costumeId = $(this).data('costume-id');
    // On mémorise le bouton cliqué
    let button = $(this);
    // On analyse l'icône du bouton pour savoir si on ajoute ou on supprime le costume aux favoris
    // On lance une requête Ajax vers le serveur
    let action;
    if (button.find('i').hasClass('fa-regular')) {
        action = "add";
    }else{
        action = "remove";
    }
    $.ajax({
        url: '/favoris/add',
        method: 'POST',
        data: {
            idCostume: costumeId,
            action: action
        }
    }).done(function(response){
        // On vérifie si le bouton est porteur de la classe de from_user_profil auquel cas on supprime la carte parent
        // sinon on change l'icône du bouton
        if(button.hasClass('from_user_profil')){
            button.closest('.parent-card').remove();
        }else{
            // Vérifie si l'icone de bouton est pleine ou vide et on l'inverse
            if (button.find('i').hasClass('fa-regular')) {
                button.find('i').removeClass('fa-regular').addClass('fa-solid');
            }else{
                button.find('i').removeClass('fa-solid').addClass('fa-regular');
            }
        }
    });
});