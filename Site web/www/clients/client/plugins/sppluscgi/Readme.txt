Plugin SPPLUS
=============

Le plugin SPPLUS permet de g�rer les paiements en ligne avec la Caisse d'Epargne via le CGI (si vous ne pouvez pas installer le module spplus sur votre serveur).
Si vous avez la possibilit� d'installer le module spplus sur votre serveur, n'utilisez pas le module sppluscgi.




Installation
============

- Editez le fichier config.php pour entrer l'url du CGI ssplus.


Configuration
=============

1- Dans l'administration SPPLUS, renseignez l'URL de retour paiement Internaute avec l'adresse : http://www.votre-boutique.com/client/plugins/spplus/redir.php

2- Toujours dans l'administration SPPLUS, activez la Notification compl�mentaire.

3- Sur la ligne M�thode d'envoi, s�lectionnez Get

4- Renseignez l'URL 1 pour la notification compl�mentaire avec l'adresse : http://www.votre-boutique.com/client/plugins/spplus/confirmation.php
   Nous vous conseillons par ailleurs de renommer cette page.



Activation
==========

1- Dans l'administration Thelia, activez le plugin SPPLUSCGI.


Notes
=====

SPPLUS, pour la mise en production, demande et v�rifie que le logo SPPLUS soit pr�sent. Par d�faut sur la page paiement.php c'est logo.jpg (visuel CB) qui est appel�. A vous de faire la modification du fichier logo.gif en jpg avec la couleur de fond de votre choix pour que le logo SPPLUS soit correctement affich�.

Les serveurs SPPLUS attendent que la page confirmation.php renvoi spcheckok d'o� la pr�sence de la ligne : echo spcheckok; . Il est imp�ratif de la laisser sous peine d'avoir un dysfonctionnement lors du passage en production.

Il ne vous reste plus qu'� personnaliser vos pages merci.html et regret.html avec vos messages.

