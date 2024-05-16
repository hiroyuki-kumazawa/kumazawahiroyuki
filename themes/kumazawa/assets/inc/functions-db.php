<?php



// データを取得
function get_todo_data() {
    // グローバル変数$wpdbを使用する為の宣言
    global $wpdb;
    // テーブル名を設定
    $table_name = $wpdb->prefix . 'todo_list';
    // データを取得
    $data = $wpdb->get_results("SELECT * FROM $table_name");

    // dataカラムの値を返す
    if ($data) {
        return $data;
    } else {
        return 'No data found'; // データが見つからなかった場合のエラーメッセージ
    }
}

// データを更新
function handle_form_update_todo() {
    // セキュリティチェック
    if (
        !isset($_POST['todo_id'], $_POST['new_data']) ||
        !wp_verify_nonce($_POST['_wpnonce'], 'update-todo-nonce')
    ) {
        wp_die('Security check failed');
    }

    // データを取得
    $todo_id = intval($_POST['todo_id']);
    // データをサニタイズ
    $new_data = sanitize_text_field($_POST['new_data']);

    global $wpdb;
    $table_name = $wpdb->prefix . 'todo_list';

    // データベースを更新
    $result = $wpdb->update(
        $table_name,
        ['data' => $new_data], // 新しい値
        ['id' => $todo_id] // 条件
    );

    if ($result) {
        $redirect_url = home_url('/todo'); // 更新成功時のリダイレクト先
    } else {
        $redirect_url = home_url('/todo'); // エラー時のリダイレクト先
    }

    wp_redirect($redirect_url);
    exit;
}
add_action('admin_post_update_todo_data', 'handle_form_update_todo');
add_action('admin_post_nopriv_update_todo_data', 'handle_form_update_todo'); // ログインしていないユーザーも許可する場合



?>