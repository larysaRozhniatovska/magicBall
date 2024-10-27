<?php
class UserManager {
    private static $instance = 0;
    /**all added users
     * @var array
     */
    private array $users = [];
    private array $errors = [];
    private string $fileDir = "storage";
    private string $file = "users.json";
    private bool $isChange = false;
    private function __construct()
    {
        $this->fileDir = realpath($this->fileDir);
        if (!file_exists($this->fileDir)){
            mkdir($this->fileDir);
        }
        $this->file = $this->fileDir . DIRECTORY_SEPARATOR . $this->file;
        $this->loadUsers();
    }
    private function __clone(): void
    {
    }
    /**
     * returns the created instance of the class
     * @return UserManager
     */
    public static function getInstance() : UserManager
    {
        if(self::$instance == 0){
            self::$instance = new UserManager();
        }
        return self::$instance;
    }
    public function __destruct()
    {
       $this->saveUsers();
    }

    /**
     * save all Users in file storage/users.json
     * @return void
     */
    public function saveUsers():void
    {
        if($this->isChange){
            $jsonUser = json_encode($this->users);
            if(!file_put_contents($this->file, $jsonUser)){
                $this->errors[] = "error writing to file";
            }
        }
    }

    /**
     * return errors
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * add  User in array $this->users
     * @param array $user
     * @return void
     */
    public function addUser(array $user)
    {
        $hash = md5(serialize($user['login']));
        $this->users[$hash] = $user;
        $this->isChange = true;
    }

    /**
     * read info all Users from file
     * @return void
     */
    private function loadUsers()
    {
        if (file_exists($this->file)) {
            $jsonUsers = file_get_contents($this->file);
            if ($jsonUsers) {
                $users = json_decode($jsonUsers, true);
                if (!$users) {
                    $this->errors[] = "data decoding error";
                } else {
                    $this->users = $users;
                }
            }else{
                $this->errors[] = "error reading from file";
            }
        }
    }

    /**
     * returns logins of all users
     * @return array
     */
    public function getLoginUsers(): array
    {
        $logins = array_column($this->users, "login", );
        return array_filter($logins, function ($val){
            return $val !== "";
        });
    }

    /**
     * Checking for user presence by login
     * @param string $login
     * @return bool
     */
    public function existUser(string $login): bool
    {
        $hash = md5(serialize($login));
        return key_exists($hash, $this->users);
    }

    /**
     * returns user information by login
     * @param string $login
     * @return array
     */
    public function infoUser(string $login): array
    {
        if ($login === "")
            return [];
        $result = array_filter(
            $this->users,
            function ($user) use ($login) {
                return $user["login"] === $login;
            },
        );
        $result = reset($result);
        if ($result["login"] === $login) {
            return $result;
        }else {
            return [];
        }
    }
};
