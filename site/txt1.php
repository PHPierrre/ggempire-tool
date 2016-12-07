<?php session_start(); ?>
<html>
<head>
<link href="../styles/styles-b.css" rel="stylesheet" media="all" type="text/css">
<meta charset="utf-8">
</head>
<body background="../fond.png">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<center><div style="background-color:rgba(255,255,255,1.00);width:1000">
<form class="form-horizontal" method="post" action="inscription.php">
<fieldset>
<style type="text/css">
body {
 padding-top: 50px;
}

.form_col {
  display: inline-block;
  margin-right: 15px;
  padding: 3px 0px;
  width: 200px;
  min-height: 1px;
  text-align: right;
}

input {
  padding: 2px;
  border: 1px solid #CCC;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  outline: none; /* Retire la bordure orange appliquée par certains navigateurs (Chrome notamment) lors du focus des éléments <input> */
}

input:focus {
  border-color: rgba(82, 168, 236, 0.75);
  -moz-box-shadow: 0 0 8px rgba(82, 168, 236, 0.5);
  -webkit-box-shadow: 0 0 8px rgba(82, 168, 236, 0.5);
  box-shadow: 0 0 8px rgba(82, 168, 236, 0.5);
}

.correct {
  border-color: rgba(68, 191, 68, 0.75);
}

.correct:focus {
  border-color: rgba(68, 191, 68, 0.75);
  -moz-box-shadow: 0 0 8px rgba(68, 191, 68, 0.5);
  -webkit-box-shadow: 0 0 8px rgba(68, 191, 68, 0.5);
  box-shadow: 0 0 8px rgba(68, 191, 68, 0.5);
}

.incorrect {
  border-color: rgba(191, 68, 68, 0.75);
}

.incorrect:focus {
  border-color: rgba(191, 68, 68, 0.75);
  -moz-box-shadow: 0 0 8px rgba(191, 68, 68, 0.5);
  -webkit-box-shadow: 0 0 8px rgba(191, 68, 68, 0.5);
  box-shadow: 0 0 8px rgba(191, 68, 68, 0.5);
}

.tooltip {
  display: inline-block;
  margin-left: 20px;
  padding: 2px 4px;
  border: 1px solid #555;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
  z-index:1000;
}
</style>
<noscript>Votre navigateur n'accepte pas le javascript, vous ne vouvez donc pas utiliser le site</noscript>

<!-- Form Name -->
<center><legend>Inscription</legend></center>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="login">Pseudo :</label>  
  <div class="col-md-4">
  <input id="login" name="login" type="text" placeholder="Pseudo" class="form-control input-md" required="">
 </div> <span class="tooltip" style="display: none;">Votre pseudo ne peut pas faire moins de 4 caractères</span>
   
</div>
 <br><br>
<!-- Password input-->
<!--
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Mot de passe :</label>
  <div class="col-md-4">
    <input id="password" name="pass1" type="password" placeholder="Mot de passe" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input--><!--
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Confirmer le mot de passe :</label>
  <div class="col-md-4">
    <input id="password" name="pass2" type="password" placeholder="Mot de passe" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input--><!--
<div class="form-group">
  <label class="col-md-4 control-label" for="mail">Adresse e-mail</label>  
  <div class="col-md-4">
  <input id="mail" name="mail" type="email" placeholder="patatedugge@mail.com" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea --><!--
<div class="form-group">
  <label class="col-md-4 control-label" for="">Information : </label>
  <div class="col-md-4">                     
    <textarea cols="8" rows="18" class="form-control" id="" name="">La chartre du site.

Votre pseudo et mot de passe sont gardés dans notre base de données.
Votre mot de passe est haché et ne pourra pas être visible en claire (reporter vous a la technologie SHA1 de cryptage).
Votre mot de passe ainsi que votre e-mail personnel ne seront jamais diffusés.
Votre e-mail sert à l'inscription en cas de longue absence. Votre adresse e-mail ne sera jamais utiliser pour être revendu à des fins financières.

Des que vous quitter l'alliance, vos données seront effaces ainsi que votre compte bloqué.</textarea>
  </div>
</div><br>
Avant de continuer , vous consentez a avoir lu la chartre du site.

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Envoyer votre inscription</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Confirmer</button>
  </div>
