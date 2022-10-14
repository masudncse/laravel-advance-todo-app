import './bootstrap';

window.BASE_URL = $("meta[name='base-url']").attr("content");
window.CSRF_TOKEN = $("meta[name='csrf-token']").attr("content");

$(document).ready(function () {
    /**
     * Ajax change todo status
     */
    $('.ajaxChangeTodoStatus').on('click', function () {
        let el = $(this);
        let link = el.data('href');

        if (el.is(':checked')) {
            el.closest('li').addClass('completed');
        } else {
            el.closest('li').removeClass('completed');
        }

        $.ajax({
            url: link,
            type: 'PUT',
            dataType: 'json',
            data: {
                "_token": CSRF_TOKEN,
            },
        }).done(function (response) {

            // Toast notification
            if (response.status !== undefined && response.status === true) {
                $.toast({
                    heading: 'Success',
                    text: response.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f96868',
                    position: 'top-right',
                });

                // Remove the record
                if (response.hide !== undefined && response.hide !== false) {
                    //
                }
            } else {
                $.toast({
                    heading: 'Warning',
                    text: response.message,
                    showHideTransition: 'slide',
                    icon: 'warning',
                    loaderBg: '#57c7d4',
                    position: 'top-right'
                });
            }

            // Redirect location
            if (response.redirect !== undefined && response.redirect.length > 0) {
                document.location.href = response.redirect;
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $.toast({
                heading: 'Error',
                text: JSON.parse(jqXHR.responseText)?.message ?? errorThrown,
                showHideTransition: 'slide',
                icon: 'error',
                loaderBg: '#f2a654',
                position: 'top-right'
            });
        });

    });

    /**
     * Ajax destroy record
     */
    $('.ajaxDestroyRecord').on('click', function (e) {
        e.preventDefault();

        let el = $(this);
        let link = el.attr('href');

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3f51b5',
            cancelButtonColor: '#ff4081',
            confirmButtonText: 'Great ',
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true
                }
            }
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        "_token": CSRF_TOKEN,
                    },
                }).done(function (response) {

                    // Toast notification
                    if (response.status !== undefined && response.status === true) {
                        $.toast({
                            heading: 'Success',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success',
                            loaderBg: '#f96868',
                            position: 'top-right',
                        });

                        // Remove the record
                        if (response.hide !== undefined && response.hide !== false) {
                            el.closest('li').slideUp(200, function () {
                                el.parent('li').remove();
                            });
                        }
                    } else {
                        $.toast({
                            heading: 'Warning',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'warning',
                            loaderBg: '#57c7d4',
                            position: 'top-right'
                        });
                    }

                    // Redirect location
                    if (response.redirect !== undefined && response.redirect.length > 0) {
                        document.location.href = response.redirect;
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    $.toast({
                        heading: 'Error',
                        text: JSON.parse(jqXHR.responseText)?.message ?? errorThrown,
                        showHideTransition: 'slide',
                        icon: 'error',
                        loaderBg: '#f2a654',
                        position: 'top-right'
                    });
                });
            }
        });
    });

    /**
     * Filter tab items
     */
    $('.tab-list button').on('click', function (e) {
        e.preventDefault();

        // Remove active classes
        $('.tab-list button').each(function () {
            $(this).removeClass('active')
        });

        let el = $(this);

        // Set active class
        el.addClass('active');

        let category = el.data('filter');

        // Toggle todo list item
        $('.todo-list li').each(function () {
            let item = $(this);

            if (category === '*') {
                item.slideDown('slow')
            } else if (category === item.data('category')) {
                item.slideDown('slow')
            } else {
                item.slideUp('slow')
            }
        });
    });
});
