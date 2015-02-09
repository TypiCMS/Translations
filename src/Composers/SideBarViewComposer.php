<?php
namespace TypiCMS\Modules\Translations\Composers;

use Illuminate\View\View;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $view->menus['content']->put('translations', [
            'weight' => config('typicms.translations.sidebar.weight'),
            'request' => $view->prefix . '/translations*',
            'route' => 'admin.translations.index',
            'icon-class' => 'icon fa fa-fw fa-comments',
            'title' => 'Translations',
        ]);
    }
}