</div>

</fieldset>
</form>
</div></center>


<script type="text/javascript">
(function() { // On utilise une IEF pour ne pas polluer l'espace global
    
    // Fonction de désactivation de l'affichage des « tooltips »
    
    function deactivateTooltips() {
    
        var spans = document.getElementsByTagName('span'),
        spansLength = spans.length;
        
        for (var i = 0 ; i < spansLength ; i++) {
            if (spans[i].className == 'tooltip') {
                spans[i].style.display = 'none';
            }
        }
    
    }
    
    
    // La fonction ci-dessous permet de récupérer la « tooltip » qui correspond à notre input
    
    function getTooltip(element) {
    
        while (element = element.nextSibling) {
            if (element.className === 'tooltip') {
                return element;
            }
        }
        
        return false;
    
    }
    
    
    // Fonctions de vérification du formulaire, elles renvoient « true » si tout est OK
    
    var check = {}; // On met toutes nos fonctions dans un objet littéral
    
    check['sex'] = function() {
    
        var sex = document.getElementsByName('sex'),
            tooltipStyle = getTooltip(sex[1].parentNode).style;
        
        if (sex[0].checked || sex[1].checked) {
            tooltipStyle.display = 'none';
            return true;
        } else {
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['lastName'] = function(id) {
    
        var name = document.getElementById(id),
            tooltipStyle = getTooltip(name).style;
    
        if (name.value.length >= 2) {
            name.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['firstName'] = check['lastName']; // La fonction pour le prénom est la même que celle du nom
    
    check['age'] = function() {
    
        var age = document.getElementById('age'),
            tooltipStyle = getTooltip(age).style,
            ageValue = parseInt(age.value);
        
        if (!isNaN(ageValue) && ageValue >= 5 && ageValue <= 140) {
            age.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            age.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['login'] = function() {
    
        var login = document.getElementById('login'),
            tooltipStyle = getTooltip(login).style;
        
        if (login.value.length >= 4) {
            login.className = 'correct form-control input-md';
            tooltipStyle.display = 'none';
            return true;
        } else {
            login.className = 'incorrect form-control input-md';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['pwd1'] = function() {
    
        var pwd1 = document.getElementById('pwd1'),
            tooltipStyle = getTooltip(pwd1).style;
        
        if (pwd1.value.length >= 6) {
            pwd1.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            pwd1.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['pwd2'] = function() {
    
        var pwd1 = document.getElementById('pwd1'),
            pwd2 = document.getElementById('pwd2'),
            tooltipStyle = getTooltip(pwd2).style;
        
        if (pwd1.value == pwd2.value && pwd2.value != '') {
            pwd2.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            pwd2.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    check['country'] = function() {
    
        var country = document.getElementById('country'),
            tooltipStyle = getTooltip(country).style;
        
        if (country.options[country.selectedIndex].value != 'none') {
            tooltipStyle.display = 'none';
            return true;
        } else {
            tooltipStyle.display = 'inline-block';
            return false;
        }
    
    };
    
    
    // Mise en place des événements
    
    (function() { // Utilisation d'une fonction anonyme pour éviter les variables globales.
    
        var myForm = document.getElementById('myForm'),
            inputs = document.getElementsByTagName('input'),
            inputsLength = inputs.length;
    
        for (var i = 0 ; i < inputsLength ; i++) {
            if (inputs[i].type == 'text' || inputs[i].type == 'password') {
    
                inputs[i].onkeyup = function() {
                    check[this.id](this.id); // « this » représente l'input actuellement modifié
                };
    
            }
        }
    
        myForm.onsubmit = function() {
    
            var result = true;
    
            for (var i in check) {
                result = check[i](i) && result;
            }
    
            if (result) {
                alert('Le formulaire est bien rempli.');
            }
    
            return false;
    
        };
    
        myForm.onreset = function() {
    
            for (var i = 0 ; i < inputsLength ; i++) {
                if (inputs[i].type == 'text' || inputs[i].type == 'password') {
                    inputs[i].className = '';
                }
            }
    
            deactivateTooltips();
    
        };
    
    })();
    
    
    // Maintenant que tout est initialisé, on peut désactiver les « tooltips »
    
    deactivateTooltips();

})();
    </script>
</body>
</html>