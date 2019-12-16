
<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}" id="form-group-{{$id}}">
    <div class="{{$viewClass['field']}}">
        
        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}" {!! $attributes !!} onchange="this.classList.toggle('has-value', !!this.value)">
            @if($groups)
            @foreach($groups as $group)
            <optgroup label="{{ $group['label'] }}">
                @foreach($group['options'] as $select => $option)
                <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
                @endforeach
            </optgroup>
            @endforeach
            @else
            <option value=""></option>
            @foreach($options as $select => $option)
            <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
            @endforeach
            @endif
        </select>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
        <span class="line"></span>
    </div>
    @include('admin::form.help-block')
    @include('admin::form.error')
    <script>
        var el = document.getElementById('form-group-{{$id}}').getElementsByTagName('select')[0]
        el.classList.toggle('has-value', !!el.value)
    </script>
</div>
