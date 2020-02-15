import file_picker_callback from './file_picker_callback'

let tinymce_settings = {
    selector: '#konten',
    body_class: 'tinymce-editor',
    plugins: 'lists,image,imagetools,link,media',
    file_picker_callback: file_picker_callback,

    media_url_resolver: function (data, resolve, reject) {
        fetch(data.url)
            .then(response => {
                return response.blob()
            })
            .then(blob => {
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    resolve({
                        html: `<div> <video controls="controls" autobuffer="autobuffer" autoplay="autoplay"> <source src="${base64data}">  </video> </div>`
                    })
                }
            })
            .catch()
    },

    image_caption: true,
    image_class_list: [
        {title: 'Responsive Image', value: 'img-fluid'},
    ],
    toolbar: [
        'undo redo | link | styleselect | bold italic | numlist bullist | alignleft aligncenter alignright | image | media'
    ],
    height: 400,
}

export default tinymce_settings
