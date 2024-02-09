# Recueil des Besoins
**Saé, Semestre 3, Année 2022-2023**
**IUT de Vélizy**,
*Adel Hammiche, Yanis Bouchaib, Paul Montagnac, Esteban Pagis*
  
# Sommaire:
1. Objectif et portée
2. Terminologie employée / glossaire
3. Les cas d’utilisations
4. La technologie employée
5. Autres Exigences
6. Objectif et portée
 ---
 1. # Chapitre 1: Objectif et portée
	1.  ## Quels sont la portée et les objectifs généraux ?
		L’objectif de cette annexe est déterminer les différents besoins (attentes) à fournir concernant le développement de l'application web ainsi que de sa base de données.

		La portée est située au sein de l’IUT. Des utilisateurs internes à l’IUT pourront utiliser l’application Web, qui sera hébergé sur un système présent à l’IUT

	2.  ## Les intervenants. (Qui est concerné ?)
		Le projet est développé par l'équipe d'étudiants du BUT2 *(Yanis Bouchaib, Adel Hammiche, Esteban Pagis, Paul Montagnac)*. 
		Elle sera livrée aux clients du projet: l’équipe pédagogique du BUT2 *(Isabelle Robba, Thomas Dufaud, Fabrice Hoguin)*.

	3.  ## Qu’est-ce qui entre dans cette portée ? Qu’est-ce qui est en dehors ? (Les limites du système.)
	    La **maquette** pourra être exécuté en local. Étant donné que nous somme dans une version préliminaire destinée à projeter les attentes graphiques du client, nous n'utilisons pas le encore le système sur lequel sera exécuté le projet (voir cahier des charges projet).
		La **base de données** sera hébergée sur le Raspberry Pi, sa portée sera l'IUT et l'ordinateur de l'utilisateur (son utilisation étant possible via SSH).


2.  # Chapitre 2: Terminologie employée / Glossaire
- <u>Maquette graphique</u>: Produit uniquement graphique, sans code / possibilité d'interaction avec l’utilisateur.
- <u>Maquette web</u>: Implémentation web de la maquette graphique en HTML / CSS, destinée à tester les relations entre les pages.
- <u>Visiteur</u>: Utilisateur Non-Inscrit / Non connecté
- <u>Module</u>: Partie de l'application (sous forme de page web) destinée à effectuer une simulation.
    
