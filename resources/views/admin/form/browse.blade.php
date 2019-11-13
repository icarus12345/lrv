<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
    <div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <div class="input-group browse" id="browse-{{$id}}">
            @if ($prepend)
            <span class="input-group-addon">{!! $prepend !!}</span>
            @endif
            <input {!! $attributes !!} />
            <div class="input-group-btn input-group-append">
				<button type="button" class="btn btn-primary btn-file">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse</span>
				</button>
			</div>
        </div>
        @include('admin::form.help-block')
    </div>
</div>
@include('ckfinder::setup')