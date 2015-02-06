@section('js')
    <script src="{{ asset('js/admin/form.js') }}"></script>
@stop


@include('core::admin._buttons-form')

{!! BootForm::hidden('id') !!}
{!! BootForm::hidden('group', 'db') !!}

{!! BootForm::text(trans('validation.attributes.key'), 'key') !!}

<label class="control-label">@lang('validation.attributes.translations')</label>
@foreach ($locales as $lang)
    <div class="form-group @if($errors->has($lang.'.translation'))has-error @endif">
        <div class="input-group">
            <span class="input-group-addon">{{ strtoupper($lang) }}</span>
            <input class="form-control" type="text" name="{{ $lang }}[translation]">
        </div>
        {!! $errors->first($lang.'.translation', '<p class="help-block">:message</p>') !!}
    </div>
@endforeach
