
(function($) {
  $(function() {

    $('#refresh').click(function(){
        location.reload();
    })

});


})(jQuery)




/*
window.addEventListener('beforeunload', function (e) {
  var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send( 'key=refresh' );
    e.preventDefault();
}, false);
*/
