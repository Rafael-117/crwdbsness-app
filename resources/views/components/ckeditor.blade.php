<script>

document.querySelectorAll('.editor').forEach(logArrayElements);
function logArrayElements(element, index, array) {

    ClassicEditor
        .create(element, {
            licenseKey: '',
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error(
                'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
            console.warn('Build id: t94173f5mwg3-r7awnirzpz9p');
            console.error(error);
        });

}



   




</script>
