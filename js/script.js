$(document).ready(function() {
  $.ajax('../inc/zapi.php?pagesize=20&cat=hosen', {
    'success' : function(data) {
      console.log(data);
      data.content.forEach(function(item) {
        var imageUrl = item.media.images[0].mediumHdUrl;

        $('body').append('<img src="' + imageUrl + '">');
      });
    }
  });
});
