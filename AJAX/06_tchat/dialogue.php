<?php 

    require_once('inc/init.inc.php');

    if(empty($_SESSION['pseudo'])){
        // si l'utilisateur est deja present on le redirige vers index.php 
        header("location:index.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="conteneur">
       <h2>Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
       <div id="message_tchat"></div>
       <div id="liste_membre_connecte"></div>
       <div class="clear"></div>
       <div id="smiley">
           <img src="smil/smiley1.gif" alt=":)">
       </div>
       <!--FORMULAIRE-->
       <div id="formulaire_tchat">
            <form id="form">
            <textarea name="message" id="message" maxlength="300" rows="5"></textarea>
            <input type="submit" name="envoi" value="envoi" class="submit">
            </form>
       </div>
       <div id="postMessage"></div>
    </div>

    <script>

        // pour récupérer la liste des membres connectés 
        setInterval("ajax(liste_membre_connecte)", 5000);



        ajax('message_tchat');
        // déclaration de la fonction Ajax
        function ajax(mode, arg = ''){
                if(typeof(mode) == 'object'){
                    mode = mode.id;
                    // l'argument mode recevra les id des differents elements de notre page. Sachant que l'on peut séléctionner des éléments html directement par leur id (sans getElementBy..) il y a un rique de récupérer un objet représentant l'élément html dans ce cas nous récupérer un objet représent l'élément html, dans ce cas nous récupérons juste l'id de l'élément ( mode = mode.id)

                }
                console.log("mode actuel: "+mode);

                var file = "ajax_dialogue.php";
                var parametres = "mode="+mode+"&arg="+arg;

                if(window.XMLHttpRequest){
                        var xhttp = new XMLHttpRequest();
                    } else {
                        var xhttp = new ActiveXObject("Microsoft.XMLHTTP");  // IE < version 7 
                    }

                    xhttp.open("POST", file, true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    xhttp.onreadystatechange = function(){
                         if(xhttp.readyState == 4 && xhttp.status == 200){
                             console.log(xhttp.responseText);
                             var obj = JSON.parse(xhttp.responseText);

                             document.getElementById(mode).innerHTML = obj.resultat;
                             var boiteMessage = document.getElementById("message_tchat");
                             document.getElementById(mode). scrollTop = boiteMessage.scrollHeight;
                            //  permet de descendre l'ascenceur de ce div et de voir les derniers messages
                         }
                    
                    }
                   xhttp.send(parametres);
        }
    </script>
</body>
</html>