jQuery(document).ready(function( $ ) {

//Automatically generate filler content height to ensure footer is on bottom of the page
$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

//Homepage Press Slider
$('#pressSlider').owlCarousel({
	items: 5,
	margin: 25,
	loop: true,
	dots: false,
	autoPlay: true
});

//Homepage Testimonial Slider
	//Empty object where we can store current item's index before drag
var transient = {};
$('#testimonialSlider').owlCarousel({
	items: 2,
    slideBy: 'page',
    onDrag: onDrag.bind(transient),
    onDragged: onDragged.bind(transient)
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

//Video page YouTube video carousel
$('#videoSlider').owlCarousel({
	items: 4,
	margin: 25,
	nav: true,
	dots: false,
	navElement: 'div',
	navText: ["<i class='fa fa-arrow-circle-left' aria-hidden='true'></i>","<i class='fa fa-arrow-circle-right' aria-hidden='true'></i>"]
});

//

//YouTube API call
//if (top.location.pathname === 'http://eww.d4tw/videos/') {
	$.get(
		"https://www.googleapis.com/youtube/v3/channels",{
			part: 'contentDetails',
			id: 'UCeNI73s_l_vJ_iiKTnUyiUA',
			key: 'AIzaSyD0Fi22hUGXGtDlNdn6EiRrdzX_IC43kqI'},
		function(data) {
			$.each(data.items, function(i, item) {
				pid = item.contentDetails.relatedPlaylists.uploads;
				getVids(pid);
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
			$.each(data.items, function(i, item) {
				console.log(item);
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

	//Functionality for videos page to allow click on carousel item and load into main player section
	$('#videoSlider').on('click', '.video a', function(){
    var id = $(this).data("id");
    console.log(id);
    $("#featuredVideo > iframe").attr("src","https://www.youtube.com/embed/"+id+"?rel=&autoplay=1");
	});

});