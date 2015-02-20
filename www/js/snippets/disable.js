$(function() {
    $('.btn-facebook, .btn-google').click(function() {
        $('.btn-submit').prop('disabled', true);
        $('.modal-footer').css('pointer-events', 'none');
    });
});
