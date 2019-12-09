<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}" id="form-group-{{$id}}">

    
    <div class="{{$viewClass['field']}}">
        
        
        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}[]" multiple="multiple"  {!! $attributes !!} onchange="this.classList.toggle('has-value', !!this.value)">
                @foreach($options as $select => $option)
                <option value="{{$select}}" {{  in_array($select, (array)old($column, $value)) ?'selected':'' }}>{{$option}}</option>
                @endforeach
            </select>
            <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
            <span class="line"></span>
            
            
    </div>
    @include('admin::form.error')
    @include('admin::form.help-block')
</div>
<script data-exec-on-popstate>
    console.log('HAHAHA', document.readyState)
    var el = document.getElementById('form-group-{{$id}}').getElementsByTagName('select')[0]
    el.classList.toggle('has-value', !!el.value);
    document.getElementById('form-group-{{$id}}').focus = function(){
        console.log('FFFF')
    }
    
</script>
