<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}" id="form-group-{{$id}}">
    <div class="{{$viewClass['field']}}">
        <input {!! $attributes !!} oninput="this.classList.toggle('has-value', !!this.value)" onblur="this.classList.toggle('has-value', !!this.value)"/>
        <label for="{{$id}}" class="{{$viewClass['label']}}">{{$label}}</label>
        <span class="line"></span>
    </div>
    @include('admin::form.help-block')
    @include('admin::form.error')
</div>
<script>
    var el = document.getElementById('form-group-{{$id}}').getElementsByTagName('input')[0]
    el.classList.toggle('has-value', !!el.value)
    console.log('$$$$$')
</script>