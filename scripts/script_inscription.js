var bool = false;
$(document).ready(function(){
    $('#continuer').hide();
    $('#continuer').prop('disabled', true);
    $('.champ').on('input', function() {
        if($(this).val().length < 2 || $(this).val().match(/\d+/) !== null)
        {
            if (bool !== false)
            {
                $('#continuer').toggle('clip');
                $('#continuer').prop('disabled', true);
            }
            bool = false;
            $(this).css({
                borderColor : 'red',
                color : 'red'
            });
        }
        else {
            $(this).css({
                borderColor : 'green',
                color : 'green'
            });
        }
        if ($(this).val().match(/\d+/) !== null)
        {
            $('#echo_error').text("Ce champ ne peut contenir de chiffre.");
        }
        else if ($(this).val().length < 2)
        {
            $('#echo_error').text("Ce champ doit contenir au moins deux caractères.");
        }
        else
        {
            $('#echo_error').empty();
        }
        verif();
    });
    $('.radio_label').click(function() {
        if ($('#radio_label_1').hasClass('selected') === true)
        {
            $('#radio_label_1').toggleClass('selected');
        }
        if ($('#radio_label_2').hasClass('selected') === true)
        {
            $('#radio_label_2').toggleClass('selected');
        }
        if ($('#radio_label_3').hasClass('selected') === true)
        {
            $('#radio_label_3').toggleClass('selected');
        }
        if ($(this).hasClass('selected') === false)
        {
            $(this).toggleClass('selected');
        }
        verif();
    });
    $('#city').change(function() {
        if ($('#city').val() === "")
        {
            $('#city').css({
                borderColor : 'red',
                color : 'red'
            });
        }
        else
        {
            $('#city').css({
                borderColor : 'green',
                color : 'green'
            });
        }
        verif();
    });
    function verif()
    {
        if ($('#name').length !== 0)
        {
            if ($('#name').css('borderColor') === 'rgb(0, 128, 0)' &&
            $('#first_name').css('borderColor') === 'rgb(0, 128, 0)' &&
            $('.radio_label').hasClass('selected') === true &&
            bool !== true)
            {
                $('#continuer').toggle('clip');
                $('#continuer').prop('disabled', false);
                bool = true;
            }
        }
        else if ($('#city').length !== 0 && bool !== true)
        {
            if ($('#city').css('borderColor') === 'rgb(0, 128, 0)' && $('#birthday').css('borderColor') === 'rgb(0, 128, 0)' && bool !== true)
            {
                $('#continuer').toggle('clip');
                $('#continuer').prop('disabled', false);
                bool = true;
            }
        }
        else if ($('#email').length !== 0)
        {
            if ($('#pass2').length !== 0)
            {
                if ($('#email').css('borderColor') === 'rgb(0, 128, 0)' && $('#pass1').css('borderColor') === 'rgb(0, 128, 0)' && $('#pass2').css('borderColor') === 'rgb(0, 128, 0)'  && bool !== true)
                {
                    $('#continuer').toggle('clip');
                    $('#continuer').prop('disabled', false);
                    bool = true;
                }
                else if (($('#email').css('borderColor') == 'rgb(255, 0, 0)' || $('#pass1').css('borderColor') == 'rgb(255, 0, 0)' || $('#pass2').css('borderColor') == 'rgb(255, 0, 0)')  && bool !== false)
                {
                    $('#continuer').toggle('clip');
                    $('#continuer').prop('disabled', true);
                    bool = false;
                }
            }
            else
            {
                if ($('#email').css('borderColor') === 'rgb(0, 128, 0)' && $('#pass1').css('borderColor') === 'rgb(0, 128, 0)'  && bool !== true)
                {
                    $('#continuer').toggle('clip');
                    $('#continuer').prop('disabled', false);
                    bool = true;
                }
                else if (($('#email').css('borderColor') == 'rgb(255, 0, 0)' || $('#pass1').css('borderColor') == 'rgb(255, 0, 0)')  && bool !== false)
                {
                    $('#continuer').toggle('clip');
                    $('#continuer').prop('disabled', true);
                    bool = false;
                }

            }
        }
    }
    $('#birthday').on('input', function () {
        var date1 = new Date($('#birthday').val());
        var date2 = new Date();
        var diffDays = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));
        var diffYears = diffDays/365;
        if (diffYears >= 18 && diffYears <=120)
        {
            $('#echo_error').empty();
            $('#birthday').css({
                borderColor : 'green',
                color : 'green'
            });
        }
        else
        {
            if ($('#birthday').val().length > 10)
            {
                $('#echo_error').text("Format de date invalide.");
            }
            else if (diffYears < 18)
            {
                $('#echo_error').text("Vous devez être majeur.");
            }
            else if (diffYears > 150)
            {
                $('#echo_error').text("Age limité à 120ans.");
            }
            $('#birthday').css({
                borderColor : 'red',
                color : 'red'
            });
        }
        if ($('#birthday').css('borderColor') === 'rgb(255, 0, 0)' && bool !== false)
        {
            $('#continuer').toggle('clip');
            $('#continuer').prop('disabled', true);
            bool = false;
        }
        verif();
    });
    var regex_mail = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    var regex_pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    $('.login').on('input', function() {
        var verif_color = false;
        if ($(this).val().length > 1)
        {
            if ($(this)[0] == $('#email')[0] && $('#email').val().length > 1 && $(this).val().match(regex_mail) !== null)
            {
                verif_color = true;
                $('#email').css({
                    borderColor : 'green',
                    color : 'green'
                });
            }
            if ($(this)[0] == $('#pass1')[0] && $('#pass1').val().match(regex_pass) !== null)
            {
                verif_color = true;
                $('#pass1').css({
                    borderColor : 'green',
                    color : 'green'
                });
            }
            if ($(this)[0] == $('#pass2')[0] && $('#pass2').val() === $('#pass1').val() && $('#pass2').val().match(regex_pass) !== null)
            {
                verif_color = true;
                $('#pass2').css({
                    borderColor : 'green',
                    color : 'green'
                });
            }
            if (verif_color === false)
            {
                $(this).css({
                    borderColor : 'red',
                    color : 'red'
                });
            }
        }
        else
        {
            $(this).css({
                borderColor : 'red',
                color : 'red'
            });
        }
        verif();
    });
});