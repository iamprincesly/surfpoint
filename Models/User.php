<?php
namespace App\Models;

use App\Core\UserModel;

/**
 * Class User
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Models;
 */
class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 0;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';
    
    /**
     * Define a table for this model
     *
     * @return string
     */
    public function tableName(): string
    {
        return 'users';
    }

    /**
     *  Model primary key
     *
     * @return string
     */
    public function primaryKey(): string
    {
        return 'id';
    }
    
    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password',
            'status',
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password'
        ];
    }

    public function getDisplayName(): string 
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}