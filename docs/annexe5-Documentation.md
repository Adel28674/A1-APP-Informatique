# Documentation du Code
**Saé, Semestre 3, Année 2022-2023**

**IUT de Vélizy**,

*Adel Hammiche, Yanis Bouchaib, Paul Montagnac, Esteban Pagis*

Cette annexe est destinée à documenter le code de l'application web (et de la base de données).

  

## Sommaire:

1. ### Base de données
2. ### Module de Probabilités
3. ### Système d'Inscription
4. ### Système de Connexion

###

  
1.  # Base de données (SQL)

Il est important comme spécifié dans le dossier de Conception, d'exécuter la commande suivante:

  
```sql
CREATE DATABASE PLANETCALCULATOR;
```
Une fois la base de données créée, il faut s'y connecter pour pouvoir exécuter le script. L'équipe de développement utilise cette commande dans le Raspberry Pi:

  
```bash
sudo mysql PLANETCALCULATOR
```
Une fois connecté, le script peut être utilisé avec la commande suivante:

  

source \home\saepi\SQL\script.sql

  

---

  

Décrivons maintenant le fonctionnement de ce script.

Celui-ci consiste à créer 3 tables: User, ModuleSession et ConnectError, voici un exemple de la commande utilisée pour la table "User":

  

CREATE TABLE User(
...
);

Les attributs de la table seront rajoutés entre les parenthèses.

Il est important avec la syntaxe MySQL de déclarer le type de variable d'une valeur, l'ID des tables est un Integer (INT), il ne doit pas être nul et s'auto-incrémentera à chaque création d'instance, voici la commande pour créer un ID (ici id_User):

  

id_User INT NOT NULL AUTO_INCREMENT

Attention, l'attribut AUTO_INCREMENT sera rajouté uniquement pour les clés primaires (PRIMARY KEY), nous ne rajouterons pas cette contrainte pour une clé étrangère (FOREIGN KEY), comme le montre ici l'attribut id_User sous forme de clé étrangère:

  

id_User INT NOT NULL

Revenons dans la table **User**, le type de variable de l'username et password sont des chaînes de caractères, autrement dit des VARCHAR

  

username VARCHAR(100) NOT NULL,

password VARCHAR(100) NOT NULL

La capacité maximale de 100 caractères a été définie pour un nom d'utilisateur et d'un mot de passe.

  

Pour déclarer l'id_User en tant que clé primaire, nous utilisons PRIMARY KEY:

PRIMARY KEY (id_User)

---
```sql
CREATE TABLE ModuleSession (
id_ModuleSession INT NOT NULL AUTO_INCREMENT,
id_User INT NOT NULL,
moduleName VARCHAR(50) NOT NULL,
useModuleDate DATETIME NOT NULL,
PRIMARY KEY (id_ModuleSession),
FOREIGN KEY (id_User) REFERENCES User(id_User)
);
```

Dans la table ModuleSession, l'id_ModuleSession est la PRIMARY KEY et l'id_User est la FOREIGN KEY

  

PRIMARY KEY (id_ModuleSession),

FOREIGN KEY (id_User) REFERENCES User(id_User)

Nous remarquons l'attribut REFERENCES User(id_User), qui signifie que cette clé étrangère est égale à la clé primaire de la table User, pour la liaison entre ModuleSession et User.

  

Le nom du module utilisé (moduleName) est un VARCHAR, sa limite est définie à 50 caractères max.

La date d'utilisation du module est définie par un DATETIME, qui récupère le date, ainsi que l'heure ou est utilisé le module sous la forme **AAAA-MM-JJ | HH-MM-SS**.

  

---
```sql
CREATE TABLE ConnectError (
id_ConnectError INT NOT NULL AUTO_INCREMENT,
id_User INT NOT NULL,
ipAddress VARCHAR(30) NOT NULL,
connectDate DATETIME NOT NULL,
PRIMARY KEY (id_ConnectError),
FOREIGN KEY (id_User) REFERENCES User(id_User)
);
```
La table ConnectError est construite d'une manière similaire à ModuleSession.

  

L'adresse IP de l'utilisateur qui génère un message d'erreur (ipAddress) est un VARCHAR limité à 30 caractères.

