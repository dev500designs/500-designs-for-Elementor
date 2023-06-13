jQuery( window ).on( 'elementor/frontend/init', () => {

    const addHandler = ( $element ) => {
        initPlaylistYoutube($element);
    };
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/playlist-youtube-usmcl.default', addHandler );
} );



const initPlaylistYoutube = function($el) {
	let playlistId 	= $el.find('#uew-playlist-yt').data('playlist');
	let maxResults 	= $el.find('#uew-playlist-yt').data('maxresults');
	let baseurl 	= $el.find('#uew-playlist-yt').data('url');
	let widgetId 	= $el.find('#uew-playlist-yt').data('widget');
	console.log('initPlaylistYoutube');
    
    loadOwlVideosYT(widgetId);
    /*
    if( res.items.length > 0 ){
		var obj 		= res.items[0];
		var idVideo 	= obj.snippet.resourceId.videoId,
		title 		= obj.snippet.title,
		description = obj.snippet.description;
				
		if( res.items.length > maxResults ){
			res.items.splice(maxResults, res.items.length-1);
		}
				
		printVideoYT(idVideo, title, description);
		loadOwlVideosYT(res.items, widgetId);
				
	} else {
		$("#videos").hide();
	}*/
    
}


function printVideoYT(idVideo, title, description){
	var $video 		= $("#videoYT"),
		$title 		= $('.title-video__usm'),
		$description= $('.description-video__usm');
	
	$video.attr('src', 'https://www.youtube.com/embed/'+idVideo);
	$title.text(title);
	$description.text(description);
}

function loadOwlVideosYT(widgetId){
	var $owlVideo = $('.videos-yt-owl');
	// $owlVideo.empty();
    /*
	$.each(videos, function(i, video){
		if( Object.entries(video.snippet.thumbnails).length > 0 ){
			var html = '<div class="col-sm-12">'+
			'<div class="card card__usm card-effect__usm card-bg-black card-contenido-interes__usm justify-content-center align-items-center" >'+
			'<i class="far fa-play-circle card-icon-yt"></i>'+
			'<a href="#" target="_blank" class="card-link__usm load-video-yt" data-video="'+video.snippet.resourceId.videoId+'" data-title="'+escape(video.snippet.title)+'" data-description="'+escape(video.snippet.description)+'"></a>'+
			'<img src="'+video.snippet.thumbnails.medium.url+'" alt="'+video.snippet.title+'" class="card-img-yt">'+
			'</div>'+
			'</div>';
			$owlVideo.append(html);
		}
	});*/
	
	// Carrusel de videos YT
	var carouselVideosYT = $('.videos-yt-owl');
	carouselVideosYT.on('changed.owl.carousel', function(event){
		if( event.item.index != null ){
			var sizeItems 	= event.page.size;
			var totalItems 	= event.item.count;
			if( sizeItems > totalItems ){
				var currentItem = totalItems;
			} else {
				var currentItem = sizeItems+event.item.index;
			}

			$('#uew-playlist-yt .current-number__usm').text(currentItem);
			$('#uew-playlist-yt .total-number__usm').text(totalItems);
		}
	});
	carouselVideosYT.owlCarousel({
        center: !1,
        loop: !1,
        margin: 30,
        dots: !1,
        mouseDrag: !1,
        responsiveClass: !0,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 4
            }
        }
    });
	$('#uew-playlist-yt .next-carousel__usm').click(function(e) {
		e.preventDefault();
		carouselVideosYT.trigger('next.owl.carousel');
	})
	$('#uew-playlist-yt .prev-carousel__usm').click(function(e) {
		e.preventDefault();
		carouselVideosYT.trigger('prev.owl.carousel', [300]);
	})

	$('#uew-playlist-yt .load-video-yt').on('click', function(e){
		e.preventDefault();
		var idVideo 	= $(e.currentTarget).attr('data-video'),
			title 		= unescape($(e.currentTarget).attr('data-title')),
			description = unescape($(e.currentTarget).attr('data-description'));
		// console.log('clic', idVideo);
		printVideoYT(idVideo, title, description);
	});
}