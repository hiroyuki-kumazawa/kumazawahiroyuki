<?php
/**
 * Plugin Name: Custom DB
 * Description: Custom DB
 * Version: 1.0
 * Author: 熊沢　宏行
 * Author URI: https://www.kumazawa.dev/
 * License: GPL2
 * Text Domain: custom-db
 */

// カスタムテーブルを作成
function create_todo_list_table() {
    // グローバル変数$wpdbを使用する為の宣言
    global $wpdb;
    // テーブル名を設定
    $table_name = $wpdb->prefix . 'todo_list';
    // 文字セットを取得
    $charset_collate = $wpdb->get_charset_collate();

    // テーブルが存在しない場合のみ作成
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        // SQL文を設定
        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            data text DEFAULT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        
        // SQL文を実行
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        // dbDeltaがテーブルを正常に作成したかを確認、エラーログに記録
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
            error_log('テーブルの作成に成功しました');
        }else{
            error_log('テーブルの作成に失敗しました');
        }

    }else{
        error_log('テーブルは既に存在しています');
    }
}
register_activation_hook(__FILE__, 'create_todo_list_table');


// NULLのデータを５つ挿入する
function insert_todo_list_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'todo_list';

    for ($i = 1; $i <= 5; $i++) {
        $wpdb->insert($table_name, array('data' => NULL), array('%s'));
    }

    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE data IS NULL");
    if ($data) {
        error_log('データの挿入に成功しました');
    } else {
        error_log('データの挿入に失敗しました');
    }
}
register_activation_hook(__FILE__, 'insert_todo_list_data');