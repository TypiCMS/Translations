<?php
namespace TypiCMS\Modules\Translations\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use TypiCMS\Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('global.menus.content'), function (SidebarGroup $group) {
            $group->addItem(trans('translations::global.name'), function (SidebarItem $item) {
                $item->icon = config('typicms.translations.sidebar.icon', 'icon fa fa-fw fa-comments');
                $item->weight = config('typicms.translations.sidebar.weight');
                $item->route('admin.translations.index');
                $item->append('admin.translations.create');
                $item->authorize(
                    $this->user->hasAccess('translations.index')
                );
            });
        });
    }
}
