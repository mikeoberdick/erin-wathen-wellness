jQuery(document).ready(function( $ ) {

//Automatically generate filler content height to ensure footer is on bottom of the page
$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

//Homepage Press Slider
$('#pressSlider').owlCarousel({
	items: 5,
	margin: 25,
	loop: true,
	dots: false,
	autoplay: true,
	slideTransition: 'linear',
	autoplayTimeout: 4000,
	autoplaySpeed: 4000,
	autoplayHoverPause : false,
	smartSpeed: 4000,
	fluidSpeed: true,
});

//Homepage Testimonial Slider
	//Empty object where we can store current item's index before drag
var transient = {};
$('#testimonialSlider').owlCarousel({
    slideBy: 'page',
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        }
    },
    onDrag: onDrag.bind(transient),
    onDragged: onDragged.bind(transient),


});

function onDrag(event) {
  this.initialCurrent = event.relatedTarget.current();
}

function onDragged(event) {
  var owl = event.relatedTarget;
  var draggedCurrent = owl.current();

  if (draggedCurrent > this.initialCurrent) {
    owl.current(this.initialCurrent);
    owl.next();
  } else if (draggedCurrent < this.initialCurrent) {
    owl.current(this.initialCurrent);
    owl.prev();
  }
}

//If we are on the video page
if ( $( "#videoSlider" ).length ) {

//Declare video as a global variable
var video = {};

//YouTube Initial API call to get Playlist ID NEED TO CREATE CONDITIONAL TO ONLY RUN ON VIDEOS PAGE
	$.get(
		"https://www.googleapis.com/youtube/v3/channels",{
			part: 'contentDetails',
			id: 'UCeNI73s_l_vJ_iiKTnUyiUA',
			key: 'AIzaSyD0Fi22hUGXGtDlNdn6EiRrdzX_IC43kqI'},
		function(data) {
			$.each(data.items, function(i, item) {
				video.pid = item.contentDetails.relatedPlaylists.uploads;
				getVids(video.pid);
			})
		}
	);

	function getVids(pid) {
		$.get(
		"https://www.googleapis.com/youtube/v3/playlistItems",{
			part: 'snippet',
			maxResults: 5,
			playlistId: pid,
			key: 'AIzaSyD0Fi22hUGXGtDlNdn6EiRrdzX_IC43kqI'},
		function(data) {
			var output;
			video.token = data.nextPageToken;
			$.each(data.items, function(i, item) {
				thumb = item.snippet.thumbnails.medium.url;
				videoTitle = item.snippet.title;
				videoId = item.snippet.resourceId.videoId;
				output = '<div class = "video"><a data-id="'+videoId+'"><img class = "mb-3" src="'+thumb+'"><h5>'+videoTitle+'</h5></a></div>';

				// adds an item before the first item
				$('#videoSlider').trigger('add.owl.carousel', output).trigger('refresh.owl.carousel');
				})
			}
		);
	}

//Video page YouTube video carousel
var owl = $('#videoSlider');
owl.owlCarousel({
	items: 4,
	margin: 25,
	nav: true,
	dots: false,
	navElement: 'div',
	navText: ["<i class='fa fa-arrow-left' aria-hidden='true'></i>","<i class='fa fa-arrow-right' aria-hidden='true'></i>"],
	onTranslated: loadMoreVids
});

function loadMoreVids(event) {
//vars
	var element   = event.target;         // DOM element, in this example .owl-carousel
    var items     = event.item.count;     // Number of items
    var item      = event.item.index + 1;     // Position of the current item

    console.log('the current slide is '+item+ 'out of '+items);

    if (item === (items - 3)) {

	$.get(
	"https://www.googleapis.com/youtube/v3/playlistItems",{
		part: 'snippet',
		maxResults: 5,
		playlistId: video.pid,
		key: 'AIzaSyD0Fi22hUGXGtDlNdn6EiRrdzX_IC43kqI',
		pageToken: video.token
	},
	function(data) {
		var output;
		video.token = data.nextPageToken;
		$.each(data.items, function(i, item) {
			thumb = item.snippet.thumbnails.medium.url;
			videoTitle = item.snippet.title;
			videoId = item.snippet.resourceId.videoId;
			output = '<div class = "video"><a data-id="'+videoId+'"><img class = "mb-3" src="'+thumb+'"><h5>'+videoTitle+'</h5></a></div>';

			// adds an item before the first item
			$('#videoSlider').trigger('add.owl.carousel', output).trigger('refresh.owl.carousel');
			})
		}
	);
	} //end the conditional
}
} //end of if statement which conditionally loads the script on the video page

//Load the first video into the featured player on page load
$(window).on('load', function() {
	var featureid = $('#videoSlider .video a').first().data('id');
	$("#featuredVideo > iframe").attr("src","https://www.youtube.com/embed/"+featureid+"");
});

//Functionality for videos page to allow click on carousel item and load into main player section
	$('#videoSlider').on('click', '.video a', function(){
    var id = $(this).data("id");
    console.log(id);
    $("#featuredVideo > iframe").attr("src","https://www.youtube.com/embed/"+id+"?rel=&autoplay=1");
	});

});

