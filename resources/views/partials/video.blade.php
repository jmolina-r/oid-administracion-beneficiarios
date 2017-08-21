<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div id="{{$url}}"></div>
</div>



<script>
    // Load the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // Replace the 'ytplayer' element with an <iframe> and
    // YouTube player after the API code downloads.
    var player;
    function onYouTubePlayerAPIReady() {
        player = new YT.Player('{{$url}}', {
            height: '320',
            width: '100%',
            videoId: '{{$url}}',
            playerVars: {
                autoplay: 0,
                controls: 0,
                disablekb: 1,
                fs: 1,
                rel: 0,
                showinfo: 0
            }
        });
    }
</script>