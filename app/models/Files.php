<?php 
class Files extends Model {
    protected $fillable =  ['filename', 'mimetype', 'filedata'];
    protected $guarded = ['id'];

    public function books(){
        return $this->belongsTo('Books');
    }
    public function rules(): array{
        return $rules = array(
            'filename' => [self::RULE_REQUIRED],
            'filedata' => [self::RULE_REQUIRED],
            'mimetype' => [self::RULE_REQUIRED]
        );
    }
    public function tablename(): string{
        return 'files';
    }
    public function attributes():array{
        return ['filename','mimetype','filedata'];
    }
}
?>