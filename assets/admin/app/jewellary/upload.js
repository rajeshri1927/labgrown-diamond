(($) => {
	document.getElementById('upload-form').addEventListener('submit', function (e) {
		e.preventDefault();
		let formData = new FormData(this);

		fetch('jewellary-upload-image-folder', {
			method: 'POST',
			body: formData
		})
		.then(response => response.json())
		.then(data => {
			alert(data.message);
		})
		.catch(error => console.error('Error:', error));
	});
	
})(jQuery);