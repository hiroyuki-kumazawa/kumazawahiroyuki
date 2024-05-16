<?php
/*
Template Name: Todo
*/

session_start();

// パスワードを設定
$correct_password = 'password';

// セッション変数に保存されているパスワードが有効かチェック
if (isset($_SESSION['password_valid_until']) && time() < $_SESSION['password_valid_until']) {
    $password_valid = true;
} else {
    $password_valid = false;
    // ユーザーが送信したパスワードを取得
    $user_password = isset($_POST['password']) ? $_POST['password'] : '';
    // パスワードチェック
    if ($user_password === $correct_password) {
        // パスワードが正しい場合、セッションに有効期限を設定
        $_SESSION['password_valid_until'] = time() + 86400; // 24時間後
        $password_valid = true;
    }
}

if ($password_valid) {
    // パスワードが正しい場合、ToDoリストを表示
    $data = get_todo_data();
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kumazawahiroyuki</title>
</head>
<header>
    <?php echo get_bloginfo('name'); ?>
</header>
<section>
    <h1>ToDoリスト</h1>
</section>
<section id="main-content">
    <div>
        <table>
            <thead>
                <tr>
                    <th>優先度も重要度も高いタスク</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $index => $todo): ?>
                <tr>
                    <td>
                        <form id="update-form-<?php echo $index; ?>" action="<?php echo admin_url('admin-post.php'); ?>"
                            method="post">
                            <input type="hidden" name="action" value="update_todo_data">
                            <input type="hidden" name="todo_id" value="<?php echo $index + 1; ?>">
                            <input type="text" name="new_data" value="<?php echo esc_attr($todo->data); ?>"
                                data-original-value="<?php echo esc_attr($todo->data); ?>"
                                onblur="checkAndSubmit(this)">
                            <?php wp_nonce_field('update-todo-nonce'); ?>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
function checkAndSubmit(element) {
    var originalValue = element.getAttribute('data-original-value');
    var currentValue = element.value;
    if (originalValue !== currentValue) {
        element.form.submit();
    }
}
</script>
<?php
} else {
    // パスワードが間違っている場合、パスワード入力フォームを表示
    ?>
<section id="form-password">
    <div class="from-password-container">
        <form action="" method="post">
            <label for="password">パスワードを入力してください:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="送信">
        </form>
    </div>
</section>
<?php
}

get_footer();
?><style>
h1 {
    font-size: 24px;
    color: #333;
    /* 濃い灰色のテキスト */
    margin-bottom: 0;
    /* 下の余白を追加 */
}

#main-content {
    max-width: 750px;
    margin: 0 auto;
    /* 中央揃え */
    padding: 20px;
    /* 内側の余白を追加 */
}

table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    /* シャドウを追加 */
    border-radius: 8px;
    /* 角を丸める */
    overflow: hidden;
    /* 角丸のために必要 */
}

@media screen and (max-width: 600px) {
    table {
        height: 70svh;
    }
}

th {
    background-color: #4CAF50;
    /* 明るい緑色に変更 */
    color: white;
    /* 文字色を白に */
    font-size: 16px;
}

th,
td {
    border: 1px solid #ddd;
    /* より薄い境界線に */
    padding: 15px 10px;
    text-align: center;
}


/* テーブルの行のスタイリング */
tbody td {
    font-size: 0;
    color: #333;
    /* 濃い灰色のテキスト */
}

input[type="text"] {
    width: 100%;
    /* フル幅に設定 */
    margin: 0;
    /* 余白をゼロに */
    border: 1px solid transparent;
    /* 透明な境界線を設定 */
    outline: none;
    /* フォーカス時のアウトラインを無くす */
    border-radius: 5px;
    /* 角を軽く丸める */
    background-color: #fff;
    /* 背景色を白に設定 */
    transition: all 0.3s ease;
    /* トランジションを滑らかに */
    box-sizing: border-box;
    text-align: center;
    font-size: large;
}

input[type="text"]:focus {
    border-color: transparent;
    /* フォーカス時の境界線を透明に */
    box-shadow: none;
    /* フォーカス時のシャドウを無くす */
}

#form-password {
    max-width: 750px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

.from-password-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
    /* Viewportの高さに合わせる */
}
</style>