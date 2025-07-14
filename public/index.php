require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ProjectController;

$controller = new ProjectController();
$controller->show();