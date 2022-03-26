@extends('templates.host.main')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">Livestream(Static)</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow" style="height:700px;background: #6441a4;width:800px">
                    <div class="mb-3">

                    <script src= "https://player.twitch.tv/js/embed/v1.js"></script>
	<div class="twitch-container">
    <h4 class="text-light mb-4">Currently Streaming</h3>
  		<div id="twitch-video" class="hide">
  		</div></br>
          <h4 class="text-light mb-4">Live Chat</h3>
        <div class="twitch-chat">
              <!-- Change the CHANNELNAME to the desired twitch handle.  
        Change the parent website in the URL here to the actual place you're running the script from, otherwise twitch will throw an error.  
        Must do versions with and without www. Only put the root URL of your website, no need to put in the specific page.-->
    	<iframe
      	frameborder="0"
      	scrolling="no"
      	src="https://www.twitch.tv/embed/HostTesting123/chat?parent=YOURWEBSITE.com&parent=www.YOURWEBSITE.com" 
      	height="100%"
      	width="100%"
        allow="autoplay">
    	</iframe>
  </div>
  	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var options = {
      channel: "HostTesting123", // TODO: Change this to the streams username you want to embed
      height: 360,
      width: 640,
    };
    var player = new Twitch.Player("twitch-video", options);

    player.addEventListener(Twitch.Player.READY, initiate)

    function initiate() {
      player.addEventListener(Twitch.Player.ONLINE, handleOnline);
      player.addEventListener(Twitch.Player.OFFLINE, handleOffline);
      player.removeEventListener(Twitch.Player.READY, initiate);
    }

    function handleOnline() {
      document.getElementById("twitch-video").classList.remove('hide');
      document.getElementById("twitch-container").classList.remove('hide');
      player.removeEventListener(Twitch.Player.ONLINE, handleOnline);
      player.addEventListener(Twitch.Player.OFFLINE, handleOffline);
      player.setMuted(false);
    }

    function handleOffline() {
      document.getElementById("twitch-video").classList.add('hide');
      document.getElementById("twitch-container").classList.add('hide');
      player.removeEventListener(Twitch.Player.OFFLINE, handleOffline);
      player.addEventListener(Twitch.Player.ONLINE, handleOnline);
      player.setMuted(true);
    }
  </script>

@endsection