3.  # Chapitre 3: Les cas d’utilisation
	1.  ## Les acteurs principaux et leurs objectifs généraux.
		1. **Maquette:**
	    Dans le cadre de cette maquette, les acteurs principaux et uniques seront les clients. Leurs objectifs seront d’essayer les différentes intéractions entre les 	pages et de nous fournir un retour concernant la charte graphique.
		# ![](Assets/casUtilisation_Maquette.jpg)
		*Diagramme des cas d’utilisations* 

		Nous avons répertorié dans ce diagramme de cas d’utilisations (utilisé dans le recueil des besoins) les différentes actions que l’utilisateur pourra effectuer sur la maquette, en fonction de son groupe (Gestionnaire, Utilisateur Inscrit ou Visiteur):
		
		---
		2. **Base de Données**:
		Les acteurs sont les mêmes que pour la maquette, nous aurons un visiteur, un utilisateur inscrit ainsi qu'un gestionnaire. Ces distinctions effectuées au sein de la base de données permettra de gérer les différents accès aux pages, en fonction du rôle de l'utilisateur.
		# ![](Assets/casUtilisation_BD.jpg)
		*Diagramme des cas d’utilisations* 
		
		Nous avons répertorié dans ce diagramme de cas d’utilisations les différentes actions que l’utilisateur pourra effectuer en interaction avec la base de données.
		
		---
		3. **Module Probabilités**:
		Lors de l'utilisation du module de probabilités, l'acteur principal sera l'utilisateur inscrit. 
		L'objectifs de ces tests est de valider le fonctionnement du module ainsi que la conformité des résultats attendus.
		# ![](Assets/casUtilisation_Probas.jpg)
		*Diagramme des cas d’utilisations* 
		
		Nous avons répertorié dans ce diagramme de cas d’utilisations les différentes actions que l’utilisateur pourra effectuer en interaction avec le module de probabilités
		
		---
		4. **Système d'Inscription**:
			Les deux acteurs principaux dans ces cas d'utilisations seront l'utilisateur non-inscrit (visiteur) et l'utilisateur inscrit
			L'objectifs de ces tests est de valider le fonctionnement du module ainsi que la conformité des résultats attendus.
			# ![](Assets/casUtilisation_Inscription.jpg)
			*Diagramme des cas d’utilisations* 
			
			Nous avons répertorié dans ce diagramme de cas d’utilisations les différentes actions que l’utilisateur pourra effectuer en interaction avec le système d'inscription
	2.  ## Scénarios
		1. ### Maquette
			#### Accéder à la page de gestion
			<u>Cas d’utilisation</u>: Accéder à la Page de Gestion
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page de gestion
			<u>Acteur</u>: Gestionnaire
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L’utilisateur a accès à la maquette web, disponible sur le dépôt git
			<u>En cas de succès</u>: 
			- Le gestionnaire est redirigé, la page de gestion s’affiche

			<u>En cas d’échec</u>: 
			- Le gestionnaire n'accède pas à la page de gestion, une erreur est retournée

			<u>Scénario:</u>
			1.  Utilisateur: Clique sur un bouton le redirigeant vers la page de gestion
			2.  Système: Redirige l’utilisateur en affichant la page de gestion
			---
			#### Accéder à la page d’accueil
			<u>Cas d’utilisation</u>: Accéder à la Page d’Accueil
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page d’accueil
			<u>Acteur</u>: Gestionnaire, ou Utilisateur Inscrit
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L’utilisateur a accès à la maquette web, disponible sur le dépôt git
			<u>En cas de succès</u>: 
			- La page d’accueil se charge intégralement

			<u>En cas d’échec</u>: 
			- La page d’accueil ne s’affiche pas, une erreur est retournée

			<u>Scénario</u>:
			1.  Utilisateur: Démarre la maquette web, sous le profil gestionnaire ou utilisateur inscrit
			2.  Système: Affiche la page d’accueil
			---
			#### Accéder à la page profil
			<u>Cas d’utilisation</u>: Accéder à la Page Profil
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page profil
			<u>Acteur</u>: Gestionnaire, ou Utilisateur Inscrit
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: 
			- L’utilisateur a accès à la maquette web, disponible sur le dépôt git
			- L’utilisateur est situé dans la page d’accueil Utilisateur

			<u>En cas de succès</u>:
			- L’utilisateur est redirigé sur la page de profil

			<u>En cas d’échec</u>:
			- La page de profil ne s’affiche pas, une erreur est retournée

			<u>Scénario</u>:
			1.  Utilisateur: Clique sur le bouton Profil
			2.  Système: Redirige l’utilisateur sur la page Profil
			---
			#### Accéder à la page de connexion
			<u>Cas d’utilisation</u>: Accéder à la Page de Connexion
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page de connexion
			<u>Acteur</u>: Visiteur
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: 
			- L’utilisateur a accès à la maquette web, disponible sur le dépôt git 
			- L’utilisateur est situé dans la page de bienvenue

			<u>En cas de succès</u>:
			- L’utilisateur est redirigé sur la page de connexion

			<u>En cas d’échec</u>:
			- La page de connexion ne s’affiche pas, une erreur est retournée

			<u>Scénario</u>
			1.  Utilisateur: Clique sur le bouton “Connexion”
			2.  Système: Redirige l’utilisateur sur la page Profil
			---
			#### Accéder à la page d’inscription
			<u>Cas d’utilisation</u>: Accéder à la Page d’Inscription
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page d’inscription
			<u>Acteur</u>: Visiteur
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>:
			- L’utilisateur a accès à la maquette web, disponible sur le dépôt git
			- L’utilisateur est sur la page d’accueil visiteur

			<u>En cas de succès</u>:
			- L’utilisateur est redirigé sur la page d’inscription

			<u>En cas d’échec</u>:
			- La page d’inscription ne s’affiche pas, une erreur est retournée

			<u>Scénario</u>:
			1.  Utilisateur: Clique sur le bouton Inscription
			2.  Système: Redirige l’utilisateur sur la page d’Inscription
			---
			#### Accéder à la page de bienvenue
			<u>Cas d’utilisation</u>: Accéder à la Page de Bienvenue
			<u>Contexte</u>: L’utilisateur souhaite accéder à la page de bienvenue
			<u>Acteur</u>: Visiteur
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L’utilisateur a accès à la maquette web, disponible sur le dépôt git
			<u>En cas de succès</u>: 
			- La page de bienvenue s’affiche

			<u>En cas d’échec</u>:
			- La page de bienvenue ne s’affiche pas, une erreur est retournée

			<u>Scénario</u>:
			1.  Utilisateur: Démarre la maquette web, sous le profil visiteur
			2.  Système: Affiche la page de bienvenue
		---

		2. ### Base de Données
			#### Enregistrer un utilisateur
			<u>Cas d’utilisation</u>: Enregistrer un utilisateur
			<u>Contexte</u>: L'utilisateur soumet le formulaire d'inscription contenant les informations qu'il a rentré. 
			<u>Acteur</u>: Utilisateur (Visiteur)
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur rempli les deux cases du formulaire d'inscription (nom d'utilisateur, mot de passe) et valide le captcha
			<u>En cas de succès</u>: 
			- La base de données enregistre le nom d'utilisateur dans le champ username
			- La base de données crypte et enregistre le mot de passe dans le champ password
			- L'utilisateur est inscrit, un message confirmant la procédure est affiché

			<u>En cas d’échec</u>: 
			- La base de données n'enregistre pas les données
			- Un message d'erreur est retourné

			<u>Scénario:</u>
			1. Utilisateur: Rempli le formulaire d'inscription, valide le captcha
			2. Utilisateur: Clique sur le bouton soumettre (valider) 
			3. Système: Consigne les deux valeurs entrées dans la base de données
			4. Système: Retourne un message de confirmation d'inscription
		---
		3. ### Module Probabilités
			#### Utiliser la méthode Rectangles "gauches"
			<u>Cas d’utilisation</u>: Utiliser la méthode Rectangles "gauches"
			<u>Contexte</u>: L'utilisateur accède au module de probabilités, il possède le choix entre plusieurs méthodes de calculs de probabilité
			<u>Acteur</u>: Utilisateur (Inscrit)
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L'utilisateur est connecté à son compte
			<u>En cas de succès</u>: 
			- Le module affiche le résultat exact de la probabilité

			<u>En cas d’échec</u>: 
			- Le module ne retourne pas le resultat exact
				ou
			- Le module retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Sélectionne la méthode de calcul Rectangle "gauches"
			2. Utilisateur: Rentre les valeurs souhaitées dans le module
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Effectue le calcul au travers du script python
			5. Système: Retourne la probabilité calculée
			---
			#### Utiliser la méthode Rectangles "droits"
			<u>Cas d’utilisation</u>: Utiliser la méthode Rectangles "droits"
			<u>Contexte</u>: L'utilisateur accède au module de probabilités, il possède le choix entre plusieurs méthodes de calculs de probabilité
			<u>Acteur</u>: Utilisateur (Inscrit)
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L'utilisateur est connecté à son compte
			<u>En cas de succès</u>: 
			- Le module affiche le résultat exact de la probabilité

			<u>En cas d’échec</u>: 
			- Le module ne retourne pas le resultat exact
				ou
			- Le module retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Sélectionne la méthode de calcul Rectangle "droits"
			2. Utilisateur: Rentre les valeurs souhaitées dans le module
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Effectue le calcul au travers du script python
			5. Système: Retourne la probabilité calculée
			---
			#### Utiliser la méthode Rectangles "médians"
			<u>Cas d’utilisation</u>: Utiliser la méthode Rectangles "médians"
			<u>Contexte</u>: L'utilisateur accède au module de probabilités, il possède le choix entre plusieurs méthodes de calculs de probabilité
			<u>Acteur</u>: Utilisateur (Inscrit)
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L'utilisateur est connecté à son compte
			<u>En cas de succès</u>: 
			- Le module affiche le résultat exact de la probabilité

			<u>En cas d’échec</u>: 
			- Le module ne retourne pas le resultat exact
				ou
			- Le module retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Sélectionne la méthode de calcul Rectangle "médians"
			2. Utilisateur: Rentre les valeurs souhaitées dans le module
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Effectue le calcul au travers du script python
			5. Système: Retourne la probabilité calculée
			---
			#### Utiliser la méthode des trapèzes
			<u>Cas d’utilisation</u>: Utiliser la méthode des trapèzes
			<u>Contexte</u>: L'utilisateur accède au module de probabilités, il possède le choix entre plusieurs méthodes de calculs de probabilité
			<u>Acteur</u>: Utilisateur (Inscrit)
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L'utilisateur est connecté à son compte
			<u>En cas de succès</u>: 
			- Le module affiche le résultat exact de la probabilité

			<u>En cas d’échec</u>: 
			- Le module ne retourne pas le resultat exact
				ou
			- Le module retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Sélectionne la méthode de calcul des trapèzes
			2. Utilisateur: Rentre les valeurs souhaitées dans le module
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Effectue le calcul au travers du script python
			5. Système: Retourne la probabilité calculée
			---
			#### Utiliser la méthode de Simpson
			<u>Cas d’utilisation</u>: Utiliser la méthode de Simpson
			<u>Contexte</u>: L'utilisateur accède au module de probabilités, il possède le choix entre plusieurs méthodes de calculs de probabilité
			<u>Acteur</u>: Utilisateur (Inscrit)
			<u>Niveau</u>: Utilisateur
			<u>Pré-condition</u>: L'utilisateur est connecté à son compte
			<u>En cas de succès</u>: 
			- Le module affiche le résultat exact de la probabilité

			<u>En cas d’échec</u>: 
			- Le module ne retourne pas le resultat exact
				ou
			- Le module retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Sélectionne la méthode de calcul de Simpson
			2. Utilisateur: Rentre les valeurs souhaitées dans le module
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Effectue le calcul au travers du script python
			5. Système: Retourne la probabilité calculée
			---
		4. ### Système d'inscription
			#### Validation du Captcha
			<u>Cas d’utilisation</u>: Validation du Captcha
			<u>Contexte</u>: Le visiteur est sur la page d'accueil pour visiteur, il clique sur le bouton Inscription
			<u>Acteur</u>: Visiteur (Utilisateur Non-Inscrit)
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: Le visiteur a accès à l'application web
			<u>En cas de succès</u>: 
			- Le CAPTCHA est validé

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Complète le Captcha
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Vérifie la validité du CAPTCHA
			---
			#### Les champs sont remplis
			<u>Cas d’utilisation</u>: Les champs sont remplis
			<u>Contexte</u>: Le visiteur est sur la page d'accueil pour visiteur, il clique sur le bouton Inscription
			<u>Acteur</u>: Visiteur (Utilisateur Non-Inscrit)
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: Le visiteur a accès à l'application web
			<u>En cas de succès</u>: 
			- Le système vérifie le formulaire

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Clique sur le bouton soumettre (valider) 
			3. Système: Exécute le script de traitement
			---
			#### Connexion à la base de données
			<u>Cas d’utilisation</u>: Connexion à la base de données
			<u>Contexte</u>: Le visiteur est sur la page d'inscription, il soumet le formulaire d'inscription
			<u>Acteur</u>: Système
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: Le visiteur a accès à l'application web et a soumis le formulaire d'inscription
			<u>En cas de succès</u>: 
			- Le système est connecté à la base de données
			- Le système continue le traitement du formulaire

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Valide le CAPTCHA
			3. Utilisateur: Soumet le formulaire
			3. Système: Exécute les vérifications
			4. Système: Se connecte à la base de données
			---
			#### L'utilisateur n'est pas déjà inscrit
			<u>Cas d’utilisation</u>: L'utilisateur n'est pas déjà inscrit
			<u>Contexte</u>: Le visiteur est sur la page d'inscription, il soumet le formulaire d'inscription
			<u>Acteur</u>: Visiteur (Utilisateur Non-Inscrit)
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: Le visiteur a accès à l'application web, il soumet le formulaire d'inscription
			<u>En cas de succès</u>: 
			- Le système inscrit l'utilisateur en base de données

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Valide le CAPTCHA
			3. Utilisateur: Soumet le formulaire
			3. Système: Exécute les vérifications
			4. Système: Se connecte à la base de données
			5. Système: Vérifie la présence de l'username en base de données
			---
		5. ### Système de connexion
			#### Validation du Captcha
			<u>Cas d’utilisation</u>: Validation du Captcha
			<u>Contexte</u>: L'utilisateur est sur la page d'accueil pour visiteur, il clique sur le bouton Connexion
			<u>Acteur</u>: Utilisateur Inscrit
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur a accès à l'application web
			<u>En cas de succès</u>: 
			- Le CAPTCHA est validé

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Complète le Captcha
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Vérifie la validité du CAPTCHA
			---
			#### Les champs sont remplis
			<u>Cas d’utilisation</u>: Les champs sont remplis
			<u>Contexte</u>: L'utilisateur est sur la page d'accueil pour visiteur, il clique sur le bouton Connexion
			<u>Acteur</u>: Utilisateur Inscrit
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur a accès à l'application web
			<u>En cas de succès</u>: 
			- Le système vérifie le formulaire

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Clique sur le bouton soumettre (valider) 
			3. Système: Exécute le script de traitement
			---
			#### Connexion à la base de données
			<u>Cas d’utilisation</u>: Connexion à la base de données
			<u>Contexte</u>: L'utilisateur est sur la page d'inscription, il soumet le formulaire de connexion
			<u>Acteur</u>: Système
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur a accès à l'application web et a soumis le formulaire de connexion
			<u>En cas de succès</u>: 
			- Le système est connecté à la base de données
			- Le système continue le traitement du formulaire

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Valide le CAPTCHA
			3. Utilisateur: Soumet le formulaire
			3. Système: Exécute les vérifications
			4. Système: Se connecte à la base de données
			---
			#### Utilisateur inscrit en base de données
			<u>Cas d’utilisation</u>: Utilisateur inscrit en base de données
			<u>Contexte</u>: L'utilisateur est sur la page d'inscription, il soumet le formulaire de connexion
			<u>Acteur</u>: Système
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur a accès à l'application web et a soumis le formulaire de connexion
			<u>En cas de succès</u>: 
			- Le système est connecté à la base de données
			- Le système continue le traitement du formulaire

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Valide le CAPTCHA
			3. Utilisateur: Soumet le formulaire
			3. Système: Exécute les vérifications
			4. Système: Vérifie si l'utilisateur existe en base de données
			---
		6. ### Gestionnaire
			#### Validation du Captcha
			<u>Cas d’utilisation</u>: Validation du Captcha
			<u>Contexte</u>: L'utilisateur est sur la page d'accueil pour visiteur, il clique sur le bouton Connexion
			<u>Acteur</u>: Utilisateur Inscrit
			<u>Niveau</u>: Sous-Fonction
			<u>Pré-condition</u>: L'utilisateur a accès à l'application web
			<u>En cas de succès</u>: 
			- Le CAPTCHA est validé

			<u>En cas d’échec</u>: 
			- Le système retourne un message d'erreur

			<u>Scénario:</u>
			1. Utilisateur: Rentre les valeurs dans les différents champs
			2. Utilisateur: Complète le Captcha
			3. Utilisateur: Clique sur le bouton soumettre (valider) 
			4. Système: Vérifie la validité du CAPTCHA
			---

