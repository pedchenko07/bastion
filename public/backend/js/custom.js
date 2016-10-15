$(document).ready(function(){
    $('.slider-add').on('click', function(e){
        e.preventDefault();
        var addRow = $('.slider-file').clone();
        addRow.removeClass('slider-file');
        $('.sliders-table').append(addRow);
    });
    $('.form-slider').on('submit', function(e){
        //e.preventDefault();
        //console.log('123');
    });
});
