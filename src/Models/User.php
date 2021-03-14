<?php
namespace Models;
use Exception\InvalidPropertyException;

class User extends Model{
    protected $id;
    protected $name;
    protected $email;
    protected $is_confirned;
    protected $role;
    protected $password_hash;
    protected $auth_token;
    protected $created_at;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getIsConfirned()
    {
        return $this->is_confirned;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getPasswordHash()
    {
        return $this->password_hash;
    }
    public function getAuthToken()
    {
        return $this->auth_token;
    }
     public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function setTableName()
    {
        return 'users';
    }
    public static function getTableName()
    {
        return 'users';
    }
    
    public function setName(string $value)
    {
        if( empty($value) ){
            throw new InvalidPropertyException("Name is required");            
        }
        $this->name = $value;
    }       
    
    public function setEmail(string $value)
    {
        if( empty($value) ){
            throw new InvalidPropertyException("Email is required");
            
        }
        if( !filter_var($value, FILTER_VALIDATE_EMAIL) ){
            throw new InvalidPropertyException("Email is not correct");
            
        }
        $this->email = $value;
    }
    public function setPassword(string $value)
    {
        if( empty($value) ){
            throw new InvalidPropertyException("Password is required");          
        }        
        $this->password_hash = password_hash($value, PASSWORD_DEFAULT);
    }

    public static function signUp(array $userData)
    {
       $user = new User();
       $user->setName(htmlentities($userData['userName']));
       $user->setEmail(htmlentities($userData['email']));
       $user->setPassword(htmlentities($userData['password']));
       if( self::findOneByColumn('email', $userData['email'])) {
        throw new InvalidPropertyException("User with this email already exists");        
       }
       $user->is_confirned = 0;
       $user->role = 'user';
       $user->auth_token = sha1(random_bytes(100));
       $user->created_at = date('Y-m-d H:i:s');
       $user->save();
       return $user;
    }
    
    public static function comeIn(array $userCome)  {
        $user = self::findOneByColumn('name', htmlentities($userCome['name']));        
        if( !$user ) throw new InvalidPropertyException("Name is not correct");
        if( !password_verify( htmlentities($userCome['password']), $user->getPasswordHash() ) ) throw new InvalidPropertyException("User with this name or password does not exist");
        else{            
            $_SESSION['user'] = $userCome['name'];    
        }   
    }    
    
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setConfirmed(int $flage)
    {
        $this->is_confirned = $flage;
    }
   
}
