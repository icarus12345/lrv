$.fn.browses = function() {
	let self = this;

	let input = self.find('input[type="hidden"]');
	let fileInput = self.find('input.dropify');
	let btn = self.find('button');
	let name = fileInput.attr('name');

	let dropify = fileInput.DropifyMultiple()
		// .on('dropify.afterClear', function(event, element){
		//     input.attr('name',name)
		//     	.val('')
		// 	fileInput.attr('name',null)
		// })
		// .change((event) => {
		// 	input.attr('name',null)
		//     	.val('')
		// 	fileInput.attr('name',name)
		// })
	console.log(dropify)
	input.attr('name',null)
	fileInput.attr('name',null)
    btn.click((e)=>{
		CKFinder.config( { connectorPath: '/ckfinder/connector' } );
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					fileInput.attr('name',null)
					var file = evt.data.files.first();
					input.attr('name',name)
						.val(file.getUrl());
					dropify.data('dropify').setPreview(true, file.getUrl())
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					fileInput.attr('name',null)
					input.attr('name',name)
						.val(evt.data.resizedUrl);
					dropify.data('dropify').setPreview(true, file.getUrl())
				} );
			}
		} );
	});
};