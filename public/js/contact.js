$(document).ready(function () {

    (function ($) {
        "use strict";


        jQuery.validator.addMethod('answercheck', function (value, element) {
            return this.optional(element) || /^\bcat\b$/.test(value)
        }, "type the correct answer -_-");

        $(function () {
            $('#contactForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    subject: {
                        required: true,
                        minlength: 4
                    },
                    number: {
                        required: true,
                        minlength: 5
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 20
                    }
                },
                messages: {
                    name: {
                        required: "Да ладно, у тебя есть имя, не так ли?",
                        minlength: "Ваше имя должно состоять как минимум из 15 символов"
                    },
                    subject: {
                        required: "Да ладно, у тебя есть тема, не так ли?",
                        minlength: "Ваша тема должна состоять как минимум из 5 символов"
                    },
                    number: {
                        required: "Да ладно, у тебя есть номер, не так ли?",
                        minlength: "Ваш номер должен состоять как минимум из 11 символов"
                    },
                    email: {
                        required: "Напишите электронную почту или сообщения чтобы отправить форму."
                    },
                    message: {
                        required: "Вам нужно что-то написать, чтобы отправить эту форму.",
                        minlength: "Вот и все? Действительно?"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "contact_process.php",
                        success: function () {
                            $('#contactForm :input').attr('disabled', 'disabled');
                            $('#contactForm').fadeTo("slow", 1, function () {
                                $(this).find(':input').attr('disabled', 'disabled');
                                $(this).find('label').css('cursor', 'default');
                                $('#success').fadeIn()
                                $('.modal').modal('hide');
                                $('#success').modal('show');
                            })
                        },
                        error: function () {
                            $('#contactForm').fadeTo("slow", 1, function () {
                                $('#error').fadeIn()
                                $('.modal').modal('hide');
                                $('#error').modal('show');
                            })
                        }
                    })
                }
            })
        })

    })(jQuery)
})