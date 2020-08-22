/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('@fortawesome/fontawesome-free/js/all');
require('./bootstrap');

require('alpinejs');
require('trix');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

// Load TinyMCE WYSIWYG Editor
require('tinymce');
window.tinymce_settings = require("./tinymce_settings").default;
window.tinymce_file_picker_callback = require("./file_picker_callback");
window.displayTrixAttachments = require("./trix_helpers").displayTrixAttachments;
window.registerTrixEventHandlers = require("./trix_helpers").registerTrixEventHandlers;

import Swal from "sweetalert2";
window.Swal = Swal;