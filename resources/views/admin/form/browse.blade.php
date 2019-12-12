<div class="form-group-2 {{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
    
    <div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <div class="browse" id="browse-{{$id}}">
            <div>
                <input 
                    type="file" 
                    class="dropify" 
                    name="{{$column}}"
                    accept="image/*"
                    data-default-file="{{$value??''}}"
                    data-allowed-file-extensions="jpg jpeg png gif"
                    />
                <button type="button" class="btn">
                    <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse from library</span>
                </button>
            </div>
            <input type="hidden" value="{{$value??''}}" />
        </div>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
        @include('admin::form.help-block')
    </div>
</div>
@include('ckfinder::setup')