# Dossier de Spécifications
**Saé, Semestre 3, Année 2022-2023**
**IUT de Vélizy**,
*Adel Hammiche, Yanis Bouchaib, Paul Montagnac, Esteban Pagis*
## Sommaire:
1.  ### Introduction
2.  ### Énoncé
3.  ### Pré-requis
4.  ### Priorités
###

1.  # Introduction
Ce dossier a pour objectif de décrire les différentes spécifications qui composent l'application web l’équipe de développement est en train de mettre en place dans le cadre du projet SAé.
Celui-ci sert de base pour l’ensemble des parties du projet (clients et fournisseurs).

En premier, nous allons rappeler le contexte ainsi que les fonctionnalités de l’application web. Ensuite, nous spécifions les pré-requis pour atteindre les objectifs, ainsi que les tâches prioritaires pour une bonne conduite de projet.

2.  # Énoncé
	1.  ## Contexte
	Dans le but du projet SAé, l’objectif (détaillé dans le Cahier des Charges et le Recueil des Besoins) est de mettre en place une application web permettant à un utilisateur inscrit d’effectuer diverses simulations.
	
	Pour pouvoir développer cette application, des objectifs et une première vue sont à mettre en place. Pour réaliser cela, l’équipe de fournisseurs doit mettre en place une maquette web, qui sera proposée au client.

	Les deux maquettes proposeront une charte graphique différente mais partageront un logo commun. Les fonctionnalités proposées seront les mêmes

	Nous avons pris la décision, en accord avec le client référent, de réaliser deux maquettes graphiques, une maquette sera retenue et implémentée pour servir de base à l'application.
	
	Le second objectif est de concevoir une base de données qui servira à stocker des données qui seront partagées avec l'application web pour son bon fonctionnement.

	Une fois la base de données conçue et implémentée dans le Raspberry Pi. L'objectif est de mettre en place de module de probabilités à l'aide de la maquette qui sert de base à l'application web.

    2.  ## Fonctionnalités
		1. ### Maquette:
			La maquette de l'application est techniquement simple, elle ne contiendra aucune fonction technique telle que la connexion de l’utilisateur ou la mise en place de simulations, mais permettra de montrer au client l’interface graphique et recueillir son avis sur la mise en place des composants (boutons, charte graphique..).


			Les pages proposées seront liées entre elles par différents boutons. Par exemple, nous accèderons à la page de connexion en cliquant sur le bouton connexion, situé dans le header.
			![](Assets/logo.png)
			*↑ Logo de l’application web.*

			Notre logo est une représentation de la première calculatrice mécanique nommée la "Pascaline" inventée par Blaise Pascal. Nous avons tourné notre choix vers la représentation de cette machine en référence à l'objectif principal de notre application web, effectuer des simulations de calcul.

		2. ### Base de Données:
			La base de données de l'application web servira à contenir les données de connexion d'un utilisateur (nom d'utilisateur, mot de passe encrypté), pour le fonctionnement de la future fonction d'inscription / connexion. Des données servant à la journalisation telles que le nom du module et sa date d'utilisation seront récoltées, ainsi que l'adresse ip de l'utilisateur en cas de géénération d'erreur sur l'application web.
		
		3. ### Module Probabilités:
			Le module de probabilités servira à calculer une probabilité (dans le cadre d'une loi normale de paramètres 𝑀 et σ) avec des valeurs entrées par l'utilisateur. Un choix sera proposé à l'utilisateur parmis les 3 méthodes de calculs suivantes:
			- Rectangles
			- Trapèzes
			- Simpson

		4. ### Système d'Inscription:
			Le système d'inscription est un élément important de l'application web. 
			Ce système permet à un utilisateur de créer un compte pour accèder au module de probabilités. Celui-ci communicera entre l'application web (serveur apache2) et la base de données mariaDB. Tous les identifiants utilisateurs seront encryptés avant d'être stocké sur la base.
			Un formulaire accessible depuis la page d'accueil visiteur permettra l'inscription de l'utilisateur.
			Lors de l'inscription, un captcha sera à remplir pour éviter l'utilisation malveillante de bots, qui pourraient faire planter le serveur.

		5. ### Système de Connexion
			Le système de connexion se présente par un formulaire, qui permettra l'accès au site web à la connexion de l'utilisateur.
			Un cookie mis en place et vérfié à chaque accès à l'application permet d'identifier l'utilisateur et de lui accorder l'accès, ou non, au site web.
			À l'instar du système d'inscription, le système de connexion communiquera également avec la base de données mariaDB.
			Le système de connexion proposera également en parallèle une page de profil, permettant à l'utilisateur identifié de changer son identifiant ainsi que son mot de passe.

		6. ### Gestionnaire
			Le gestionnaire est un utilisateur ajouté en base de données ayant pour username "gestionnaire". Celui-ci étant un équivalent d'un administrateur, il auras accès à diverses fonctionnalités supplémentaires:
			- Liste des utilisateurs avec possibilité de supprimer des comptes
			- Statistiques d'utilisation du module de probabilité
			Un tableau de bord faisant office de page d'accueil sera dédiée au gestionnaire.

3.  # Pré-requis
    Un accès au Raspberry Pi est rudimentaire pour manipuler la base de données associée. L'équipe préconisera un accès ssh avec les identifiants qui ont été définis.
	
	Pour exécuter l'application, un navigateur web (Chrome, Firefox, Safari...) sera essentiel. Un IDE sera également conseillé pour écrire le code, mais non-essentiel (nous pouvons utiliser un éditeur de texte type Notaped++).

	Des bases en HTML, CSS, Javascript, PHP, MySQL, et Git seront requises pour implémenter la maquette et l'héberger sur Gitlab. D'autres connaissances seront également requises pour les prochains objectifs de l'application.

	Concernant le module probabilités, une connaissance en lois de probabilités et calcul d'intégrales est préconisée pour son implémentation.

4.  # Priorités
	Les priorités actuelles du projet sont:
	- Configurer le Raspberry Pi (installer Apache, MySQL...)
	- Définir les maquettes, en choisir une et l'implémenter
	- Concevoir et implémenter la base de données
	- Concevoir le module probabilité
	- Concevoir le système d'inscription
	- Concevoir le système de connexion
	- Concevoir le système de gestion d'utilisateurs

	En parallèle, l’équipe de développement rédigera les documents annexes, constituant le livrable.