
$(function() {
    var editor = new MediumEditor('.editable', {
        buttons: ['bold', 'italic', 'anchor', 'header1'],
        disableDoubleReturn: true
    });
    $('.editable').on('input', function() {
        console.log(arguments);
        console.log($(this).serialize());
        console.log(editor.serialize());
    });
});
