# SAé: Planet Calculator
<img src="https://www.uvsq.fr/medias/photo/logo-uvsq-2020-rvb_1578567733608-png?ID_FICHE=221058" alt="texte alternatif" width="40%"/><br>
**2022-2023, Iut de Vélizy**,<br>
Yanis Bouchaib, Adel Hammiche, Paul Montagnac, Esteban Pagis

## Principe du Projet

Le projet effectué durant le 3ème semestre du BUT Informatique consiste à mettre en place une **application web** permettant d’effectuer des **simulations** dans un module de probabilité (mathématiques).

Ce projet sera hébergé sur un Raspberry Pi, disponible au sein de l’IUT de Vélizy.
Une base de données sera également créée sur ce Raspberry Pi pour pouvoir communiquer avec l’application web.

## Fonctionnalités

iverses fonctions supplémentaires seront disponibles dans l’application:<br>
- Un visiteur non-inscrit pour s’inscrire et se connecter pour accéder aux simulations
- L'utilisateur pourra modifier ses identifiants
- Un gestionnaire, considéré comme un administrateur, pourra supprimer des profils, générer des rapports statistiques du module probabilité…
- Une instance d’erreur sera générée et envoyée sur le base de données en cas d’erreur



## Guide: Cloner le Projet (Linux)
``git`` est nécessaire pour cloner le projet: ``sudo apt-get install git``
```
mkdir repertoire && cd repertoire
git clone https://gitlab.com/etherhum/saeiut
```
## Packages & Modules requis



```
sudo apt-get install python3 python3-pip
``` 
```
sudo pip3 install scipy
```
```
sudo apt-get install apache2, libapache2-mod-php5, mariadb-server
```
```
sudo apt-get install php7.4, php7.4-mysql, php-mbstring
```
La configuration du serveur est située dans le Rapport ["Installation Serveur"](https://gitlab.com/etherhum/saeiut/-/blob/main/docs/rapport2-InstallationServeur.md)
