/*****************************************************************************
 *
 * Auteur   : Octolys | Octolys.fr (contact: contact@octolys.fr)
 * Version  : 0.1
 * Date     : 29/11/2010
 *
 * Copyright (C) 2010 Octolys
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 *****************************************************************************/



UTILISATION
============

Modifiez la valeur de la variable $compte_moneybookers dans le fichier config.php
Entrez tout simplement votre e-mail gérant votre compte MoneyBookers.

Renommez confirmation.php en personnalisant le nom du fichier (sécurité) et changez la valeur de la variable $confirm dans config.php.

Information
============

Le retour de paiement n'est pas une information suffisante. Vérifiez toujours sur l'interface de votre banque qu'un paiement est bien passé en paiement
avant de le considérer réellement comme "payé"

Vérifiez que les répertoires de votre site ne sont pas listable (ex http://www.votresite.com/client/plugins/).
Si tel est le cas veuillez ajouter un fichier htaccess afin de sécuriser le tout.