<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $phone_number;
    public $street;
    public $house_number;
    public $flat_number;
    public $region;
    public $zip_code;	
	public $role=10;
	


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => ( 'This username has already been taken.')],
			['username', 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => ( 'Username need starts with a letter and contains only word characters')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => ('This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['firstname', 'string', 'max' => 50],
			['lastname', 'string', 'max' => 50],
			['phone_number', 'string', 'max' => 25],
			['street', 'string', 'max' => 50],
			['house_number', 'string', 'max' => 10],
			['flat_number', 'string', 'max' => 10],
			['region', 'string', 'max' => 50],
			['zip_code', 'string', 'max' => 50]
        ];
    }

	 public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',			
            'email' =>  'Email',
			'firstname' =>'Firstname',
			'lastname' =>  'Lastname',
			'phone_number' =>  'phone_number',
			'street' =>  'street',
			'house_number' =>  'house_number',
			'flat_number' =>  'flat_number',
			'region' => 'region',
			'zip_code' => 'Zip Code'
        ];
    }
	
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
		$user->role = $this->role;
        $user->setPassword($this->password);
		$user->firstname = $this->firstname;
		$user->lastname = $this->lastname;
		$user->phone_number = $this->phone_number;
		$user->street = $this->street;
		$user->house_number = $this->house_number;
		$user->flat_number = $this->flat_number;
		$user->region = $this->region;
		$user->zip_code = $this->zip_code;		
		
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
