<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}" id="form-group-{{$id}}">

    
    <div class="{{$viewClass['field']}}">
        
        
        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}[]" multiple="multiple" data-placeholder="{{ $placeholder }}" {!! $attributes !!}  onchange="this.classList.toggle('has-value', !!this.value)">
                
                @foreach($options as $key => $option)
                <option value="{{ $keyAsValue ? $key : $option}}" {{ in_array($option, $value) ? 'selected' : '' }}>{{$option}}</option>
                @endforeach
                
        </select>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
        <span class="line"></span>
        
    </div>
    @include('admin::form.error')
    @include('admin::form.help-block')
</div>
<script>
    var el = document.getElementById('form-group-{{$id}}').getElementsByTagName('select')[0]
    el.classList.toggle('has-value', !!el.value)
</script>
