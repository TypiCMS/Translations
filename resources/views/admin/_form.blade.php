<div class="btn-toolbar mb-4">
    <button class="btn btn-sm btn-primary me-2" value="true" id="exit" name="exit" type="submit">{{ __('Save and exit') }}</button>
    <button class="btn btn-sm btn-light me-2" type="submit">{{ __('Save') }}</button>
</div>

{!! BootForm::hidden('id') !!}

@if ($model->id)
{!! BootForm::hidden('key') !!}
@else
{!! BootForm::text(__('Key'), 'key')->required() !!}
@endif

<label class="form-label">{{ __('Translations') }}</label>

@foreach ($locales as $lang)
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">{{ strtoupper($lang) }}</span>
            {!! Form::text('translation['.$lang.']')->addClass('form-control')->addClass($errors->has('translation.'.$lang) ? 'is-invalid' : '') !!}
            {!! $errors->first('translation.'.$lang, '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
@endforeach
