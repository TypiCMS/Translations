@component('core::admin._buttons-form', ['model' => $model])
@endcomponent

{!! BootForm::hidden('id') !!}
{!! BootForm::hidden('group')->value('db') !!}

{!! BootForm::text(__('Key'), 'key')->required() !!}

<label class="control-label">{{ __('Translations') }}</label>

@foreach ($locales as $lang)
    <div class="form-group @if ($errors->has('translation.'.$lang))has-error @endif">
        <div class="input-group">
            <span class="input-group-addon">{{ strtoupper($lang) }}</span>
            {!! Form::text('translation['.$lang.']')->addClass('form-control') !!}
        </div>
        {!! $errors->first('translation.'.$lang, '<p class="help-block">:message</p>') !!}
    </div>
@endforeach
