$(document).ready(function(){
    $('.add-user-btn').click(function(){

        $('.add-user-admin').show()
        $('.add-book').hide()
        $('.category-form--table').hide()
    });

    $('.add-book-btn').click(function(){
        $('.add-user-admin').hide();
        $('.category-form--table').hide()
        $('.add-book').show();
    });

    $('.add-category-btn').click(function(){
        $('.category-form--table').show();
        $('.add-book').hide();
        $('.add-user-admin').hide();
    });
});