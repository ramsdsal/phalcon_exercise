<?php
use Phalcon\Validation;
	
class User extends BaseModel
{
	/**
     * @Primary
     * @Identity
     * @Column(type="integer", nullable=false)
     */
    public $id;
    /** 
     * @Column(type="varchar", nullable=false)
     */
    public $email;
    public $password;
    public $role;
    
	//Set the name of tabel that related to this Model
	public function getSource()
	{
		return "user";
	}

	public function initialize()
	{
		parent::initialize();
		$this->hasMany('id','project','user_id');
	}

	public function afterValidationOnCreate()
	{
		
		$this->password = $this->getDI()->getSecurity()->hash($this->password);
		
	}

	public function validation()
	{	
		$validator = new Validation();

        $validator->add(
            'email', //your field name
            new Validation\Validator\Email([                
                'message' => 'Your email is invalid'
            ])
        );

        $validator->add(
            'email',
            new Validation\Validator\Uniqueness([                
                'message' => 'Your email is already in use',
            ])
        );

        $validator->add(
            'password',
            new Validation\Validator\StringLength([                
				"max"            => 30,
				"min"            => 4,
				"messageMaximum" => "Your password must be under 30 characters",
				"messageMinimum" => "Your password must be atleast 4 characters",
            ])
        );

        return $this->validate($validator);           
	}
} 
?>
