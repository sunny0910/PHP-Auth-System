<?php
namespace PHP;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHP\Settings;
use \PDO;

class DbConnection
{
    private $DBH;
    private static $instance;
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $getsettings = new Settings();
        $host=$getsettings->gethost();
        $dbname= $getsettings->getdbname();
        try {
            $this->DBH = new PDO("mysql:host=$host;dbname=$dbname", $getsettings->getusername(), $getsettings->getpassword());
            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->DBH;
    }
}