4.  # Chapitre 4: La technologie employée
	1.  ## Quelles sont les exigences technologiques pour ce système ?
		Les technologies utilisées pour la mise en place de la maquette web sont **HTML & CSS**. Nous n'utilisons pas de technologies avancées comme PHP ou MySQL car nous ne présenterons pas de fonctions applicatives (simulations, connexion…)

		Pour réaliser la base de données, nous utiliserons MySQL. PHP sera également utilisé pour l'intéraction entre la base de données et l'application web. Nous aurons également besoin du Raspberry Pi pour héberger la base de données, ainsi que l'application web.

	2.  ## Avec quels systèmes ce système s’interfacera-t-il et avec quelles exigences ?
		Ce système s'interfacera en local sur un système pouvant exécuter Linux (PC, Raspberry Pi…).

5. # Chapitre 5: Autres Exigences
	1. ## Processus de développement
		1. ### Qui sont les participants au projet ?
			L'équipe de développement (fournisseurs) du projet sont <u>le groupe d'étudiants du BUT2</u>, composé de:
			- Adel Hammiche
			- Yanis Bouchaib
			- Paul Montagnac
			- Esteban Pagis
			
			Les clients au projet sont <u>l'équipe pédagogique du BUT2</u>, composée de:
			- Thomas Dufaud
			- Fabrice Hoguin
			- Isabelle Robba
		
		2. ### Quelles valeurs devront être privilégiées ?
			La **rapidité** sera privilégiée du au fonctionnement du projet par cycles de 2 semaines, et au rythme d'alternance (1 semaine cours / 1 semaine entreprise).
			La **souplesse** sera également privilégiée pour travailler sur les différents domaines entourant cette SAé (SQL, PHP, Gestion de Projet, Analyse...).

		3. ### Quels retours ou quelle visibilité sur le projet les utilisateurs et commanditaires  souhaitent-ils ?
			Les clients (commanditaires) du projet souhaitent une incrémentation des différentes annexes du projet sous forme de livrable, à la fin de chaque cycle. 
			Ces livrables seront modifiés sur le dépôt du projet, sur la plateforme GitLab.
			Dans le cas de certains objectifs du projet, un rapport annexe sera à rendre, par exemple:
			- Rapport décrivant l'organisation du projet
			- Rapport d'implémentation du module probabilités
			...

		4. ### Que peut-on acheter ? Que doit-on construire ? Qui sont nos concurrents ?
			Le matériel nécessaire pour la réalisation de ce projet (Serveur Web) est mis à disposition par l'IUT de Vélizy. Nous ne sommes pas en concurrence mais le projet est également réalisé par différents autres groupes.

		5. ### Quels sont les autres exigences du processus ? (exemple : tests, installation, etc...)
			Les autres exigences du processus sont de documenter l'installation du Serveur Web, ainsi que documenter l'organisation du projet (WBS, Gantt...). 
			Nous devrons également réaliser des tests que nous incrémenterons au dossier de tests à chaque fin de cycle.
			Également, à la fin de chaque cycle, l'équipe doit incrémenter les autres annexes qui sont:
			 - Cahier des Charges
			 - Recueil des Besoins (document actuel)
			 - Dossier de Conception
			 - Dossier de Spécification
			 - Code et Documentation
			 - Dossier de Maintenance

		6. ### À quelle dépendance le projet est-il soumis ?


	2. ## Règles métier
	3. ## Performances
	4.  ## Opérations, sécurité, documentation
