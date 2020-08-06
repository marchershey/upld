/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    window.slider = require('jquery-ui/ui/widgets/slider');
    window.Popper = require('popper.js').default;
    window.moment = require('moment');
    require('moment-duration-format');

    require('bootstrap');
    require('./auth/google.js');
    window.videojs = require('video.js/dist/video');
    require('videojs-offset');
    require('./videojs-controls.js');

    window.Uppy = require('@uppy/core');
    window.FileInput = require('@uppy/file-input');
    window.ProgressBar = require('@uppy/progress-bar');
    window.XHRUpload = require('@uppy/xhr-upload')

    // window.Dropzone = require('dropzone/dist/dropzone');
    // require('dropzone');
    // window.Swal = require('sweetalert2');
    // window.Toast = Swal.mixin({
    //     toast: true,
    //     position: 'bottom',
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     onOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // })
} catch (e) { }


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


// $(function () {
//     var is_touch_device = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch;
//     $('[data-toggle="popover"]').popover({
//         trigger: is_touch_device ? "click" : "hover"
//     });
//     $('[data-toggle="tooltip"]').tooltip();

//     // $('.toast').toast('show');

//     $(".show-toast").click(function () {
//         $("#myToast").toast({
//             delay: 3000
//         }).toast('show');
//     });

// })