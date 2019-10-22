$('.load-link').click(function(){
	$(this).addClass('loading');
    $.ajax({ 
		type: 'GET', 
		url: '../wp-content/plugins/melbet-link/parse.php', 
		localCache: false, 
		error: function (jqXHR, textStatus, errorThrown) {
			alert('Unexpected error. Please, wait for a minute and then refresh the page.');
		},
		//cacheTTL: 1,
    }).done(function (response) {
		$('.load-link').removeClass('loading').addClass('loaded').html(response);
	});
});