La priorité en terme de sécurité est de sécuriser le serveur web (Raspberry Pi), en utilisant les recommandations du RGPD (voir Chapitre 6).
	5.  ## Utilisation et portabilité
	6.  ## Questions non résolues ou reportées à plus tard


6. # Chapitre 6: Recours humain, questions juridiques, politiques, organisationnelles
	1. ## Quel est le recours humain au fonctionnement du système ?
	2. ##  Quelles sont les exigences juridiques et politiques ?
		Les différentes exigences concernent le **Règlement Général sur la Protection des Données (RGPD)**. La synthèse suivante concerne les différentes mesures prises par rapport à un document qui présente les différentes mesures RGPD à appliquer en tant que développeur (https://lincnil.github.io/Guide-RGPD-du-developpeur/):
		
		Nous commençons par la **Fiche 0** qui nous apprend que nous devons développer l’application web en accord avec le RGPD, nous allons également cartographier les données nécessaires qui seront utilisées pour le bon fonctionnement de l’application. 
		Au développement des fonctionnalités nous spécifions la conformité au RGPD dans la documentation du code (détailler par exemple pourquoi nous utilisons un nom d’utilisateur plutôt qu’un nom/prénom dans les données de notre base de données, dans le dossier de spécification).

		Dans la **Fiche 1**, nous remarquons l’importance d’identifier les données à caractère personnel et d’utiliser la pseudonymisation du nom et prénom de l’utilisateur, que nous transformerons en username pour éviter la fuite de ces données en cas d’une attaque malfaisante. 

		La **Fiche 2** nous permet de définir une architecture à minimisation de données dans le projet. Seules les données essentielles seront utilisées. 
		Un environnement de développement sécurisé (WebStorm) sera utilisé par tous les membres de l’équipe avec un accès au versionnage GitLab.

		L’importance des clés SSH est au cœur du versionnage du code comme décrit dans la **Fiche 3**. Des clés SSH sont mises en place pour cloner et modifier le répertoire GitLab à distance (terminal). 
		La double authentification par mail, numéro de téléphone ou application d’authentification (comme “Authy”) sera également activée pour se connecter à son compte GitLab.

		Concernant le code source, aucune donnée personnelle telle qu’un nom d’utilisateur ou mot de passe ne sera visible, comme inscrit dans la **Fiche 4**. Les données seront uniquement accessibles sur la base de données pour éviter de potentielles fuites en cas d’accès indésirable au code source hébergé sur le Raspberry Pi ainsi que sur le GitLab.

		Le parcours des données s’effectuera de l’ordinateur du client, qui inscrira ses données transférées ensuite sur la base de données (hébergée sur le Raspberry Pi) par une requête SQL en PHP. L’utilisation de cookies sera discutée par l’équipe plus tard dans le projet. (**Fiche 5**)

		L’utilisation obligatoire du TLS version 1.2 ou 1.3 (mise en place compliquée car besoin de certificats auto-signés, car le projet est hébergé par nous-mêmes) ainsi que la limitation des ports de communications sur le Raspberry Pi (port 443 et 80) seront envisageable (**Fiche 6**). Le recours à un hébergeur externe est impossible, la contrainte du projet est qu’il soit hébergé à l’IUT sur un le Raspberry, la salle ou ils seront disponible ne sera pas accessible.
		Les mots de passes passeront par une procédure de hachage avant le stockage sur la base de données.
		En cas de mot de passe ou nom d’utilisateur incorrect, un message d’erreur universel type “Identifiant(s) inconnu” sera affiché pour limiter la divulgation d’informations sur le type d’identifiant utilisé.
		Les potentiels cookies mis en place seront protégés en forçant l’utilisation d’HTTPS ainsi qu’avec l’utilisation d’indicateurs Secure et HttpOnly. L’utilisation de protection contre des CSRF (Cross-Site Request Forgery) n’est pas jugée nécessaire, dû à son obsolescence (2008).
		L’accès aux différents outils (SSH, GitLab) sera limité uniquement aux personnes habilitées, le compte administrateur de l’application web sera également limité, son mot de passe sera protégé.
		Des sauvegardes seront régulièrement effectuées sur le Raspberry Pi et les mises à jour faites régulièrement.

		Comme le recommande la **Fiche 7**, une analyse du type de données récoltées sera effectuée pour déterminer un taux minimum de données personnelles à collecter, en effet, nous utiliserons uniquement les données essentielles au fonctionnement de l’application dans le cadre scolaire. 
		Un script de purge automatique des données pourra être mis en place également sur la base de données, avec une suppression automatique tous les X mois ou 1 an.

		Chaque membre de l’équipe de développement possède son identifiant unique pour accéder à GitLab. Une authentification au SSH sera requise pour accéder aux données personnelles de la base de données. 
		Le mécanisme de gestion des profils utilisateurs ainsi que de journalisation (logs) est déjà prévu d’être mis en place conformément à l’énoncé du projet. 
		L’usage d’un gestionnaire de mots de passe (ex. Bitwarden) pourra être mis en place pendant le projet pour accéder au GitLab ou au Raspberry Pi en SSH. (**Fiche 8**)

		L’utilisation de Bibliothèque ou de SDK spécifique n’est pour l’instant pas prévue (voir pour le module de probabilité pour une utilisation potentielle de bibliothèque python en mathématiques). 
		Si jamais l’équipe en fait l’utilisation, elle choisira des SDK / Bibliothèques dites open source et supportées avec une politique engagée sur la collecte de données personnelles (dans le cadre du possible). Ces bibliothèques seront gardées à jour grâce au gestionnaire de package (apt) présent sur le Raspberry Pi. (**Fiche 9**)

		La documentation du code est une partie intégrante de nos documents de projet, elle est mise en place et incrémentée à chaque cycle / fonctionnalité du code. Elle est également versionnée au même titre que l’ensemble des documents sur GitLab à chaque livrable. 
		La qualité du code est importante, les variables et fonctions ont et auront un nom explicite pour favoriser la compréhension du code. (**Fiche 10**)

		Des tests sont mis en place à chaque fin de cycle, cependant, la mise en place d’un système d’intégration continue pour valider le code à chaque incrémentation (sous forme par exemple de pipeline GitLab) peut être possible et est à voir avec l’équipe de développement.
		Les données de tests seront toutes fictives pour éviter les risques de compromission des données réelles. (**Fiche 11**)

		Informer l’utilisateur de la collecte des données est nécessaire et sera mise en place par l’équipe de développement au travers d’une pop-up ou d’une page “Politique de collecte des données” qui sera disponible au bas de la page (footer). En cas de données compromises, l’utilisateur sera prévenu (ainsi que la CNIL également, dans le cadre d’un gros projet). (**Fiche 12**)

		L’utilisateur pourra demander l’effacement de son compte (Droit à l’effacement) et pourra potentiellement récupérer ses données sous la forme d’un fichier CSV, XML ou JSON (Droit à la portabilité et Droit d’Accès) au travers de boutons disposés dans l’onglet “Profil” de l’application, comme l’indique la **Fiche 13**.

		Les données de compte seront conservées de manière permanente (sauf demande de suppression des données de l’utilisateur), mais les données de journalisation seront conservées 1 an grâce au script permettant de purger les données après X temps d’ancienneté, vu précédemment. (**Fiche 14**)

		Une proposition de consentement sous forme de pop-up affichée lors de la première connexion de l’utilisateur à la plateforme ou à l’inscription, au choix, pourra être proposée au client, pour l’informer de son droit d’accès, à l’effacement et de portabilité. (**Fiche 15**)

		L’application web ne proposera pas de publicité, cependant l’utilisateur devra donner son consentement pour l’utilisation de cookies au travers d’une pop-up qui s'affichera lors de la première visite de l’utilisateur. Nous pourrons regrouper le consentement aux droits de l’utilisateur avec le consentement aux cookies. (**Fiche 16**)

		L’utilisation de traceurs d’audience dans le cadre de la journalisation est possible mais toujours pas adoptée. Si jamais ils sont utilisés, l’équipe de développement prend note que les traceurs sont exemptés de consentement. (**Fiche 17**)

		L’équipe de développement s'assurera que les répertoires comme  /phpmyadmin, /admin… ne seront pas accessibles en désactivant le path traversal.
		Le nombre de tentatives de mots de passe sera limité par adresse IP pour éviter le bourrage d’identifiants et une potentielle attaque dite “Bruteforce” par dictionnaire.
		Un captcha sera mis en place pour également éviter les attaques de robots.
		La date et l’heure de la connexion seront affichées sur la page d’accueil de l’utilisateur lors de son accès à l’application.
		Le système sera régulièrement maintenu à jour pour éviter les attaques de Cross-Site Scripting / XSS, ainsi que la transmission de rançongiciel / malware. (**Fiche 18**)
		
	3. ## Quelles sont les conséquences humaines de la réalisation du système ?
	4. ## Quels sont les besoins en formation ?
		La formation de BUT2 Informatique est suffisante et prodigue les connaissances et compétences nécessaires pour comprendre le sujet et proposer une solution conforme aux attentes des clients.
	5. ## Quelles sont les hypothèses et les dépendances affectant l'environnement humain ?