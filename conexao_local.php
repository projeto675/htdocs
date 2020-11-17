<?php

/* @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

if(!isset($_SESSION) ){
    session_start();
    session_id();

}
/** O nome do banco de dados*/
define('DB_NAME', 'app_escala');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');
include_once'database.php';

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'app_escala');
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "app_escala";

//Criar a conexao
echo $conect = mysqli_connect($servidor, $usuario, $senha, $dbname);

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

//////////////////////////////////////////////////////////////////////////////////
try {
    $conexao = new PDO("mysql:host=localhost; dbname=app_escala", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}
class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'app_escala';
    private $conexao;

    public function conectar(){
        $this->conexao = null;
        try
        {
            $this->conexao = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', 
            $this->username, $this->password);
        }
        catch(Exception $e)
        {
            die('Erro : '.$e->getMessage());
        }

        return $this->conexao;
    }
}
