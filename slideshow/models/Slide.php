<?php namespace Borzoi\SlideShow\Models;

use Model;

/**
 * slide Model
 */
class Slide extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'borzoi_slideshow_slides';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */

    public $belongsTo = [
        'slideshow' => ['Borzoi\SlideShow\Models\SlideShow', 'key'=>'slideshow_id']
    ];

    public $attachOne = [
        'imagem' => 'System\Models\File',
        'imagem_mobile' => 'System\Models\File'
    ];

    public function getImagemPath()
    {
      if($this->imagem)
      {
        $imagem = $this->imagem->getThumb(100, 100, 'crop');

        if($imagem)
        {
            return $imagem;
        }
      }
    }

}
