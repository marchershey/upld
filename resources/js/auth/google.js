function googleSuccess(googleUser) {
    console.log(googleUser.getBasicProfile());
}
function googleFailure(error) {
    console.log(error);
}
function googleRenderButton() {
    gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'setText': 'test',
        'theme': 'dark',
        'onsuccess': googleFailure,
        'onfailure': googleFailure
    });
}