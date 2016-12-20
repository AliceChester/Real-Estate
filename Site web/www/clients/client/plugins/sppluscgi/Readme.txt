Plugin SPPLUS
=============

Le plugin SPPLUS permet de gérer les paiements en ligne avec la Caisse d'Epargne via le CGI (si vous ne pouvez pas installer le module spplus sur votre serveur).
Si vous avez la possibilité d'installer le module spplus sur votre serveur, n'utilisez pas le module sppluscgi.




Installation
============

- Editez le fichier config.php pour entrer l'url du CGI ssplus.


Configuration
=============

1- Dans l'administration SPPLUS, renseignez l'URL de retour paiement Internaute avec l'adresse : http://www.votre-boutique.com/client/plugins/spplus/redir.php

2- Toujours dans l'administration SPPLUS, activez la Notification complémentaire.

3- Sur la ligne Méthode d'envoi, sélectionnez Get

4- Renseignez l'URL 1 pour la notification complémentaire avec l'adresse : http://www.votre-boutique.com/client/plugins/spplus/confirmation.php
   Nous vous conseillons par ailleurs de renommer cette page.



Activation
==========

1- Dans l'administration Thelia, activez le plugin SPPLUSCGI.


Notes
=====

SPPLUS, pour la mise en production, demande et vérifie que le logo SPPLUS soit présent. Par défaut sur la page paiement.php c'est logo.jpg (visuel CB) qui est appelé. A vous de faire la modification du fichier logo.gif en jpg avec la couleur de fond de votre choix pour que le logo SPPLUS soit correctement affiché.

Les serveurs SPPLUS attendent que la page confirmation.php renvoi spcheckok d'où la présence de la ligne : echo spcheckok; . Il est impératif de la laisser sous peine d'avoir un dysfonctionnement lors du passage en production.

Il ne vous reste plus qu'à personnaliser vos pages merci.html et regret.html avec vos messages.

