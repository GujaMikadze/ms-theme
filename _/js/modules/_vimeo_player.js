import Player from "@vimeo/player";
import { Modal } from "bootstrap";
import $ from "jquery";

document.addEventListener("DOMContentLoaded", function () {
  let accBody = document.getElementsByClassName("accordion-js");
  let vimeoDiv = document.getElementsByClassName("vimeo-div");
  let watchedLessons = document.getElementsByClassName("bg-green");

  let doneModal = new Modal($("#doneModal"));

  for (let i = 0; i < vimeoDiv.length; i++) {
    let vimeoId = vimeoDiv[i].getAttribute("data-vimeo-id");
    let userId = vimeoDiv[i].getAttribute("data-user");
    let postId = vimeoDiv[i].getAttribute("data-post");

    var options = {
      id: vimeoId,
      width: 640,
    };

    if (vimeoId.length > 0) {
      var vimeoPlayer = new Player(vimeoId, options);
    }

    vimeoPlayer.on("ended", function () {
      if (accBody.length == watchedLessons.length + 1) {
        doneModal.show();
      }
      let watchedVideo = vimeoId;
      if (vimeoDiv[i + 1]) {
        let nextVideo = vimeoDiv[i + 1].getAttribute("data-vimeo-id");
        var section = $(`div[data-video-id="${nextVideo}"`).parent()[0].id;
        for (let j = 0; j < accBody.length; j++) {
          if (accBody[j].getAttribute("data-video-id") === vimeoId) {
            accBody[j].classList += " bg-green";
          }
        }

        let data = {
          action: "meta_update",
          video: watchedVideo,
          nextvid: nextVideo,
          user: userId,
          post: postId,
          section: section,
        };
        $.ajax({
          type: "POST",
          url: "http://sweeftacademy.local/wp-admin/admin-ajax.php",
          data: data,
          nonce: nonce,
        });
      } else {
        let data2 = {
          action: "meta_update",
          video: vimeoId,
          nextvid: vimeoDiv[0].getAttribute("data-vimeo-id"),
          user: userId,
          post: postId,
          section: $(
            `div[data-video-id="${vimeoDiv[0].getAttribute("data-vimeo-id")}"`
          ).parent()[0].id,
        };
        $.ajax({
          type: "POST",
          url: "http://sweeftacademy.local/wp-admin/admin-ajax.php",
          data: data2,
          nonce: nonce,
        });
        for (let x = 0; x < accBody.length; x++) {
          if (accBody[x].getAttribute("data-video-id") === vimeoId) {
            accBody[x].classList += " bg-green";
          }
        }
        if (accBody.length == watchedLessons.length) {
          doneModal.show();
        }
      }
    });
  }
});
