@extends('core::admin.master')

@section('title', __('translations::global.name'))

@section('content')

<div ng-cloak ng-controller="ListController">

    @include('core::admin._button-create', ['module' => 'translations'])

    <h1>@lang('translations::global.name')</h1>

    <div class="btn-toolbar">
        @include('core::admin._button-select')
        @include('core::admin._button-actions', ['limit' => ['delete']])
        @include('core::admin._lang-switcher-for-list')
    </div>

    <div class="table-responsive">

        <table st-persist="translationsTable" st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="key" st-sort-default="true" class="key st-sort">{{ __('Key') }}</th>
                    <th st-sort="translation_translated" class="translation st-sort">{{ __('Translation') }}</th>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <input st-search="key" class="form-control input-sm" placeholder="@lang('Search')…" type="text">
                    </td>
                    <td>
                        <input st-search="translation_translated" class="form-control input-sm" placeholder="@lang('Search')…" type="text">
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td>
                        <input type="checkbox" checklist-model="checked.models" checklist-value="model">
                    </td>
                    <td>
                        @include('core::admin._button-edit', ['module' => 'translations'])
                    </td>
                    <td>@{{ model.key }}</td>
                    <td>@{{ model.translation_translated }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>

@endsection
