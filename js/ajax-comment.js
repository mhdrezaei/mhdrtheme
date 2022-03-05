/*
 * Let's begin with validation functions
 */
jQuery.extend(jQuery.fn, {
    /*
     * check if field value lenth more than 3 symbols ( for name and comment )
     */
    validate: function () {
        if (jQuery(this).val().length < 3) {
            jQuery(this).addClass('error');
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'All fields marked with star(*) are required !',
                showConfirmButton: true
            });
            return false
        } else {
            jQuery(this).removeClass('error');return true}
    },
    /*
     * check if email is correct
     * add to your CSS the styles of .error field, for example border-color:red;
     */
    validateEmail: function () {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
            emailToValidate = jQuery(this).val();
        if (!emailReg.test( emailToValidate ) || emailToValidate == "") {
            jQuery(this).addClass('error');
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Please enter a valid email address !',
                showConfirmButton: true
            });
            return false
        } else {
            jQuery(this).removeClass('error');return true
        }
    },
});

jQuery(function($){

    // $('.comment-reply-link').click(function (e) {
    //     e.preventDefault();
    //     var $this = $(this);
    //     var $loc = $this.attr('href');
    //     window.location =$loc;
    //
    // });
    // $('#cancel-comment-reply-link').click(function (e) {
    //     e.preventDefault();
    //     var $this = $(this);
    //     var $loc = $this.attr('href');
    //     window.location =$loc;
    //
    // });

    /*
     * On comment form submit
     */
    $( '#commentform' ).submit(function(){

        var $this = $(this);

        var $author = $this.find('#author').val();
        var $email = $this.find('#email').val();
        var $security = grecaptcha.getResponse(0);
        if ($security===''){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'confirm reCaptcha is Require !',
                showConfirmButton: true
            });
            return false;
        }


        // define some vars
        var button = $('#submit'), // submit button
            respond = $('#respond'), // comment form container
            commentlist = $('.comment-list'), // comment list container
            cancelreplylink = $('#cancel-comment-reply-link');

        // if user is logged in, do not validate author and email fields
        if( $( '#author' ).length )
            $( '#author' ).validate();


        if( $( '#email' ).length )
            $( '#email' ).validateEmail();

        // validate comment in any case
        $( '#comment' ).validate();

        // if comment form isn't in process, submit it
        if ( !button.hasClass( 'loadingform' ) && !$( '#author' ).hasClass( 'error' ) && !$( '#email' ).hasClass( 'error' ) && !$( '#comment' ).hasClass( 'error' ) ){

            // ajax request
            $.ajax({
                type : 'POST',
                url : misha_ajax_comment_params.ajaxurl, // admin-ajax.php URL
                data: $(this).serialize() + '&action=ajaxcomments', captcha : grecaptcha.getResponse(0), // send form data + action parameter
                beforeSend: function(xhr){
                    // what to do just after the form has been submitted
                    button.addClass('loadingform').val('Loading...');
                },
                error: function (request, status, error) {
                    if( status == 500 ){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error while adding comment !',
                            showConfirmButton: true
                        });
                    } else if( status == 'timeout' ){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Server doesn\'t respond !',
                            showConfirmButton: true
                        });
                    }else if(error =='true'){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: request.responseText,
                            showConfirmButton: true
                        });
                        return false;
                    }
                    else {
                        // process WordPress errors
                        var wpErrorHtml = request.responseText.split("<p>"),
                            wpErrorStr = wpErrorHtml[1].split("</p>");

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: wpErrorStr ,
                            showConfirmButton: true
                        });
                        return false;
                    }
                },
                success: function ( addedCommentHTML ) {
                    if(addedCommentHTML.error){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: addedCommentHTML.message,
                            showConfirmButton: true
                        });
                        return false;
                  }

                    // if this post already has comments
                    if( commentlist.length > 0 ){

                        // if in reply to another comment
                        if( respond.parent().hasClass( 'comment' ) ){

                            // if the other replies exist
                            if( respond.parent().children( '.children' ).length ){
                                respond.parent().children( '.children' ).append( addedCommentHTML );
                            } else {
                                // if no replies, add <ol class="children">
                                addedCommentHTML = '<ol class="children">' + addedCommentHTML + '</ol>';
                                respond.parent().append( addedCommentHTML );
                            }
                            // close respond form
                            cancelreplylink.trigger("click");
                        } else {
                            // simple comment
                            commentlist.append( addedCommentHTML );
                        }
                    }else{
                        // if no comments yet
                        addedCommentHTML = '<ol class="comment-list" style="padding-inline-start:0;margin: 10px;">' + addedCommentHTML + '</ol>';
                        respond.before( $(addedCommentHTML) );
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your comment has been successfully submitted !',
                            showConfirmButton: true,
                        });
                    }
                    // clear textarea field
                    $('#comment').val('');
                },
                complete: function(){
                    // what to do after a comment has been added
                    button.removeClass( 'loadingform' ).val( 'Post Comment' );

                }
            });
        }
        return false;
    });
});