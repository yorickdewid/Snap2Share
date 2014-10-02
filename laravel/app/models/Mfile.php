<?

class Mfile extends Eloquent {
	protected $table = 'files';
	public $fillable = array('filename', 'orgfilename', 'extension', 'mimetype', 'remote_ip', 'hits');
}

?>