$(document).on("click", ".regist-submit", function (ev) {
    $('.close-modal').modal().click();
    swal.fire({
        title: '<img src="/assets/img/1488.gif"></img>',
        text: "Loading...",
        showCancelButton: false,
        showConfirmButton: false,
        timer: 6000,
        onOpen: () => { ajaxCallRegister(); }
    });
});

$(document).on("click", ".already-acc", function (ev) { $('.close-modal').modal().click(); });

$(document).on("click", ".login-submit", function (ev) {
    $('.close-modal').modal().click();
    swal.fire({
        title: '<img src="/assets/img/1488.gif"></img>',
        text: "Loading...",
        showCancelButton: false,
        showConfirmButton: false,
        timer: 6000,
        onOpen: () => { ajaxCallLogin(); }
    });
});

function ajaxCallLogin() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData($('#sing-in')[0]);
    $.ajax({
        type: "POST",
        url: "login",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        dataType: "JSON",
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == false) {
                swal.fire({
                    title: 'warning',
                    text: "Login failed!",
                    timer: false,
                    type: 'warning'
                }).then().catch(swal.noop);
            } else {
                swal.fire({
                    title: 'success',
                    text: "Login successfully!",
                    timer: false,
                    type: 'success'
                }).then().catch(swal.noop);

                showFromHTMLs(response); // show from create link
            }
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
            $('.close-modal').modal().click();
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                type: 'error',
                text: 'Something went wrong!',
            }).then().catch(swal.noop);
        }
    });
}

function ajaxCallRegister() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData($('#new-user')[0]);
    $.ajax({
        type: "POST",
        url: "register",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        dataType: "JSON",
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == false) {
                swal.fire({
                    title: 'warning',
                    text: "Sign up failed!",
                    timer: false,
                    type: 'warning'
                }).then().catch(swal.noop);
            } else {
                swal.fire({
                    title: 'success',
                    text: "Sign up successfully!",
                    timer: false,
                    type: 'success'
                }).then().catch(swal.noop);
            }

            showFromHTMLs(response); // show from create link

            $('.close-modal').modal().click();
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
            $('.close-modal').modal().click();
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                type: 'error',
                text: 'Something went wrong!',
            }).then().catch(swal.noop);
        }
    });
}

$(document).on("click", ".create-short-url", function (ev) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formData = new FormData();
    formData.append('original_url', $("[name='original_url']").val());
    loadings(true); // loading
    $.ajax({
        type: "POST",
        url: "shorturl",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        dataType: "JSON",
        processData: false,
        contentType: false,
        success: function (response) {
            loadings(false); // loading
            Swal.close();
            if (response.status == false) {
                swal.fire({
                    title: 'warning',
                    text: "Create short urls failed!",
                    timer: false,
                    type: 'warning'
                }).then().catch(swal.noop);
            } else {
                Swal.fire({
                    type: 'success',
                    title: 'Create short urls success!',
                    input: 'text',
                    inputValue: response.shortened_url,
                    timer: false,
                }).then().catch(swal.noop);
            }
            $('.close-modal').modal().click();
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
            $('.close-modal').modal().click();
            loadings(false); // loading
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                type: 'error',
                text: 'Something went wrong!',
            }).then().catch(swal.noop);
        }
    });
});

function showFromHTMLs(data) {
    // for from create link
    $('.sign-up-form').empty();
    var fromHTMLs = '<input type="url" class="form-control"' +
        'placeholder="Example: http://super-long-link.com/shorten-it" name="original_url">' +
        '<input type="button" class="btn btn-primary create-short-url" value="Create your page">';
    $('.sign-up-form').append(fromHTMLs);

    let checkRoleAdmin = "";
    if (data.role == "Admin") checkRoleAdmin = '<li><a href="admin">Dashboards</a></li>';

    // for navigator
    $('.normal-nav').empty();
    var fromHTMLs = '<nav id="navmenu" class="navmenu mr-4" style=" margin-top: -10px !important; ">' +
        '<ul style=" width: 150px !important; ">' +
        '<li class="dropdown has-dropdown">' +
        '<a href="#"><span>' + data.data + '</span> <i class="bi bi-chevron-down"></i></a>' +
        '<ul class="dd-box-shadow" style="padding: 5px 5px !important;right: 0px !important;width: 150px !important;">' +
        '<li><a href="logout">Sign out</a></li>' +
        '<li><a href="shorthistory">Short history</a></li>' +
        '<li><a href="/">Crate short url</a></li>' +
        checkRoleAdmin +
        '</ul>' +
        '</li>' +
        '</ul>' +
        '</nav>';
    $('.normal-nav').append(fromHTMLs);
}

function loadings(type) {
    if (type) {
        $('.sign-up-form').empty();
        var Htmls = '<input type="url" class="form-control"' +
            'placeholder="Example: http://super-long-link.com/shorten-it" name="original_url">' +
            ' <button class="btn btn-primary" type="button" disabled>' +
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
            '<span class="visually-show pl-2">Loading...</span>' +
            '</button>';
        $('.sign-up-form').append(Htmls);
    } else {
        $('.sign-up-form').empty();
        var fromHTMLs = '<input type="url" class="form-control"' +
            'placeholder="Example: http://super-long-link.com/shorten-it" name="original_url">' +
            '<input type="button" class="btn btn-primary create-short-url" value="Create your page">';
        $('.sign-up-form').append(fromHTMLs);
    }
}

