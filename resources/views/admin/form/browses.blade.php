<div class=" form-group-2{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">
    
    <div class="{{$viewClass['field']}}">
        
        <div class="browses" id="browses-{{$id}}">
            <ul class="browses-preview">
				@if($value)
				@foreach(json_decode($value,true)??[] as $item)
				<li>
					<div>
						<img src="{{$item}}"/>
					</div>
					<span>
						
						<button type="button">Remove</button>
					</span>
					<input type="hidden" name="{{$column}}[]" value="{{$item}}"/>
				</li>
				@endforeach
				@endif
			</ul>
            <div class="browses-conntrol">
                <input 
                    multiple
                    type="file" 
                    class="dropify" 
                    name="{{$column}}[]"
                    accept="image/*"
                    data-allowed-file-extensions="jpg jpeg png gif"
                    />
                <button type="button" class="btn">
                    <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse from library</span>
                </button>
            </div>
            
        </div>
        <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>
        @include('admin::form.help-block')
        @include('admin::form.error')
    </div>
</div>
@include('ckfinder::setup')