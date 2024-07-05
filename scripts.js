$(document).ready(function() {
    $('#search-bar').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
