$(document).ready(function(){
    $('.add-user-btn').click(function(){

        $('.add-user-admin').show()
        $('.add-book').hide()
    });

    $('.add-book-btn').click(function(){
        $('.add-user-admin').hide();
        $('.add-book').show();
    });

});