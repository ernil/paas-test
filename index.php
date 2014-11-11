<? 

error_reporting(E_ERROR | E_WARNING | E_PARSE);

require('vendor/autoload.php');

use Herrera\Pdo\PdoServiceProvider;
use Silex\Application;



$app = new Application();

$db_url = getenv('DB_URL');

echo $db_url;

$dbopts = parse_url(getenv($db_url));

$host = 'localhost';
$user = 'ely';
$pass = '11111';

print_r($dbopts);


$app->register(new Herrera\Pdo\PdoServiceProvider(),
  array(
    'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"],
    'pdo.port' => $dbopts["port"],
    'pdo.username' => $dbopts["user"],
    'pdo.password' => $dbopts["pass"]
  )
);

?>
