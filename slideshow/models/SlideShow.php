<?php namespace Borzoi\SlideShow\Models;

use Model;
use Cms\Classes\Theme;
use Cms\Classes\Page;

/**
 * slideshow Model
 */
class SlideShow extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'borzoi_slideshow_slideshows';

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
    public $implement = [];

    public $translatable = [
        'titulo'
    ];

    public $hasMany = [
        'slides' => ['Borzoi\SlideShow\Models\Slide','key'=>'slideshow_id']
    ];

    public $attachOne = [
        'logo' => 'System\Models\File'
    ];

    public function getThemeOptions()
    {
        $themes = Theme::all();
        $opcoes = array();

        foreach ($themes as $theme)
        {
          $opcoes[$theme->getId()] = $theme->getConfigValue('name', $theme->getDirName());
        }

        return $opcoes;
    }

    public function getPaginaOptions($value, $data)
    {
        $opcoes = array();

        if(isset($data->theme))
        {
          $currentTheme = Theme::load($data->theme);

          if($currentTheme)
          {
            $paginas = Page::listInTheme($currentTheme, true);

            foreach ($paginas as $pagina) {
                $opcoes[$pagina->baseFileName] = $pagina->title.' ('.$pagina->url.')';
            }
          }
        }
        return $opcoes;
    }
}
