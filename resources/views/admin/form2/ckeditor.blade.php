<div class="form-group-2 {!! !$errors->has($errorKey) ?: 'has-error' !!}"  id="form-group-{{$id}}">

    
    <div class="">
        
        
        <textarea rows="{{ $rows }}" class="form-control {{$class}}" id="cke-{{$id}}" name="{{$name}}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
		<span class="line"></span>
        
    </div>
    @include('admin::form.error')
    @include('admin::form.help-block')
</div>
@include('ckfinder::setup')
<script>
var el = document.getElementById('form-group-{{$id}}').getElementsByTagName('textarea')[0]
    el.classList.toggle('has-value', !!el.value)
</script>