2. # Module de Probabilités
	1. ## Python
		Nous commençons par documenter les scripts python qui s'exécuteront dans la page PHP. 
		Comme décrit dans l'annexe précédente "Conception", nous séparons les 3 méthodes de calculs de probabilités en 3 scripts différents:
		- ``probaRectangleGauche.py``
		- ``probaTrapeze.py``
		- ``probaSimpson.py``

		Avant de détailler le fonctionnement de ces différentes fonctions, nous allons expliciter le fonctionnement de la fonction ``main()`` et de la fonction ``gauss()``  
		
		La fonction ``gauss()``:  
		```python  
		def gauss(t):  
			return 1 / (sigma*sqrt(2*np.pi))*np.exp(-(t-m)**2/(2*sigma**2))  
		```  
		Cette fonction prend en paramètre ``t`` puis renvoie le résultat.  
		C'est une simple traduction en python de la fonction de gauss ``sigma`` qui équivaut à ``σ`` et ``m`` qui équivaut à ``µ``. Nous avons utilisé ``import numpy as np`` et ``from math import sqrt`` pour pouvoir utiliser la fonction racine, le nombre pi (π) ainsi que la fonction exponentielle.  
		
		Décrivons désormais la fonction``main()``:  
		```python  
		def main():  
			global m  
			global sigma  
			global t  
			m = float(input("Enter m: ")) #m = 0  
		sigma = float(input("Enter sigma: ")) #sigma = 1  
		t = float(input("Enter t in P(X<t): ")) #1 # P(X<t)  
		a = m-3*sigma  
			integ = simpson(gauss,a,t,10000)  
			print(integ)  
		```  
		L'utilisateur peut choisir ``σ`` (sigma) et``µ``(m). Nous avons alors, pour pouvoir les utiliser dans cette fonction, passé ces paramètres en ``global`` car lorsque nous utilisons les méthodes (simpson, rectangle, trapèze), nous envoyons la fonction en paramètre sans fournir ses paramètres a elle. ``simpson(gauss,a,t,10000)`` et nous devions alors pouvoir utiliser ces données sans qu'elles soit passées en paramètre de la fonction ``gauss()``  
		donc :  
		```python  
		global m  
		global sigma  
		global t  
		```  
		Lorsque nous appelons les fonctions Simpson, rectangle et trapèze, nous leur envoyons en paramètre :  
		- la fonction ``gauss``  
		- la première borne de l'intervalle qui est fixe ``a = m-3*sigma`` car car dans l'intervalle ``m-3*sigma,m+3*sigma``, on retrouve 99% de l'aire de notre fonction.  
		- ``t`` la valeur entrée par notre utilisateur  
		- ``10000`` qui correspond au nombre d'intervalles souhaitées.  
		Après réflexion, ``3*sigma*1000`` aurait été plus judicieux par exemple.  
		
		Passons a la description de nos trois fonctions permettant d'utiliser nos trois méthodes.  
		1. ### ``ProbaRectangleGauche.py``  
		
		On retrouve la fonction qui utilise la Méthode Rectangle par la gauche ci-dessous  :  
		```python  
		def rectG(f,a,b,n):  
		h = (b-a)/n  
			S = 0  
		for i in range(0,n):  
		x = a + i*h  
				S = S + f(x)*h  
			return S  
		```  
		Cette fonction prend en paramètre:  
		- ``f`` qui est la fonction Gaussienne  
		- ``a``et ``b`` qui sont les bornes de l'intervalle ou l'on se place ``[a,b]``  
		``b`` est par ailleurs la valeur entrée par l'utilisateur ``t``. Elle est simplement renommée dans la fonction.  
		- ``n`` qui est le nombre de sous intervalles souhaitées  
		on définit ``h`` par ``h = (b-a)/n`` car  si on souhaite ``n``  sous-intervalles, on doit diviser l'intervalle ``[a,b]`` par le nombre de sous-intervalles ``n`` souhaitées.  
		``S`` est utilisée pour donner le résultat final ``t`` souhaité et sera incrémenté a chaque tour de boucle  
		
		la boucle ``for`` doit faire aller de *0* à *n-1* mais pour bien que cette dernière valeur qui n'est pas incluse dans une boucle ``for`` soit prise, on rajoute un tour de boucle et on arrive donc à ``(0,n)``  
		On utilise la boucle ``(0,n)`` car nous souhaitons utiliser la Méthode des Rectangles **par la gauche** et nous devons donc commencer en 0, soit la gauche de notre premier rectangle. Si nous souhaitions utiliser la méthode des rectangle par la droite, nous aurions utilisé ``for i in range(1,n+1)``  
		``x`` définit l'abscisse à laquelle nous devons utiliser notre fonction ``f`` pour obtenir l'image correspondante pour chaque intervalle. Nous posons donc ``x = a + i*h`` avec ``a`` qui est l'intervalle ``0`` à qui on ajoute a chaque tour la **une** taille de l'intervalle (``i+h``)  
		S est alors incrémentée à chaque tour (on additionne a lancienne valeur de ``S`` ).  
		On lui ajoute le résultat de la multiplication de la longueur fois la largeur(formule d'un rectangle).  
		Soit respectivement longueur (``f(x)``) et largeur (``h``).  
		
		2. ### ``ProbaTrapeze.py``  
		
		Parlons désormais de la fonction qui utilise la Méthode des trapèzes  
		```python  
		def trapeze(f,a,b,n):  
		h = (b-a)/ n  
			S = 0  
		for i in range(0,n):  
		x = a + i*h  
				x1 = a + (i+1)*h  
				S = S + (f(x)+f(x1))/2*h  
			return S  
		```  
		Nous avons déjà définit ``h``,``S``, et la boucle ``for`` qui parcoureras ``(0,n)`` donc ``[0,n-1]``  
		parlons simplement des éléments qui changent avec la fonction précédente.  
		Nous posons ``x`` qui est le point gauche de l'intervalle comme dans la *méthode des rectangles par la Gauche* et  ``x1`` qui est le point droit de l'intervalle ( on lui ajoute une fois h qui est toujours la taille d'un sous intervalle)  
		Nous ajoutons alors a la somme S, ``(f(x)+f(x1))`` qui donnera une image moyenne lorsque elle est ensuite divisée par 2, puis on multiplie ceci par h comme précédemment.  
		
		3. ### ``ProbaSimpson.py``  
		
		Parlons pour finir de la fonction qui utilise la Méthode de Simpson.  
		```python  
		def simpson(f,a,b,n):  
		h = (b-a)/ n  
			S = 0  
		for i in range(0,n,2):  
		x0 = a + i*h  
				x1 = a + (i+1)*h  
				x2 = a + (i+2)*h  
				S = S + (f(x0)+4*f(x1)+f(x2))*h/3  
		return S  
		```  
		Cette fonction est la plus complexe des 3.  
		Procédons par étape:  
		Nous posons trois points d'abscisses car cette méthode utilise une parabole passant par  l'image de 3 points de sous intervalles consécutives.  
		Nous posons d'abord ``x``, ``x1`` et ``x2``  
		Nous utilisons les même méthodes que précédemment pour trouver les valeurs de ces ``x``.(``i``, ``i+1``, ``i+2``)  
		Nous pouvons désormais appliquer les coefficients imposés par la formule de la Méthode de Simpson (1 4 1) a notre fonction. ``1*f(x0) + 4*f(x1 )+ 1*f(x2)``.  
		``x1`` est en fait une moyenne de ``x0`` et ``x2`` mais les sous-intervalles font la même taille.  
		Nous divisons ensuite ce résultat par 3 puis on multiplie le résultat par h comme précédemment.  

	2. ## PHP
		L'intégration en PHP s'effectue en deux temps, tout d'abord nous déclarons un formulaire simple en HTML avec une option pour choisir entre les 3 méthodes, ce qui déterminera quel script sera utilisé, et 3 champs destinés à entrer les valeurs de calcul (variance, écart-type et seuil limite):
		```html
		<form action="" method="post">  
			<select name="methodes" size="1">  
				<option value="rectangleGauche">Rectangle Gauche  
				<option value="trapeze">Trapèze  
				<option value="simpson">Simpson  
		 </select>  
		 <br><br> 
		 <label for="variance">Variance (m):</label>  
		 <input type="text" id="variance" name="variance"><br>  
		 <br> 
		 <label for="ecart_type">Écart-type (σ):</label>  
		 <input type="text" id="ecart_type" name="ecart_type"><br>  
		 <br> 
		 <label for="seuil">Seuil (t):</label>  
		 <input type="text" id="seuil" name="seuil"><br>  
		 <br><br> 
		 <input type="submit" name="form_proba" value="Valider">  
		</form>
		```
		La balise ``<br>`` permet de séparer les différents éléments avec des retours à la ligne
		La balise ``<select>`` permet de créer un menu pour choisir les différentes méthodes. 
		Les balises ``<label>`` et ``<input>`` permettent d'entrer les différentes valeurs qui serviront d'arguments dans le script python.

		Comme le décrivent les attributs de ``<form>``: ``action="" method="post"``, le traitement du formulaire sera directement effectué dans la même page, pour éviter une éventuelle redirection sur une page traitement.php.

		
		Passons maintenant au traitement qui s'effectue uniquement en PHP.
		Nous commençons par inscrire une condition qui vérifie que le bouton validé est pressé pour commencer le traitement: 
		``if (isset($_POST['form_proba'])) {``
		Si la variable ``$_POST`` est définie (à la validation du formulaire), alors le 	traitement peut commencer.
		Nous associons les 4 variables $_POST récupérées à l'aide de l'attribut ``name`` des différentes balises du formulaire à différents champs, qui seront réutilisés:
		```php
		$variance = $_POST["variance"];  
		$ecart_type = $_POST["ecart_type"];  
		$seuil = $_POST["seuil"];  
		$choix = $_POST["methodes"];
		```
		Ensuite, une condition sous forme de ``switch`` est utilisée avec la variable ``$choix``. En fonction de sa valeur, un script python associé au calcul choisi sera exécuté. Les arguments de ce script python seront les variables ``$variance``, ``$ecart_type`` et ``$seuil``.
		```php
        switch($choix){
            case "rectangleGauche":
                echo $probaMethodes->probaRectangleGauche($variance, $ecart_type, $seuil);
                break;
            case "trapeze":
                echo $probaMethodes->probaTrapeze($variance, $ecart_type, $seuil);
                break;
            case "simpson":
                echo $probaMethodes->probaSimpson($variance, $ecart_type, $seuil);
                break;
            default:
                die("Erreur");
            }
		```
		En cas d'erreur, le programme PHP prends fin, avec la fonction die().
		Les méthodes destinnées à exécuter les scripts python sont écrites dans une autre classe appelée probaMethodes.php, pour ainsi les réutiliser dans le cadre de tests.
		```php
		public function probaRectangleGauche($variance, $ecart_type, $seuil){
				if (empty($variance) || empty($ecart_type) || empty($seuil)) {
					return "Veuillez tous remplir les champs.";
				} else {
					$output = exec('python3 $(pwd)/probaRectangleGauche.py '.$variance." ".$ecart_type." ".$seuil);
					return $output;
				}
			}
			public function probaTrapeze($variance, $ecart_type, $seuil){
				if (empty($variance) || empty($ecart_type) || empty($seuil)) {
					return "Veuillez tous remplir les champs.";
				} else {
					$output = exec('python3 $(pwd)/probaTrapeze.py ' . $variance . " " . $ecart_type . " " . $seuil);
					return $output;
				}
			}
			public function probaSimpson($variance, $ecart_type, $seuil){
				if (empty($variance) || empty($ecart_type) || empty($seuil)) {
					return "Veuillez tous remplir les champs.";
				} else {
					$output = exec('python3 $(pwd)/probaSimpson.py ' . $variance . " " . $ecart_type . " " . $seuil);
					return $output;
				}
			}
		```
		Une condition en début de fonction permet de vérifier que les 3 champs sont bien remplis, sinon, un message d'erreur est retourné.
		Nous utilisons la fonction ``exec()`` qui va s'occuper d'effectuer la commande pour exécuter le script, et afficher son résultat brut. Pour améliorer la portabilité et éviter les erreurs en cas de changement de répertoire, nous injectons la variable $(pwd), qui permet de récupérer le répertoire automatiquement.
		Le résultat sera instantanément retourné dans une valeur ``$output``et la condition prendra fin.
	
3.  # Système d'Inscription
	1. ## Formulaire
	La structure du formulaire est simple, elle comporte deux champs caractérisés par des ``<label>`` et ``<input>``:
	```html
    <label for="champ_username">Nom d'utilisateur</label>
    <input type="text" id="champ_username" name="champ_username"/>
    <br><br>
    <label for="champ_password">Mot de passe</label>
    <input type="password" id="champ_password" name="champ_password"/>
	```
	Le type de l'username est un ``text``, tandis que le type du mot de passe est un ``password``, destiné à anonymiser son contenu.

	L'implémentation du Google reCaptcha se fait de manière simple côté formulaire, en effet, la plateforme propose un ``<div>`` à placer dans le formulaire:
	```html
	<div class="g-recaptcha" data-sitekey="6LfwIbskAAAAAPgzHTDf_cpsNPg6MSsDlqxvKU-C"></div>
	```

	Le ``data-sitekey`` est une clé générée par Google, permettant d'associer notre Captcha aux serveurs de Google à travers le site internet https://www.google.com/recaptcha/admin/.

	Une fois le formulaire validé, un traitement PHP est effectué dans la page pour afficher les erreurs retournées par le script de traitement:
	```php
	<?php
    if (isset($_GET['captchastatus']) && $_GET['captchastatus'] == 'invalide') {
        echo '<p style="color: red;">Captcha invalide.</p>';
    }
    if (isset($_GET['sqlstatus']) && $_GET['sqlstatus'] == 'invalide') {
        echo '<p style="color: red;">Erreur de connexion: ' . $_GET['error'] . '</p>';
    }
    if (isset($_GET['champ']) && $_GET['champ'] == 'invalid') {
        echo '<p style="color: red;">Veuillez remplir tout les champs.</p>';
    }
    if (isset($_GET['userfound']) && $_GET['userfound'] == 'invalide') {
        echo '<p style="color: red;">L\'utilisateur existe déjà.</p>';
    }
    if (isset($_GET['error']) && $_GET['error'] == 'invalide') {
        echo '<p style="color: red;">Erreur de connexion.</p>';
    }
    ?>
	```
	Le ``(isset($_GET['...']) && $_GET['...'] == 'invalide')`` permet de vérifier si l'attribut présent dans le premier ``$_GET`` est présent dans l'url, et si celui-ci comporte la valeur ``invalide``. Si les conditions sont réunies, alors un message d'erreur personnalisé sera affiché en dessous du bouton valider.

	2. ## Méthodes de Traitement
	L'utilisation d'une classe php contenant les méthodes permet leurs utilisation dans les tests unitaires (voir le Dossier de Tests). Les méthodes sont des conditions vérifiant la validité du formulaire et de l'utilisateur.

	La première condition permet de vérifier la validité d'un captcha:
	```php
    public function captchaValide($response){
        if (!$response->success) { // CAPTCHA invalide
            return false;
        }
        else {return true;} // CAPTCHA valide
    }
	```
	Si la réponse est invalide, nous retournons un boolean ``false``, si celle-ci est valide, nous retournons un ``true```

	La seconde condition permet de vérifier que les deux champs username et password soient remplis:
	```php
	public function champsRemplis($username, $password){
        if (empty($username) || empty($password)){ // Champ(s) vide(s)
            return false;
        }
        else {return true;} // Champs remplis
    }
	```
	Si l'un des deux champs est vide, nous retournons un false, si les deux champs sont remplis, nous retournons un true.

	La troisième condition vérifie la connexion à la base de données à l'aide de sa méthode connect_error:
	```php
	public function connexionDatabaseReussie($connexion){
        if ($connexion->connect_error) { // Erreur de connexion
            return false;
        } else {return true;} // Connexion réussie
    }
	```	
	Si la connexion retourne une erreur, la condition retourne un false, sinon, nous retournons un true.

	La quatrième et dernière condition vérifie qu'un utilisateur est inscrit en vérifiant le nombre d'entrées en base de données avec l'username fourni:
	```php
	public function utilisateurNonInscrit($state){
        if ($state->num_rows > 0) {
            return false;
        } else {return true;}
    }
	```
	Si le nombre d'entrées est supérieur à 0, nous retournons un false car l'utilisateur est déjà inscrit en base de données, sinon, nous retournons un true car l'utilisateur n'est pas déjà inscrit.

	3. ## Traitement
	Passons au traitement effectué dans un fichier ``traitement.php`` situé dans le même répertoire que le fichier ``inscription.php`` contenant le formulaire.

	Nous commençons au début par récupérer les différentes valeurs du ``POST``, à s'avoir l'username, le password ainsi que la réponse du captcha:
	```php
	$username = $_POST["champ_username"];
	$password = $_POST["champ_password"];
	$captcha = $_POST["g-recaptcha-response"];
	```

	Une fois ces valeurs récupérées, nous allons pouvoir valider l'utilisation du Google Captcha (gcaptcha) à l'aide d'un script fourni par reCAPTCHA:
	```php
	$secret = "6LfwIbskAAAAAJGF82GiiOZD6JB2HlCcqVfmrQmb";
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$data = array("secret" => $secret, "response" => $captcha);
	$options = array(
		"http" => array(
			"header" => "Content-type: application/x-www-form-urlencoded\r\n",
			"method" => "POST",
			"content" => http_build_query($data),
		),
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$response = json_decode($result);
	```

	``$secret = "6LfwIbskAAAAAJGF82GiiOZD6JB2HlCcqVfmrQmb";`` permet de vérifier la clé secrete utilisée pour la validation du Captcha.
	
	``$url = "https://www.google.com/recaptcha/api/siteverify";`` permet de définir l'URL qui redirige vers l'API de vérification du Captcha.
	
	``$data = array("secret" => $secret, "response" => $captcha);`` permet de définir un tableau contenant la clé secrète définie ultérieusement, ainsi que la réponse de la valeur du captcha, définie également ultérieurement.
	La variable 

	```php
	$options = array(
		"http" => array(
			"header" => "Content-type: application/x-www-form-urlencoded\r\n",
			"method" => "POST",
			"content" => http_build_query($data),
		),
	);
	```
	permet de définir l'entête de la requête HTTP, qui sera envoyée à l'API Google Captcha.

	``$context = stream_context_create($options)`` permet de définir le contexte du flux qui servira pour la requête HTTP.

	``$result = file_get_contents($url, false, $context);`` contient le résultat de la réponse HTTP de la requête envoyée à l'API Google Captcha.

	``$response = json_decode($result);`` contient la réponse HTTP décodée à l'aide de la méthode ``json_decode()``.

	
	Une fois la réponse récupérée, nous pouvons utiliser la condition pré-définie dans traitementMethodes.php:
	```php
	if (!$traitementMethodes->captchaValide($response)) { // Vérification: Validité du CAPTCHA
		header("Location: inscription.php?captchastatus=invalide");
		exit;
	}
	```
	Si la réponse est invalide (``== false``), nous redirigeons l'utilisateur sur le formulaire d'inscription, avec un attribut ``captchastatus=invalide``, qui sera récupéré sur la page du formulaire avec la variable ``$_GET['captchastatus']``, pour pouvoir afficher un message d'erreur associé au Captcha, comme expliqué ultérieurement.

	Si le Captcha est valide, alors nous pouvons commencer à traiter les champs du formulaire. Nous commençons par vérifier que l'un des deux champs ou les deux champs simultanés ne soient pas vides.
	```php    
    if (!$traitementMethodes->champsRemplis($username, $password)) { // Vérfication: Remplissage des deux champs
        header("Location: inscription.php?champ=invalid");
        exit;
    }
	```
	Si la méthode retourne un false, alors nous redirigeons l'utilisateur sur la page du formulaire, comme précédement, avec un attribut permettant l'affichage d'un message d'erreur spécifiant de remplir les deux champs.

	Si nous les deux champs sont remplis, alors nous pouvons commencer l'interaction avec la base de données.

	Nous commencons par filtrer les caractères constituants l'username et le password et convertir les différents caractères qui ne sont pas alphanumériques en entités html, pour éviter l'utilisation de caractères spéciaux.
	```php
	$username = htmlspecialchars($_POST["champ_username"]);
    $password = htmlspecialchars($_POST["champ_password"]);
	```

	Ensuite, nous déclarons les variables contenant les informations de connexion à la base de données mariaDB, hébergée sur le même système que l'application web.
	```php
	$DB_HOSTNAME = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "@root123";
    $DB_NAME = "PLANETCALCULATOR";
	```

	Les identifiants sont déclarés, nous pouvons effectuer la connexion avec la méthode ``mysqli_connect()``:
	``$connexion = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);``

	En cas d'erreur, nous redirigeons l'utilisateur sur le formulaire avec le code d'erreur associée à la connexion:
	```php
    if (!$traitementMethodes->connexionDatabaseReussie($connexion)) { // Vérification: Connexion échouée
        header("Location: formulaire.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
        exit;
    }
	```
	La méthode urlencode() permet d'encoder les caractères spéciaux et de pouvoir faire passer l'entièreté du message d'erreur en attribut, pour ainsi l'afficher sur le formulaire.

	La condition suivante ``if ($state = $connexion->prepare("INSERT INTO User (username, password) VALUES (?, ?)")) {`` permet de vérifier qu'un nom d'utilisateur similaire n'existe pas déjà en base de données en préparant la requête SQL associée, à l'aide de la méthode ``prepare()``.
	Le point d'interrogation (?) est un paramètre qui sera remplacé par la méthode ``bind_param()``:
	```php
	$state->bind_param("s", $username);
	$state->execute();
	$state->store_result();
	```
	Nous remplaçons le paramètre par l'username entré dans le champ et nous exécutons la requête avant de stocker son résultat dans la variable ``$state``
	Une simple condition permettant de vérifier le nombre de colonnes dans la réponse permet de vérifier si l'utilisateur existe déjà en base de données. Si la réponse est vide, alors l'username est disponible pour la création et nous redirigons également l'utilisateur sur le formulaire:
	```php
	if (!$traitementMethodes->utilisateurNonInscrit($state)) {
		header("Location: inscription.php?userfound=invalide");
		exit;
	}
	```

	Si l'utilisateur n'existe pas en base de données, alors nous pouvons finalement l'insérer à l'aide de la même condition de préparation utilisée ultérieurement:
	```php
	if ($state = $connexion->prepare("INSERT INTO User (username, password) VALUES (?, ?)")) {
	```
	Cette requête va insérer l'username et le password, sous forme de paramètres, dans la table User.
	Si cette condition est validée, nous allons pouvoir hasher le mot de passe avec la fonction ``password_hash()``, qui utilise un algorithme bcrypt:
	```php
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	```

	Une fois le mot de passe hashé, nous pouvons le définir en paramètre avec l'username, et exécuter la requête:
	```php
	$state->bind_param("ss", $username, $password);
    $state->execute();
    $state->close();
	```

	Une fois les valeurs consignés dans la base de données et par conséquent, l'utilisateur inscrit, nous pouvons rediriger l'utilisateur sur la page de connexion, avec un message d'inscription réussie, à l'aide d'un attribut:
	```php
	header("Location: ../connexion/connexion.php?registrationstatus=valide&uname=".urlencode($username));
    exit;
	```

	En cas d'erreur lors du traitement de la requête, nous redirigons l'utilisateur sur la page du formulaire:
	```php
    } else {
    	header("Location: inscription.php?error=invalide");
        exit;
    }
	```

4.  # Système de Connexion
	Ce système de connexion reprend de nombreux éléments du système d'inscription précédement documenté.
	
	1. ## Formulaire
	La structure du formulaire est similaire au système d'inscription, nous réutilisons le même Captcha auparavant utilisé:
	```html
	<label for="champ_username">Nom d'utilisateur</label>
	<input type="text" id="champ_username" name="champ_username" required pattern="[A-Za-z0-9]+" title="Le nom d'utilisateur ne peut contenir que des lettres et chiffres"/>
	<br><br>
	<label for="champ_password">Mot de passe</label>
	<input type="password" id="champ_password" name="champ_password" required pattern="[A-Za-z0-9!@#$%^&*()_+=-]{8,}" title="Le mot de passe doit contenir au moins 8 caractères"/>
	<br><br><br>
	<div class="g-recaptcha" data-sitekey="6LfwIbskAAAAAPgzHTDf_cpsNPg6MSsDlqxvKU-C"></div>
	<input type="submit" name="form_connexion" value="Valider">
	```
	
	De légères modifications sont appliquées à la structure PHP qui permet de retourner les différentes erreurs de traitement:
	```php
	if (isset($_GET['registrationstatus']) && $_GET['registrationstatus'] == 'valide') {
		echo '<p style="color: green;">Utilisateur inscrit: ' . $_GET['uname'] . '</p>';
	}
	if (isset($_GET['captchastatus']) && $_GET['captchastatus'] == 'invalide') {
		echo '<p style="color: red;">Captcha invalide.</p>';
	}
	if (isset($_GET['sqlstatus']) && $_GET['sqlstatus'] == 'invalide') {
		echo '<p style="color: red;">Erreur de connexion: ' . $_GET['error'] . '</p>';
	}
	if (isset($_GET['champ']) && $_GET['champ'] == 'invalid') {
		echo '<p style="color: red;">Veuillez remplir tout les champs.</p>';
	}
	if (isset($_GET['userfound']) && $_GET['userfound'] == 'valid') {
		echo '<p style="color: red;">Utilisateur inconnu.</p>';
	}
	if (isset($_GET['password']) && $_GET['password'] == 'invalid') {
		echo '<p style="color: red;">Mot de passe invalide.</p>';
	}
	```
	En effet, l'ajout de la condition ``isset($_GET['registrationstatus']) && $_GET['registrationstatus'] == 'valide'`` permet d'afficher le message de confirmation d'inscription retourné par le traitement du formulaire d'inscription. Ce message contient le nom de l'utilisateur inscrit, stocké dans la variable ``$_GET['uname']`` et est affiché en vert de la manière suivante ``echo '<p style="color: green;">Utilisateur inscrit: ' . $_GET['uname'] . '</p>';``.


	2. ## Traitement
	La première partie du script de traitement est similaire au traitement d'une inscription, nous vérifions la validité du Captcha, le remplissage des Champs ainsi que la connexion en Base de Données:
	```php
	$username = $_POST["champ_username"];
	$password = $_POST["champ_password"];
	$captcha = $_POST["g-recaptcha-response"];
	require_once 'traitementMethodes.php';
	$traitementMethodes = new traitementMethodes();

	// Vérification du CAPTCHA
	$secret = "6LfwIbskAAAAAJGF82GiiOZD6JB2HlCcqVfmrQmb";
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$data = array("secret" => $secret, "response" => $captcha);
	$options = array(
		"http" => array(
			"header" => "Content-type: application/x-www-form-urlencoded\r\n",
			"method" => "POST",
			"content" => http_build_query($data),
		),
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$response = json_decode($result);

	if (!$traitementMethodes->captchaValide($response)) { // Vérification: Validité du CAPTCHA
		header("Location: connexion.php?captchastatus=invalide");
		exit;
	} else {
		if (!$traitementMethodes->champsRemplis($username, $password)) { // Vérfication: Remplissage des deux champs
			header("Location: connexion.php?champ=invalid");
			exit;
		}
		$DB_HOSTNAME = "localhost";
		$DB_USERNAME = "root";
		$DB_PASSWORD = "@root123";
		$DB_NAME = "PLANETCALCULATOR";
		$connexion = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
		if (!$traitementMethodes->connexionDatabaseReussie($connexion)) { // Vérification: Connexion échouée
			header("Location: connexion.php?error=" . urlencode($connexion->connect_error) . "&sqlstatus=invalide");
			exit;
		} 
	```
	Le fonctionnement de ses lignes est décrit dans la partie "Système d'Inscription" de la documentation.

	La condition suivante, située dans traitementMethodes.php (connexion) permet de vérifier que l'utilisateur soit déjà inscrit en base de données:
	```php
	public function utilisateurInscrit($state){
        if ($state->num_rows == 1) {
            return true;
        } else {return false;}
    }
	```
	Si lors de la requête le nombre de colonnes retournées est égale à 1, alors cela signifie qu'un utilisateur correspondant à l'username de la requête est trouvé en base, l'utilisateur est donc inscrit, nous retournons un ``true``.
	
	Cette condition est ensuite vérifiée suite à l'exécution de la requête php dans traitement.php:
	```php
	if ($state = $connexion->prepare("SELECT id_user, password FROM User WHERE username = ?")) {
		$state->bind_param("s", $username);
		$state->execute();
		$state->store_result();
		if (!$traitementMethodes->utilisateurInscrit($state)) {
		header("Location: connexion.php?userfound=valid");
		exit;
	}
	```
	Si l'utilisateur n'est pas inscrit, une redirection vers la page de connexion est faite, avec un attribut ``userfound=valid`` qui permet de retourner un message d'erreur 'Utilisateur inconnu'.

	Dans le cas contraire (voulu), si l'utilisateur correspond en base de données, alors nous allons pouvoir associer son id_user et son mot de passé hashé à deux valeurs ``$id_user`` et ``$hash``:
	```php
	$state->bind_result($id_user, $hash); // Association de la colonne aux valeurs
	$state->fetch();
	```
	La méthode ``fetch()`` permet de récupérer les résultats de la requête dans la variable ``$state``.

	Une fois les deux mots de passes, un hashé (``$hash``) et un en clair (``$password``), insérés dans deux variables, nous pouvons les vérifier à l'aide de la méthode ``password_verify()``, qui compare une version hashée du mot de passe en clair (``$password``), avec le hash stocké dans ``$hash``:
	```php
	if(password_verify($password, $hash)){
		session_start();
		$_SESSION["id_user"] = $username;
		header("Location: ../../utilisateur_inscrit/accueilUser/accueilUser.php");
		exit;
	}
	```
	Si les mots de passe correspondent, alors nous pouvons effectuer la connexion de l'utilisateur en associant une variable ``$_SESSION`` contenant l'id_user, à son utilisateur.
	La variable de session est la plus importante du système de connexion car elle permet l'identification de l'utilisateur.
	La méthode ``session_start()``permet de démarrer une session, ce qui est primordial pour attribuer ou accèder à des variables de session.


	3. ## Session
	Le fichier ``session.php`` sera appelé en début de toutes les pages qui ne sont pas visitées par l'utilisateur. Celui-ci contient un script vérifiant à l'exécution d'une page si la variable de session (``$_SESSION``) est bien définie. Si celle-ci est définie, l'utilisateur peut continuer de naviguer sur la page actuelle, si elle n'est pas définie, l'utilisateur sera redirigé vers la page d'accueil pour visiteurs:
	```php
	session_start();
	if (empty($_SESSION["id_user"])) {
		header("Location: ../../visiteur/pageBienvenue/pageBienvenue.php");
		exit;
	}
	```

	4. ## Profil
	La formulaire de la page profil ne sera pas traité car celui-ci est le même que la page de connexion, sans le captcha.
	Le début et les conditions du script de traitement de profil est similaire au script de traitement de la connexion. Le changement s'effectue au niveau de l'insertion des valeurs en base de données. 
	La requête suivante permet de récolter l'id_user associé au nom d'utilisateur présent dans la variable session:
	```php
	if ($state = $connexion->prepare("SELECT id_user, password FROM User WHERE username = ?")) {
        $state->bind_param("s",$_SESSION["id_user"]);
        $state->execute();
        $state->store_result();
        $state->bind_result($id_user); // Association de la colonne aux valeurs
        $state->fetch();
	```

	La condition suivante prépare la requête permettant de définir un nouvel identifiant / mot de passe à l'aide de l'identifiant user (``$id_user``) récolté précédemment: ``if($state = $connexion->prepare("UPDATE User SET username = ?, password = ? WHERE id_user = ?")){``
	Une fois la condition validée, mettre dans une variable le hash du nouveau mot de passe rentré par l'utilisateur: ``$newPassword = password_hash($password, PASSWORD_DEFAULT);``

	Une fois le nouveau mot de passe hashé, nous pouvons associer les différentes valeurs au paramètres de la requête, et exécuter celle-ci:
	```php
	$state->bind_param("ssi", $username, $newPassword, $id_user);
	$state->execute();
	```
	Le paramètre ``"ssi"`` signifie que les valeurs insérées dans la requête sont des ``string`` (texte), ``string`` (texte) et ``integer`` (nombre).

	L'ancien username stocké dans la variable session est remplacé par le nouvel username: ``$_SESSION["id_user"] = $username;``
    L'utilisateur est ensuite redirigé sur la page de profil avec un message de réussite à l'aide de l'attribut ``status=success``:
	```php
	header("Location: profil.php?status=success");
    exit;
	```