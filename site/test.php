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
  background-color: #CCC;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
</style>
<label class="form_col" for="firstName">Prénom :</label>
    <!--  <input name="firstName" id="firstName" type="text" />-->

      <span class="tooltip" style="display: none;">Un prénom ne peut pas faire moins de 2 caractères</span>
     <!--<br /><br />-->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="firstName">Pseudo :</label>  
  <div class="col-md-4">-->
  <input id="firstName" name="firstName" type="text"  placeholder="Pseudo" class="form-control input-md" required="">
 <!-- </div>
</div>-->
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
            login.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            login.className = 'incorrect';
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