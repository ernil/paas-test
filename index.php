<? 

$host = 'localhost';
$user = 'ely';
$pass = '11111';

use Herrera\Pdo\PdoServiceProvider;
use Silex\Application;

$app = new Application();

$dbopts = parse_url(getenv('DATABASE_URL'));
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
