import file_picker_callback from './file_picker_callback'

let tinymce_settings = {
    selector: '#konten',
    body_class: 'tinymce-editor',
    plugins: 'lists,image,imagetools,link,media',
    image_caption: true,
    file_picker_callback: file_picker_callback,
    // media_url_resolver: function (data, resolve/*, reject*/) {
    //     var reader = new FileReader();
    //     console.log(data.url)
    //
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('GET', data.url, true);
    //     xhr.responseType = 'blob';
    //     xhr.onload = function(e) {
    //         if (this.status === 200) {
    //             var myBlob = this.response;
    //             console.log(myBlob)
    //         }
    //     };
    //     xhr.send();
    //
    //     reader.readAsDataURL(data.url);
    // },
    image_class_list: [
        {title: 'Responsive Image', value: 'img-fluid'},
    ],
    toolbar: [
        'undo redo | link | styleselect | bold italic | numlist bullist | alignleft aligncenter alignright | image | media'
    ],
    height: 400,
}

export default tinymce_settings
