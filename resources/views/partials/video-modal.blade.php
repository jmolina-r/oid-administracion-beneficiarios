<div class="modal-custom">
    <div class='modal fade' id='video' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>×</button>
                    <h3 class='modal-title' id='myModalLabel'>Video Tutorial - {{$titulo}}</h3>
                </div>
                <div class='modal-body'>
                    <div id="ytplayer"></div>
                </div>
                <div class='modal-footer'>
                    <span class="pull-left">Para detener, haga clic sobre el video</span>                    
                    <button class='btn btn-default' data-dismiss='modal' type='button'>Salir</button>
                </div>
            </div>
        </div>
    </div>
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
        player = new YT.Player('ytplayer', {
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