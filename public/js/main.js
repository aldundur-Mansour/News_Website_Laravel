const csrfx = document.getElementsByName("_token")[0].value ;
3
ClassicEditor
    .create( document.querySelector( '.editor' ), {

        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'outdent',
                'indent',
                '|',
                'imageInsert',

                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo',
                '_',
                'findAndReplace',
                'fontColor',
                'fontFamily',
                'fontBackgroundColor',
                '|',
                'fontSize',
                'highlight',
                'horizontalLine',
                'imageUpload',
                'strikethrough',
                'alignment',
                'textPartLanguage'
            ]
        },
        language: 'en-au',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                'linkImage'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells',
                'tableCellProperties'
            ]
        },
        licenseKey: '',
        mediaEmbed:{previewsInData: true},
        simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: '/laravel-filemanager/upload?type=Images&_token='+`${csrfx}`,
            // Enable the XMLHttpRequest.withCredentials property.
            withCredentials: true,

        }



    } )
    .then( editor => {
        window.editor = editor;

    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: etyundlfe5c0-kb5c51b9db69' );
        console.error( error );
    } );



