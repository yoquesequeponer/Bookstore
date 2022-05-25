<?php 
use Illuminate\Database\Eloquent\Model as Eloquent;

class Books extends Model{

    public function rules(): array{
        return $rules = array(
        'name'=>[self::RULE_REQUIRED],
        'price'=>[self::RULE_REQUIRED,[self::RULE_MIN, 'min'=>0],[self::RULE_MAX,'max'=>2000]],
        'authors'=>[self::RULE_REQUIRED],
        'isbn'=>[self::RULE_REQUIRED],
        'publisher'=>[self::RULE_REQUIRED],
        'published_date'=>[self::RULE_REQUIRED]);
        }
        
    public function tableName(): string {
        return 'books';
    }
    
    public function attributes(): array {
        return ['name','price','authors','isbn','publisher','publised_date'];
    }
    
    public function files(){
        return $this->hasOne('Files');
    }
}
?>