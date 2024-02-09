# Cahier des Charges
**Saé, Semestre 3, Année 2022-2023**
**IUT de Vélizy**,
*Adel Hammiche, Yanis Bouchaib, Paul Montagnac, Esteban Pagis*

## Sommaire:
1.  ### Introduction
2.  ### Énoncé
3.  ### Pré-requis
4.  ### Priorité

###

1. # Introduction
Le cahier des charges est un document qui définit les besoins / exigences de la SAÉ.
Il sert de base à la conception et au développement et permet de définir les objectifs et les fonctionnalités du projet, ainsi que les contraintes auxquelles il doit faire face.

Ce document / outil est essentiel à la bonne conduite du projet et est indispensable pour tous ses acteurs.
Le cahier des charges sera structuré de la façon suivante:
* <u>Énoncé:</u> Description des objectifs et des fonctionnalités du projet
* <u>Pré-requis:</u> Définition des connaissances / ressources nécessaires au développement du projet
* <u>Priorités:</u> Priorités en termes de fonctionnalités et de développement, en accord avec le client

2.  # Énoncé
L’objectif général du projet est de concevoir une application web (plateforme en ligne) permettant à des utilisateurs inscrits d’utiliser (de base) une simulation en mathématiques, dans le domaine des probabilités.
 
Anciennement, l'application devait proposer le choix parmi les modules de simulations suivants:
* <u>Informatique</u>
	* Exemple: Conversions binaire, hexadécimal…
* <u>Mathématiques</u>
	* Exemple: Calcul d’une probabilité en loi normale
* <u>Sécurité</u>
	* Exemple: Mise en place d’un algorithme de cryptographie
*   <u>Autre domaine, à définir par les professeurs</u>
	* Exemple: Calcul d’amortissement

Lors d’une utilisation du module de simulation, des logs comportant l’utilisateur ainsi que le nom du module utilisé seront générés pour produire des statistiques consultables par le gestionnaire.

**L'énoncé de base comportait l'utilisation de ces 3 domaines de simulations, or, un changement fait pas l'équipe d'enseignant stipule que nous n'utiliserons qu'un seul module: <u>celui de probabilités</u>.**

L’application web proposera 3 types d’utilisateurs:
* Un <u>utilisateur inscrit</u>, qui pourra effectuer les simulations
* Un <u>utilisateur non-inscrit (visiteur)</u>, qui ne pourra pas effectuer les simulations
* Un <u>gestionnaire</u>, enregistré sur la base de données sous forme <b>login</b>:gestion, <b>password</b>:***, qui pourra:
	* Visualiser la liste des utilisateurs inscrits
	* Supprimer un utilisateur / Consulter son historique d’activité
	* Établir des statistiques de visites et de modules utilisés par les utilisateurs inscrits

Cette application sera codée en PHP, hébergée sur un Raspberry Pi (situé au sein de l’IUT) et offrira une base de données qui contiendra les informations des utilisateurs.
La structure de base du site (maquette) sera réalisée en HTML & CSS.

La base de données sera conçue en MySQL et hébergée sur le Raspberry Pi. Celle-ci devra contenir les données utilisateurs (nom d'utilisateur, mot de passe), ainsi que d'utilisation (nom de module utilisés, ip de l'utilisateur en cas de génération d'erreurs...).

Un système d'inscription / connexion des utilisateurs sera en interaction avec la base de données de manière automatisée. 

Un utilisateur non-inscrit pourra uniquement accéder à la page d'accueil visiteur, lui proposant de s'inscrire en remplissant un formulaire ainsi qu'un captcha. Une vidéo de démonstration sera également disponible pour les visiteurs.

L'utilisateur inscrit, pourra se connecter et ainsi accéder au module de probabilités ainsi qu'à la page de gestion de son profil.

Nous pouvons découper l’objectif général en plusieurs <u>sous-objectifs</u> de la sorte:

*   1. Développer une application en ligne permettant aux utilisateurs d’effectuer des simulations en mathématiques, informatique, sécurité, domaine à définir, avec une interface ergonomique permettant à l'utilisateur de naviguer simplement dans l'interface
*   2. Fournir une base de données sécurisée permettant de stocker les données d’utilisateurs de manière cryptée
*   3. Rendre l’application modifiable et évolutive, pour incrémenter de nouvelles fonctionnalités facilement:
	* Créer la simulation de probabilités
	* Mettre en place le système d'inscription / connexion
	* Mettre en place le système de gestion

Ces tâches seront amenées à être découpées en sous-tâches au fil des livrables.

3.  # Pré-requis

Nous listons les pré-requis suivants, par catégories:
- Connaissances Requises:
	- Langage PHP
	- Langage Python
	- Méthodes de calculs de probabilités:
		- Méthode des Rectangles
		- Méthode des Trapèzes
		- Méthode de Simpson
	- Conception et Intégration de Bases de Données
	- Systèmes Linux (Raspberry Pi)

- Ressources Matérielles et Logicielles:
	- Raspberry Pi 4 avec distribution opérationnelle et Apache, PhPMyAdmin, MySQL (ou MariaDB, MongoDB…)
	- Un outil de développement, adapté pour programmer en PHP, MySQL…
	- Dépôt Gitlab pour partager le code du projet, ainsi que les annexes

- Compétences nécessaires:
	- Développement en PHP
	- Développement en MySQL
	- Développement en Python
	- Bases en Unix (mkdir, cd, ls…)
	- Génie Logiciel (Conception architecturale / détaillée, rédaction d’annexes..)

4.  # Priorités

L’équipe de développement n'a pas demandé au client ses priorités pour ce projet.

Cependant il est nécessaire d’établir un ordre de développement, pour un fonctionnement essentiel.

Après avoir établi mis en place les bases du projet, à savoir définir les maquettes, la base de données et les différents outils (PHPMyAdmin, MySQL, Apache..) sur le Raspberry Pi, il est essentiel de proposer la principale fonctionnalité de l’application, qui est d’effectuer les simulation en probabilité.

Une fois cette fonctionnalité primaire implémentée, nous pourrons mettre un place un système d’inscription et d’authentification, avec un rôle de gestionnaire, qui pourra accéder à diverses données d’utilisateurs inscrits (email, historique de simulations…) au travers d'un système de gestion.

Pour une liste des tâches plus détaillée, veuillez consulter le Dossier de Maintenance.