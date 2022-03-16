jQuery.extend(jQuery.fn, {
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
            jQuery(this).removeClass('error');
            jQuery(this).addClass('successf');
            return true
        }
    },

    validateEmail: function () {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
            emailToValidate = jQuery(this).val();
        if (!emailReg.test(emailToValidate) || emailToValidate == "") {
            jQuery(this).addClass('error');
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Please enter a valid email address !',
                showConfirmButton: true
            });
            return false
        } else {
            jQuery(this).removeClass('error');
            return true
        }
    },
});


jQuery(document).ready(function ($) {
    $(".slider ").each(function () {
        $(".slide").slick({
            autoplay : false,
            adaptiveHeight:true,
            dots :true,
            dotsClass : "slide__dots",
            slidesToShow : 1,
            rtl:true,
            slidesToScroll : 1,
            prevArrow : '.slicks-controls__prev',
            nextArrow : '.slicks-controls__next',
            centerMode: false
        });
    });

    $("#last-blog-post").each(function () {
        $("#post").slick({
                autoplay : false,
                dots :true,
            dotsClass : "slick-dots",
                slidesToShow : 2,
                slidesToScroll : 1,
            prevArrow : '.slick-prev',
            nextArrow : '.slick-next',
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

        $(".portfolio-slider").slick({
            autoplay : false,
            dots :true,
            dotsClass : "slick-dots",
            slidesToShow : 1,
            slidesToScroll : 1,
            variableWidth: true,
            centerMode: true,
            prevArrow : '.slicks-prev',
            nextArrow : '.slicks-next'
            // responsive: [
            //     {
            //         breakpoint: 576,
            //         settings: {
            //             slidesToShow: 1,
            //             centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
            //             slidesToScroll: 1
            //         }
            //     },
            //     {
            //         breakpoint: 769,
            //         settings: {
            //             slidesToShow: 1,
            //             centerMode: false,
            //             slidesToScroll: 1
            //         }
            //     }
            // ]
        });


    $(".slider-project").slick({
        autoplay : false,
        dots :true,
        rtl:true,
        dotsClass : "slider-project__dots",
        slidesToShow : 1,
        slidesToScroll : 1,
        prevArrow : '.project-slider-control__prev-p',
        nextArrow : '.project-slider-control__next-p'
        // responsive: [
        //     {
        //         breakpoint: 576,
        //         settings: {
        //             slidesToShow: 1,
        //             centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
        //             slidesToScroll: 1
        //         }
        //     },
        //     {
        //         breakpoint: 769,
        //         settings: {
        //             slidesToShow: 1,
        //             centerMode: false,
        //             slidesToScroll: 1
        //         }
        //     }
        // ]
    });



    $(".resome-tab").click(function (e) {
        $this = $(this);
        e.preventDefault();
        $(".resome-content").removeClass("resome-block");
        var display_sec = $this.attr("id");
        display_sec = "#"+display_sec;
        $(display_sec).addClass("resome-block");
        $(".resome-tab").removeClass("active");
        $this.addClass("active");
    });
    $("select.select-res").change(function() {
        var selectedRes = $(this).children("option:selected").val();
        $(".resome-content").removeClass("resome-block");
        selectedRes = "#"+selectedRes;
        $(selectedRes).addClass("resome-block");
    });

    $(".blog-slider-posts").mouseenter(function () {
       $(".post-blog-control").css("display","block");

    }).mouseleave(function () {
        $(".post-blog-control").css("display","none");

    });
    $('[data-toggle="facebook"]').tooltip();
    $('[data-toggle="twitter"]').tooltip();
    $('[data-toggle="linkedin"]').tooltip();
    $('[data-toggle="instagram"]').tooltip();
    $('[data-toggle="telegram"]').tooltip();
    $('[data-toggle="youtube"]').tooltip();
    $('[data-toggle="email"]').tooltip();

    $(document).on('click', '.like-post', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $post_id = $this.data('id');
        var $liked = $this.data('liked');
        if ($liked) {
            Swal.fire("You have already liked this post");
            return 0;
        } else {
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'like_post',
                    post_id: $post_id
                },
                success: function (response) {
                    $this.find('i').text(response.count);
                    $this.data('liked', 1);
                    Swal.fire("thank you!!!", "you liked this post!", "success");

                },
                error: function (response) {

                }
            });
        }
    });


    $(document).on('keyup', '#search_input' , function (e) {
        e.preventDefault();

        var $this = $(this);
        var $keyword = $this.val();
        var $result = $(document).find('#result');
        var request, timeout;
        var processing=false;
        if($this.val().length === 0){
            $result.css('opacity','0');
        }
        timeout = setTimeout(function(){ 
            if (!processing) {
                processing=true;
                request =  $.ajax({
            url: data.ajax_url,
            type: 'post',
            data: {
                action: 'data_fetch', keyword:$keyword
            }, beforeSend: function(xhr){
                // what to do just after the form has been submitted
                $result.html(" ");
               var $spiner = "<img id='preloader' src="+ data.spiner +" />";
                $result.append($spiner).css('opacity','1');
            },
            success: function ( searchResult ) {
                processing=false;
                $result.append(searchResult);

            }
            ,
            complete: function(){
                // what to do after a comment has been added
                $("#preloader").remove();

            }
            });
        }else{
            clearTimeout(timeout);
        }

         } , 3000);
        
        // alert(result);
      
        
    });

    $(document).on('submit', '#contact_form', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $full_name = $this.find('#full_name_contact').val();
        var $email = $this.find('#email_contact').val();
        var $subject = $this.find('#subject').val();
        var $message = $this.find('#message_contact').val();
        var $nonce = $('meta[name="_nonce"]').attr('content');
        var $security = grecaptcha.getResponse(0);
        var button = $('#submit_contact');
        if ($security === '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'confirm reCaptcha is Require !',
                showConfirmButton: true
            });
            return false;
        }
        if ($('#full_name_contact').length)
            $('#full_name_contact').validate();
        if ($('#email_contact').length)
            $('#email_contact').validate();
        if ($('#message_contact').length)
            $('#message_contact').validate();
        if ($('#email_contact').length)
            $('#email_contact').validateEmail();

        if (!button.hasClass('loadingform') && !$('#author').hasClass('error') && !$('#email').hasClass('error') && !$('#comment').hasClass('error')) {

            $.ajax({
                url: data.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'mhd_contact_form',
                    fullname: $full_name,
                    email: $email,
                    subject: $subject,
                    message: $message,
                    captcha: grecaptcha.getResponse(0),
                    nonce: $nonce
                }, beforeSend: function (xhr) {
                    button.addClass('loadingform').val('Loading...');
                }, success: function (response) {
                    if (response.error) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: true
                        })
                    }
                    if (response.success) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true
                        });
                        window.setTimeout(function () {
                            $("#contact_form").trigger("reset");
                        }, 5000);
                    }
                }, error: function (response) {

                }, complete: function () {
                    button.removeClass('loadingform').val('Sent!');
                }
            });
        } else {
            return false;
        }
    });

    $(document).on('click', '.navbar-toggle-category', function (e) {
    e.preventDefault();
    $(".category-menu-section").css("right","0");
    $(".backdrop").css("display","block");
    });
    $(document).on('click', '.backdrop', function (e) {
        $(".category-menu-section").css("right","-21%");
        $(".backdrop").css("display","none");
    })


});