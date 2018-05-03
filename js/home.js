var div = document.getElementById("dom-target");
var numRows = div.textContent.replace(/\s+/, "");

if (numRows > 10) {
  numPages = Math.round(numRows/10);
  for (i=0; i<numPages; i++) {
    pageNum = i + 2;
    $(".paginatorUL").append('<li>'+pageNum+'</li>');
  }
  $('.paginator').removeClass('hidePaginator');
}
