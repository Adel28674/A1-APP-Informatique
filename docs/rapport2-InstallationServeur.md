# Rapport Installation du Serveur
Saé, Annexe
## Sommaire:
1. ### Introduction
2. ### Raspberry Pi

###

1. ## Introduction
Ce court rapport va présenter les outils utilisés sur le Raspberry Pi 3 mis à disposition de l'équipe, ainsi que les commandes utilisés pour les installer, et les identifiants utilisés pour le Raspberry Pi.

Les outils utilisés sur le Raspberry Pi sont Apache (Serveur HTTP, pour le PHP) et MariaDB (SGBD pour créer la base de données).

2. ## Raspberry Pi
Un **Raspberry Pi 3** est mis à disposition par l'IUT pour que nous puissions héberger notre application web et sa base de données. Ses spécificités techniques (1GB de RAM, Processeur ARM 64 Bits 1,4Ghz..) sont largement suffisantes pour notre utilisation.

La distribution installée est **Debian 11**. 

---
Pour accéder au Raspberry, nous nous connectons via un tunnel SSH avec les identifiants suivants: 
<u>id:</u> saepi
<u>password:</u> azerty 
La commande suivante permet de nous connecter en SSH:

    ssh saepi@192.168.1.172

Attention, cette commande doit être exécutée depuis un PC de l'IUT, il est possible de l'utiliser si nous sommes connectés à l'IUT (chypre.iut-velizy.uvsq.fr) en SSH.

Lors de la première connexion au Raspberry ainsi qu'à chaque autre connexion, il est important de mettre à jour les paquets installés avec la commande:

    sudo apt-get update

---
Le **premier outil** à installer est **Apache**, un serveur HTTP utilisé pour héberger l'application web en PHP.

    sudo apt-get install apache2
   
   
Le **second outil** qui sera installé est **git**. Git nous permet de cloner notre répertoire Gitlab sur le Raspberry Pi pour implémenter l'application web facilement sur le Raspberry, dans le répertoire Apache.

    sudo apt-get install git


Le **troisième outil** qui sera installé est **MariaDB**, celui-ci est utilisé pour la création et l'hébergement d'une Base de Données en SQL et remplace MySQL car celui-ci n'est plus pris en charge.

    sudo apt-get install mariadb-server

Une fois l'installation effectuée, nous utilisons la commande 

    mysql_secure_installation

Le login de la database est root, le mot de passe est saeiut.