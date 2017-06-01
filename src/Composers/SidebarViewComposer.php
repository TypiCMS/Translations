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
        if (Gate::denies('see-all-translations')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Translations'), function (SidebarItem $item) {
                $item->id = 'translations';
                $item->icon = config('typicms.translations.sidebar.icon', 'icon fa fa-fw fa-comments');
                $item->weight = config('typicms.translations.sidebar.weight');
                $item->route('admin::index-translations');
                $item->append('admin::create-translation');
            });
        });
    }
}
