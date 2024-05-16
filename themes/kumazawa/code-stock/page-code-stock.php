<?php
/*
Template Name: Code Stock
*/

session_start();

// パスワードを設定
$correct_password = '123456789';

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
    ?>

<?php
get_header('code-stock');
?>
<?php echo get_bloginfo('name'); ?>
<section>
    <h1 class="text-[100px]">code stock</h1>
</section>
<section>
    <p>コードストック</p>
    <!-- コードストックを一覧で表示 -->
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>コード</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>タイトル1</td>
                <td>コード1</td>
            </tr>
            <tr>
                <td>タイトル2</td>
                <td>コード2</td>
            </tr>
            <tr>
                <td>タイトル3</td>
                <td>コード3</td>
            </tr>
        </tbody>
    </table>
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
    <p style="color:red;">パスワードが間違っています</p>
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

get_footer('code-stock');
?><style>
h1 {
    font-size: 24px;
    color: #333;
    /* 濃い灰色のテキスト */
    margin-bottom: 0;
    /* 下の余白を追加 */
}
</style>