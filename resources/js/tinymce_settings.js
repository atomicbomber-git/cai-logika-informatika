import file_picker_callback from './file_picker_callback'

let tinymce_settings = {
    selector: '#konten',
    body_class: 'tinymce-editor',
    plugins: 'lists,image,imagetools,link,media',
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
