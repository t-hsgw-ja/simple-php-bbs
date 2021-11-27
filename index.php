<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple BBS</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <form action="submit.php" method="post" class="form">
        <table class="form__table">
            <tbody>
                <tr>
                    <th>
                        <label for="name" class="form__label">名前</label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="はじめての掲示板くん">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="content" class="form__label">コメント</label>
                    </th>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="10" placeholder="とりあえず書き込んでみよう！"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="tac">
            <input type="submit" name="submit" value="投稿する" class="btn btn__primary">
        </p>
    </form>

    <script src="./assets/js/form.js"></script>
</body>

</html>