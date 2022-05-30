import Player from "@vimeo/player";
import $  from 'jquery';

document.addEventListener("DOMContentLoaded", function () {
  var accBody = document.getElementsByClassName("accordion-js");
  var vimeoDiv = document.getElementsByClassName("vimeo-div");

  for (let i = 0; i < vimeoDiv.length; i++) {
      let vimeoId = vimeoDiv[i].getAttribute('data-vimeo-id');
      let userId = vimeoDiv[i].getAttribute('data-user');
      let postId = vimeoDiv[i].getAttribute('data-post');

        var options = {
            id: vimeoId,
            width: 640,
        }

        if(vimeoId.length > 0) {
            var vimeoPlayer = new Player(vimeoId, options);
        }

        vimeoPlayer.on('ended', function () {
            let watchedVideo = vimeoId;
            let nextVideo = vimeoDiv[i+1].getAttribute('data-vimeo-id');
            var section = $(`div[data-video-id="${nextVideo}"`).parent()[0].id;
            for(let i = 0; i < accBody.length; i++) {
                if(accBody[i].getAttribute('data-video-id') === vimeoId) {
                    accBody[i].classList += " bg-green";
                }
            };
            
            let data = {
                'action': "meta_update",
                'video': watchedVideo,
                'nextvid': nextVideo,
                'user': userId,
                'post': postId,
                'section': section
            };
            $.ajax({
                type: "POST",
                url: 'http://sweeftacademy.local/wp-admin/admin-ajax.php',
                data: data,
                nonce: nonce,
                beforeSend: function( xhr ) {
                    console.log("gagzavnamdis");
                },
                success: function (response) {
                    console.log(response);
                }
            });
        });
        
    }
});
