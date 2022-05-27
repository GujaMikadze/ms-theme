document.addEventListener("DOMContentLoaded", function () {
  var accBody = document.getElementsByClassName("accordion-js");
  var vimeoDivs = document.getElementsByClassName("vimeo-div");

  function openVideo() {
    for (let i = 0; i < vimeoDivs.length; i++) {
      if (
        this.getAttribute("data-video-id") === vimeoDivs[i].getAttribute("id")
      ) {
        var current = document.getElementsByClassName("vimeo-active");
        if(current) {
          current[0].className = current[0].className.replace(
            " vimeo-active",
            ""
          );
        }
        vimeoDivs[i].className += " vimeo-active";
      }
    }
    var current = document.getElementsByClassName("course-active");
    current[0].className = current[0].className.replace(" course-active", "");
    this.className += " course-active";
  }

  for (i = 0; i < accBody.length; i++) {
    accBody[i].addEventListener("click", openVideo);
  }
});
