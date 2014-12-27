@section('js')
    {{ HTML::script(asset('js/admin/form.js')) }}
@stop


@include('core::admin._buttons-form')

{{ BootForm::hidden('id'); }}
{{ BootForm::hidden('group', 'db'); }}

<div class="form-group @if($errors->has('key'))has-error @endif">
    {{ Form::label('key', trans('validation.attributes.key'), array('class' => 'control-label')) }}
    {{ Form::text('key', null, array('class' => 'form-control')) }}
    {{ $errors->first('key', '<p class="help-block">:message</p>') }}
</div>

{{ Form::label('translations', trans('validation.attributes.translations'), array('class' => 'control-label')) }}
@foreach ($locales as $lang)
    <div class="form-group @if($errors->has($lang.'.translation'))has-error @endif">
        <div class="input-group">
            <span class="input-group-addon">{{ strtoupper($lang) }}</span>
            {{ Form::text($lang.'[translation]', $model->translate($lang)->translation, array('class' => 'form-control')) }}
        </div>
        {{ $errors->first($lang.'.translation', '<p class="help-block">:message</p>') }}
    </div>
@endforeach
