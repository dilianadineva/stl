<?php
class User
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function authenticate($username, $password)
    {
        // Hardcoded authentication; replace with DB lookup if needed
        return $username === 'admin' && $password === 'adminpassword';
    }
}
?>
