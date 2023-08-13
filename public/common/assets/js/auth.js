"use strict";

// User authentication
$('#user-login-button').on('click', function (e) {
    e.preventDefault();
    var form = $('#user-login-form');
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response) {
            // Handle success response
        },
        error: function (xhr) {
            // Handle error response
        }
    });
});

// Admin authentication
$('#admin-login-button').on('click', function (e) {
    e.preventDefault();
    var form = $('#admin-login-form');
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (response) {
            // Handle success response
        },
        error: function (xhr) {
            // Handle error response
        }
    });
});

// Other Ajax functions for registration, forgot password, reset password, email verification, etc.
