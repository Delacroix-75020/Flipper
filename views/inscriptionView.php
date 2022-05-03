
<form method="post" action="">
	<div class="container mt-5 mb-5">
		<div class="row d-flex justify-content-center">
			<div class="card" style="max-width: 40rem;">
				<div class="card-header">
					<h3 class="text-center">
						Inscription
					</h3>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<label for="nom" class="form-label">Votre nom</label>
						<input type="text" name="nom" id="nom" maxlength="30" pattern="^[a-zA-Z][a-zA-Z]{1,30}$" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="prenom" class="form-label">Votre prénom</label>
						<input type="text" name="prenom" id="prenom" maxlength="30" pattern="^[a-zA-Z][a-zA-Z]{1,30}$" class="form-control" required>
					</div>

					<div class="mb-3">
						<label for="email" class="form-label">Votre adresse email</label>
						<input type="email" name="email" id="email" maxlength="50" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="mdp" class="form-label">Votre mot de passe</label>
						<input type="password" name="mdp" id="mdp" maxlength="255" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" class="form-control" required>
					</div>
					<div id="box" style="display: none;">
						<p id="security-mdp"></p>
					</div>
					<div class="mb-3">
						<label for="mdp2" class="form-label">Confirmation du mot de passe</label>
						<input type="password" name="mdp2" id="mdp2" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="adresse" class="form-label">Votre adresse</label>
						<input type="text" name="adresse" id="adresse" class="form-control" required>
					</div>
                    <div class="mb-3">
						<label for="tel" class="form-label">Votre numéro de téléphone</label>
						<input type="tel" name="tel" id="tel" minlength="10" maxlength="10" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="pays" class="form-label">Votre Biographie</label>
						<input type="text" name="bio" id="bio" maxlength="255" class="form-control" required>
					</div>
				</div>
				<div class="card-footer">
					<div class="row d-flex justify-content-center">
						<div class="col-6">
							<button type="submit" name="inscription" class="btn btn-lg w-100 text-light fw-bold" style="background-color: #008080; border-color: #AFEEEE;">
								Créer un compte
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- SUPPRESSION DES ESPACES -->
<script>

	// Suppression des espaces pour le nom
	$("input#nom").on({
		keydown: function(e) {
			if (e.which === 32)
				return false
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});

	// Suppression des espaces pour le prénom
	$("input#prenom").on({
		keydown: function(e) {
			if (e.which === 32)
				return false
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});

	// Suppression des espaces pour le téléphone
	$("input#tel").on({
		keydown: function(e) {
			if (e.which === 32)
				return false
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});

	// Suppression des espaces pour l'adresse email
	$("input#email").on({
		keydown: function(e) {
			if (e.which === 32)
				return false
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});

	// Suppression des espaces pour le code postal
	$("input#cp").on({
		keydown: function(e) {
			if (e.which === 32)
				return false
		},
		change: function() {
			this.value = this.value.replace(/\s/g, "");
		}
	});

</script>
<!-- / SUPPRESSION DES ESPACES -->


<!-- SUPPRESSION DES LETTRES DANS LES INPUT TEL ET CP -->
<script type="text/javascript">
/* Cette fonction permet d'insérer seulement des chiffres compris entre 0 et 9 */
/* Elle est résistante aux : 
- Copier Coller
- Glisser Déposer
- Raccouris clavier
- Opération de menu contextuel
- Touches non typables
- Position d'insertion
- Différentes disposition du clavier */
/* Elle est également supportable sur tous les navigateurs depuis IE 9. */

	function onlyNumber(textbox, inputFilter) {
  		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    		textbox.addEventListener(event, function() {
      			if (inputFilter(this.value)) {
        			this.oldValue = this.value;
        			this.oldSelectionStart = this.selectionStart;
        			this.oldSelectionEnd = this.selectionEnd;
      			} else if (this.hasOwnProperty("oldValue")) {
        			this.value = this.oldValue;
        			this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      			} else {
        			this.value = "";
      			}
    		});
  		});
	}

	onlyNumber(document.getElementById("tel"), function(value) {
  		return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	onlyNumber(document.getElementById("cp"), function(value) {
  		return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

</script>
<!-- / SUPPRESSION DES LETTRES DANS LES INPUT TEL ET CP -->

<!-- TÉLÉPHONE : AJOUT D'UN ESPACE APRES LA SAISIE DE 2 CHIFFRES -->
<script type="text/javascript">
	/* OPTIONNEL
	document.getElementById('tel').addEventListener('input', function (e) {
  		e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
	}); */
</script>
<!-- / TÉLÉPHONE : AJOUT D'UN ESPACE APRES LA SAISIE DE 2 CHIFFRES -->

<!-- VÉRIFICATION DE LA SÉCURITÉ DU MOT DE PASSE -->
<script type="text/javascript">

// Déclaration des variables
const password = document.getElementById("mdp"); // ID du champ de mot de passe
const security = document.getElementById("security-mdp"); // ID du texte de la box

// Si l'utilisateur ne saisi aucun caractère, alors on affiche rien
security.innerHTML = "";

// Si l'utilisateur clique sur le champ de mot de passe, la box apparaît mais pas le texte.
password.onfocus = function() {
  document.getElementById("box").style.display = "block";
}

// Si l'utilisateur clique en dehors du champ de mot de passe, la box disparaît.
password.onblur = function() {
  document.getElementById("box").style.display = "none";
}

// Déclaration des variables de caractères
var MAJUSCULE = /[A-Z]/g; // Lettres MAJUSCULES
var minuscule = /[a-z]/g; // Lettres minuscules
var chiffre = /[0-9]/g;   // Chiffres

/* Création d'un fonction permettant de détecter les caractères saisis. */

// Si l'utilisateur commence à inscire son mot de passe dans le champ,
// on vérifie les caractères saisis, donc la sécurité.
password.onkeyup = function() {
// Véfification du mot de passe saisi : 
	
	// Sécurité du mot de passe : très faible
	// Si "A" ou "a" ou "1" est saisi, alors on affiche la sécurité du mot de passe
  	if(password.value.match(MAJUSCULE) || password.value.match(minuscule) || password.value.match(chiffre)) {
    	security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='#FF6347'>Très faible</font></p>";

    	// Sécurité du mot de passe : faible
    	// Si "Aa" ou "A1", ou "aA" ou "a1" ou "1a" ou "1A" est saisi, alors on continu
    	if ( (password.value.match(MAJUSCULE) && password.value.match(minuscule)) || (password.value.match(MAJUSCULE) && password.value.match(chiffre)) || (password.value.match(minuscule) && password.value.match(MAJUSCULE)) ||  (password.value.match(minuscule) && password.value.match(chiffre)) || (password.value.match(chiffre) && password.value.match(minuscules)) || (password.value.match(chiffre) && password.value.match(MAJUSCULE)) ) {
	  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='orange'>Faible</font></p>";

	  		// Sécurité du mot de passe : moyen
	    	// Si "Aa1" ou "A1a", ou "aA1" ou "a1A" ou "1aA" ou "1Aa" saisi, alors on continu
	  		if ( (password.value.match(MAJUSCULE) && password.value.match(minuscule) && password.value.match(chiffre)) || (password.value.match(MAJUSCULE) && password.value.match(chiffre) && password.value.match(minuscule)) || (password.value.match(minuscule) && password.value.match(MAJUSCULE) && password.value.match(chiffre)) || (password.value.match(minuscule) && password.value.match(chiffre) && password.value.match(majuscule)) || (password.value.match(chiffre) && password.value.match(minuscule) && password.value.match(MAJUSCULE)) || (password.value.match(chiffre) && password.value.match(MAJUSCULE) && password.value.match(minuscule)) ) {
		  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='aqua'>Moyen</font></p>";

		  		// Sécurité du mot de passe : fort
		  		// Si le mot de passe saisi est supérieur à 8 caractères,
		  		// on dit l'utilisateur que son mot de passe est sécurisé.
		  		if (password.value.length > 8) {
			  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='#00FF00'>Fort</font></p>";
			  	} else {
			  		// Si le mot de passe de l'utilisateur est inférieur à 8,
			  		// on affiche à nouveau la 3ème condition
			  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='aqua'>Moyen</font></p>";
			  	}
		  	} else {
		  		// Si l'utilisateur enlève un caractère,
		  		// on affiche à nouveau la 2ème condition
		  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='orange'>Faible</font></p>";
		  	}
	  	} else {
	  		// Si l'utilisateur enlève un caractère,
	  		// on affiche à nouveau la 1ère condition
	  		security.innerHTML = "<p class='text-dark'><i class='fas fa-shield-alt'></i>&nbsp;&nbsp;Sécurité du mot de passe : <font color='#FF6347'>Très faible</font></p>";
	  	}
	} else {
		// Si l'utilisateur ne saisi aucun caractère,
		// alors on affiche rien
	 	security.innerHTML = "";
	}
}
</script>
<!-- / VÉRIFICATION DE LA SÉCURITÉ DU MOT DE PASSE -->