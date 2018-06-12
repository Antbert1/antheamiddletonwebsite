var div = document.getElementById("dom-target");
try {
    var numRows = div.textContent.replace(/\s+/, "");
}
catch(err) {
    var numRows = null;
}
try {
    var ext = document.getElementById("dom-target2").innerHTML.trim();
}
catch(err) {
    var ext = null;
}
// var numRows = div.textContent.replace(/\s+/, "");
// var ext = document.getElementById("dom-target2").innerHTML.trim();
// console.log(ext);
if (numRows > 10) {
  numPages = Math.floor(numRows/10);
  for (i=0; i<numPages; i++) {
    pageNum = i + 2;
    // $(".paginatorUL").append('<li>'+pageNum+'</li>');
    // $(".paginatorUL").append("<li><a href='.?action=page&amp;startPoint="+pageNum+"'>"+pageNum+"</a></li>");
    $(".paginatorUL").append("<li><a href='"+ext+"nav/page/"+pageNum+"'>"+pageNum+"</a></li>");
  }
  $('.paginator').removeClass('hidePaginator');
}

$( ".popupImage" ).click(function(e) {
  imgPath = $(this).find('img').attr('src');
  $('.modalImage').attr("src", imgPath);

  $('#imagePopup').modal('show');
});

$('.commentTickbox').click(function(e) {
  $(this).removeClass('fa-square');
  $(this).addClass('fa-check-square');
});

  //
  // "<li><a href='.?action=page&amp;startPoint="+pageNum+"'>"+pageNum+"</a></li>"
