<?php

namespace TypiCMS\Modules\Translations\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('global.menus.content'), function (SidebarGroup $group) {
            $group->addItem(trans('translations::global.name'), function (SidebarItem $item) {
                $item->icon = config('typicms.translations.sidebar.icon', 'icon fa fa-fw fa-comments');
                $item->weight = config('typicms.translations.sidebar.weight');
                $item->route('admin::index-translations');
                $item->append('admin::create-translation');
                $item->authorize(
                    Gate::allows('index-translations')
                );
            });
        });
    }
}
