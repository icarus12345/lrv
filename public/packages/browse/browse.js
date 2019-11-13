$.fn.browse = function() {
	let self = this;
	let input = self.find('input');
	let btn = self.find('button');
    btn.click((e)=>{
		CKFinder.config( { connectorPath: '/ckfinder/connector' } );
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					input.val(file.getUrl());
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					input.val(evt.data.resizedUrl);
				} );
			}
		} );
	});
};