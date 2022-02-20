@if($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS --}}
    @push('crud_fields_styles')
        <style type="text/css">
            .editor_code{
                padding: 20px; margin: 20px;
                width: 90%;
                height: 400px;
            }
        </style>
    @endpush
    {{-- FIELD EXTRA JS --}}
    @push('crud_fields_scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.7/ace.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.7/ext-language_tools.js" type="text/javascript"></script>
    @endpush
@endif
<!-- field_code -->
<div @include('crud::inc.field_wrapper_attributes')>
    <label>{!! $field['label'] !!}</label>
    <div class="container_code">
        <pre @if(isset($field['height'])) style="height:{{$field['height']}}"@endif id="{{$field['name']}}_editor_code" class="editor_code">{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}</pre>
        <textarea style="display: none;" name="{{ $field['name'] }}">{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}</textarea>
    </div>
    {{-- HINT --}}
    @if(isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>

@push('crud_fields_scripts')
    <script>
        var editor_{{$field['name']}} = ace.edit("{{$field['name']}}_editor_code");

        editor_{{$field['name']}}.setTheme("ace/theme/github");
        editor_{{$field['name']}}.setOptions({
            enableLiveAutocompletion: true,
            tabSize:2
        });
        editor_{{$field['name']}}.session.setMode("ace/mode/php_laravel_blade");
        editor_{{$field['name']}}.getSession().on('change', function(){
            $('textarea[name="{{ $field['name'] }}"]').val(editor_{{$field['name']}}.getSession().getValue());
        });
    </script>
@endpush