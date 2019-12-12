<div class="form-group-2 {!! !$errors->has($errorKey) ?: 'has-error' !!}"  id="form-group-{{$id}}">

    
    <div class="document-editor-box">
        <div class="document-editor-preview">{!! old($column, $value) !!}</div>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
        <!-- <span class="line"></span> -->
    </div>
    @include('admin::form.error')
    @include('admin::form.help-block')
</div>

<div class="document-editor" id="document-editor-{{$id}}">
    <!-- <div class="document-editor-footer">
        <h4>{{$label}}</h4>
    </div> -->
    <div class="toolbar-container"><div id="toolbar-container-{{$id}}"></div></div>
    <div class="document-editor__editable-container">
        <textarea id="textarea-{{$id}}" name="{{$name}}" {!! $attributes !!}>{!! old($column, $value) !!}</textarea>
        <div rows="{{ $rows }}" class="document-editor__editable {{$class}}" id="cke-{{$id}}" name="{{$name}}" placeholder="{{ $placeholder }}">{!! old($column, $value) !!}</div>
    </div>
</div>
