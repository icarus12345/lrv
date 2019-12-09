<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($column) ?: 'has-error' !!}">

    
    <div class="{{$viewClass['field']}} checkbox2" id="{{$id}}">
        
        @if($canCheckAll)
        <span class="icheck">
            <label class="checkbox-inline">
                <input type="checkbox" class="{{ $checkAllClass }}"/>&nbsp;{{ __('admin.all') }}
            </label>
        </span>
        <hr style="margin-top: 10px;margin-bottom: 0;">
        @endif
        
        
        @foreach($options as $option => $text)
        
        {!! $inline ? '<span class="icheck">' : '<div class="checkbox icheck">' !!}
            
            <label @if($inline)class="checkbox-inline"@endif>
                <input type="checkbox" name="{{$name}}[]" value="{{$option}}" class="{{$class}}" {{ false !== array_search($option, array_filter(old($column, $value ?? []))) || ($value === null && in_array($option, $checked)) ?'checked':'' }} {!! $attributes !!} />&nbsp;{{$text}}&nbsp;&nbsp;
            </label>
            
            {!! $inline ? '</span>' :  '</div>' !!}
            
            @endforeach
            <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
            
            <input type="hidden" name="{{$name}}[]">
            
            
        </div>
        @include('admin::form.help-block')
        @include('admin::form.error')
</div>
