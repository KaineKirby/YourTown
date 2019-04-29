
function addComment() {
  var rating = $('input[name=stars]:checked').val();
  var id = getServiceID("id");
  var commentTxt = $("#newComment").val();
  if(commentTxt != "" && rating != null) {
    $.ajax(
      'php/submit_rating.php?id=' + id + "&rating=" + rating + "&comment=" + encodeURIComponent(commentTxt), {
        success: function(){
          alert('Your comment was successfully added!');
          getComments();
        },
        error: function() {
          alert('There was some error performing the AJAX call!');
        }
    });
  }
}
function getServiceID(variable) {
  var currURL = decodeURIComponent(window.location.search.substring(1));
  var urlValues = currURL.split('&');


  for (var i = 0; i < urlValues.length; i++) {
    var variableName = urlValues[i].split('=');

    if (variableName[0] === variable) {

      return variableName[1] === undefined ? true : variableName[1];
    }
  }
}

function getComments() {
  var id = getServiceID("id");
  var updateComments = function(data) {
    $("#comments").html(data);
    if(data == "") {
      $("#comments").html("No reviews yet...");
    }
  };
  $.ajax(
    'php/load_comments.php?id=' + id, {
      success: updateComments,
      error: function() {
        alert('There was some error performing the AJAX call!');
      }
  });
}
$(function() {
  getComments();
  $("#commentBtn").click(function() {
    addComment();
  });
});