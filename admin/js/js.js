// JavaScript Document cedric

// $(function(){ //pour verifier que le js se charge
//     console.log("coucou");
// });

$(function(){//vérifier que le chargement de la page se fait correment
    // on met un écouteur d'évènement , au click sur les balises a pour cela il faut ajouter une class .supr sur la balise a
    $('.supr').on("click",function(evenement){
        evenement.preventDefault();//cela empeche le comportement par default du a
        if (confirm('Voulez effacer cette info')) { //on verifie si l'utilisateur a cliqué , oui? on fait le contenu du if; non ? on fait rien
        var lien = $(this).attr('href');
        //console.log(lien);
        window.location.href=lien;
        }
    })

})
