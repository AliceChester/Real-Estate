<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                            		 */
/*                                                                                   */
/*      Copyright (c) Octolys Development		                                     */
/*		email : thelia@octolys.fr		        	                             	 */
/*      web : http://www.octolys.fr						   							 */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 2 of the License, or            */
/*      (at your option) any later version.                                          */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*      along with this program; if not, write to the Free Software                  */
/*      Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA    */
/*                                                                                   */
/*************************************************************************************/
?>
<?php
	//Modif par Roadster31 - singleton de connexion � la BDD


    class StaticConnection
    {
        public static $db_handle = -1;

        public static function getHandle()
        {
            if (self::$db_handle == -1)
            {
                self::$db_handle = mysql_connect(Cnx::$host, Cnx::$login_mysql, Cnx::$password_mysql);

                if(! self::$db_handle && $_REQUEST['erreur'] != 1)
                {
                    header("Location: maintenance.php?erreur=1");
                }

                mysql_select_db(Cnx::$db, self::$db_handle);
            }

            return self::$db_handle;
        }
    }

    // Classe Cnx
	// host --> votre serveur mysql
    // login_mysql --> login de connexion
    // password_mysql --> mot de passe de connexion
    // db --> nom de la base de donn�e
    class Cnx{

		public static $host= "mysql51-32.bdb";
        public static $login_mysql= "realestathelia";
        public static $password_mysql= "hcp1558";
        public static $db = "realestathelia";

        var $table = "";
        var $link="";

        function Cnx() {

            $this->link = StaticConnection::getHandle();

			self::$host = '';
			self::$login_mysql = '';
			self::$password_mysql = '';
			self::$db = '';
        }

		public function query($query) {
			$resul = mysql_query($query, $this->link);

			// A d�commenter pour debug
			/*
			if ($resul === false) {
				die("Erreur: ".mysql_error().": requ�te: $query");
			}
			*/

			return $resul;
		}
	}
?>