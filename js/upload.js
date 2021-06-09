
document.getElementById('labelfile').innerHTML = 'Clique para selecionar um ficheiro!';

$(document).ready(
    function () {
        $('input:file').change(
            function () {
                if ($(this).val()) {
                    $('input:submit').attr('disabled', false).attr('class', "btn btn-primary");
                }
            }
        );
    });

$('#myfile').change(
    function () {
        var i = $(this).prev('label').clone();
        var file = $('#myfile')[0].files[0].name;
        $(this).prev('label').text(file);
    });

