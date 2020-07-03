<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title><?= $title ?></title>
    <script>
        $(function(){
            $('a[href^="http://codeigniter/comments/create"]').addClass('page-link');
            $('li[class="page-link"]').css('color', '#000');

            var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i;
            var mail = $('#mail');
            var content = $('#content');
            content.blur(function(){
                if(content.val() != ''){
                    $('#submit').attr('disabled', false);
                    content.removeClass('is-invalid').addClass('is-valid');
                    $('#validtext').text('');
                } else {
                    $('#validtext').text('Поле комментарий не должно быть пустым!');
                    content.addClass('is-invalid');
                    $('#submit').attr('disabled', true);
                }
            });

            mail.blur(function(){
                if(mail.val() != ''){
                    if(mail.val().search(pattern) == 0){
                        $('#submit').attr('disabled', false);
                        mail.removeClass('is-invalid').addClass('is-valid');
                        $('#valid').text('');
                    }else{
                        $('#valid').text('Вы ввели некорректный email');
                        $('#submit').attr('disabled', true);
                        mail.addClass('is-valid');
                    }
                }else{
                    $('#valid').text('Поле e-mail не должно быть пустым!');
                    mail.addClass('is-invalid');
                    $('#submit').attr('disabled', true);
                }
            });
        });
    </script>

    <style>
        .page-link{
            width: 46px;
            height: 46px;
            border-radius: 8px;
            margin-right: 10px;
            padding: .5rem 1.13rem;
            line-height: 1.65;
        }
        #valid, #validtext{
            color: red;
        }
    </style>
</head>
<body>
<div class="container">


