<?php

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
} 
?>
