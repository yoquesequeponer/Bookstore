<?php 

class User extends Model{


protected $fillable = ['name', 'email', 'password'];
protected $guarded = ['id','confirmpassword'];
protected $appends = ['confirmpassword'];

public function rules(): array{
    return $rules = array(
        'name'=> [self::RULE_REQUIRED],
        'email'=> [self:: RULE_REQUIRED, self:: RULE_EMAIL],
        'password'=> [self:: RULE_REQUIRED],
        'confirmpassword'=>[self::RULE_REQUIRED, [self:: RULE_MATCH, 'match '=>'password']]);
        
}

public function tableName(): string{
    return 'users';
}

public function attributes(): array{
    return ['name', 'email', 'password'];
}

}
?>