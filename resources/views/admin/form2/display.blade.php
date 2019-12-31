<div class="form-group-2 {{$viewClass['form-group']}}">
    <div class="{{$viewClass['field']}}">
        <div class="display-value form-control">
            <div class="">
                {!! $value !!}&nbsp;
            </div>
        </div>
        <label class="{{$viewClass['label']}} control-label">{{$label}}</label>
        <span class="line"></span>
        @include('admin::form.help-block')

    </div>
</div>