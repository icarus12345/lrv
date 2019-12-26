$.fn.browses = function() {
	let self = this;

	let sortable = self.find('.browses-preview');
	let input = self.find('input[type="hidden"]');
	let fileInput = self.find('input.dropify');
	let btn = self.find('.browses-conntrol button');
	let name = fileInput.attr('name');
	
	let dropify = fileInput.DropifyMultiple({
		onPreview: (previewable, src, fileName)=>{
			if(previewable) addItem(src);
		},
		onChange: ()=>{
			dropify.data('DropifyMultiple').clearElement()
		}
	})
	var adjustment;
	sortable.sortable({
		vertical: false,
		//placeholder: "ui-state-highlight"
		// set $item relative to cursor position
		onDragStart: function ($item, container, _super) {
			var offset = $item.offset(),
				pointer = container.rootGroup.pointer;
		
			adjustment = {
			  left: pointer.left - offset.left,
			  top: pointer.top - offset.top
			};
		
			_super($item, container);
		  },
		  onDrag: function ($item, position) {
			$item.css({
			  left: position.left - adjustment.left,
			  top: position.top - adjustment.top
			});
		  }
	});
	sortable.on('click','button',(e)=>{
		$(e.target).parents('li').remove();
	});
	console.log(dropify)
	function addItem(src){
		let item = $([
		'<li>',
			'<div>',
				'<img />',
			'</div>',
			'<span>',
				'<button type="button">Remove</button>',
			'</span>',
			'<input type="hidden" name="'+name+'" />',
		'</li>',
		].join(''));
		sortable.append(item);
		item.find('img').attr('src',src);
		item.find('input').val(src);
		sortable.sortable('refresh');
	}
	fileInput.attr('name',null)
		.on('change', (e)=>{
			// dropify.data('DropifyMultiple').clearElement()
		});
    btn.click((e)=>{
		CKFinder.config( { connectorPath: '/ckfinder/connector' } );
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					evt.data.files.models.map((file)=>{
						addItem(file.getUrl());
					})
					
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					addItem(evt.data.resizedUrl);
				} );
			}
		} );
	});
};