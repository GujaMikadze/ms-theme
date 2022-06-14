import $ from "jquery";

document.addEventListener("DOMContentLoaded", function () {
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get The input
  var input = document.getElementById("searchInput");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function () {
    modal.style.display = "flex";
    input.focus();
	$('body').style.overflow = "hidden";
  };

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
	$('body').style.overflow = "auto";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
		modal.style.display = "none";
		$('body').style.overflow = "auto";
    }
  };

  $("#searchInput").keyup(function() {
	if ($(this).val().length > 2) {
		$("#datafetch").show();
	  } else {
		$("#datafetch").hide();
	  } 
	jQuery.ajax({
		url: "http://sweeftacademy.local/wp-admin/admin-ajax.php",
		type: 'post',
		data: {
			action: 'data_fetch',
			keyword: jQuery('#searchInput').val()
		},
		beforeSend: function(){
			$("#loading").show();
			console.log("ainte");
		  },
		  complete: function(){
			$("#loading").hide();
			console.log("chaqri");
		  },
		success: function(data) {
			jQuery('#datafetch').html(data);
			console.log('hello');
		}
	})
  });
});
