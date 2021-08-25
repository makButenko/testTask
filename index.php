<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>testTask</title>
</head>
<body>
    <h1>
        Введите строки
    </h1>
    <div id="answer"></div>
    <form action="testTask.php">
        <input type="text" style="display: block" name="template" required>
        <input type="text" style="display: block" name="result" required>
        <button>Отправить</button>
    </form>
</body>
</html>

<script>
    function handleSuccess(data, textPlace, form)
    {
        if (data.code == 1){ //no errors
            $("</span>",{
                'class':"success",
                text : data.text,
                css : {
                    'color' : 'green'
                }
            })
            form[0].reset()
        }
        else{
            $("</span>",{
                'class':"error",
                text : data.text,
                css : {
                    'color' : 'red'
                }
            })
        }
    }
    $("form").submit(
        function(){
            var data = form.serialize();
            var answer = $("#answer");
            $.ajax({
                type = "POST",
                data = data,
                url = form.action,
                dataType: 'json',
                error:function(){
                    $("</span>",{
                            'class': "error",
                            text : "что-то пошло не так",
                            css : {
                                'color' : 'red'
                            }
                        }
                    ).appendTo(answer);
                },
                success:handleSuccess(data, textPlace)
            });
        }
    )
</script>