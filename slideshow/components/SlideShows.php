<?php namespace Borzoi\SlideShow\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Theme;
use Borzoi\SlideShow\Models\SlideShow as SlideShowModel;

class SlideShows extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'SlideShows Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
          'sstheme' => [
            'title'       => 'A que theme pertence esta página',
            'type'        => 'dropdown',
            'default'     => '',
            'placeholder' => 'Selecione Theme',
          ]
        ];
    }

    public function onRun()
    {
        // Get current page BaseFile

        $pagina = $this->page->baseFileName;

        $currentTheme = $this->property('sstheme');

        // Get Banner with this page
        if($currentTheme)
        {
          $slideshow = SlideShowModel::with(array('slides' => function($query) {
                                          $query->where('is_visible', '=', 1)->
                                                  orderBy('id', 'asc');
                                      }))->
                                      where('theme','like',$currentTheme)->
                                      where('pagina','like', $pagina)->
                                      where('is_visible', '=', 1)->
                                      first();
                                      

          $this->page['slideshow'] = $slideshow;      

        }
    }

    public function getSsthemeOptions()
    {
        $themes = Theme::all();
        $opcoes = array();

        foreach ($themes as $theme)
        {
          $opcoes[$theme->getId()] = $theme->getConfigValue('name', $theme->getDirName());
        }

        return $opcoes;
    }
}
