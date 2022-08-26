<?php
class Connection {
    public static $instance;

    public static function getConnection()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new PDO("mysql:host=localhost;dbname=agenda;","root","usbw");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>