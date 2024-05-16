<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kumazawahiroyuki</title>
</head>

<body>
    <header>
        <div>
            <h1>デジタル名刺</h1>
        </div>
    </header>
    <main>
        <section id="profile">
            <h2>初めまして、熊沢宏行と申します。</h2>
            <div>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/business-card.png" alt="名刺">
            </div>
        </section>
        <section id="business-rink">
            <div><a href="https://twitter.com/G4d0ayksb76OV8N" target="_blank"><img
                        src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/X-logo.png." alt="Xのロゴ"></a>
            </div>
            <div><a href="https://wisebear.biz/" target="_blank">https://wisebear.biz/</a></div>
        </section>
        <section>
            <table>
                <tr>
                    <th>名前</th>
                    <td>熊沢宏行</td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td>1988年11月11日</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>大阪府大阪市</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>info@wisebear.biz</td>
                </tr>
                <tr>
                    <th>Webサイト</th>
                    <td>https://wisebear.biz</td>
                </tr>
            </table>
        </section>
    </main>
</body>
<style>
body {
    margin: 0;
    padding: 0;
}

header {
    background-color: #f0f0f0;
    padding: 10px;
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    margin: 0;
    font-size: clamp(1.2rem, 5vw, 2.5rem);
}

h2 {
    margin: 0 0 20px;
    font-size: clamp(1rem, 4vw, 1.5rem);
}

main {
    padding: 20px;
    max-width: 900px;
    margin-inline: auto;
    margin-top: 50px;
    margin-bottom: 100px;
}

#profile {
    text-align: center;
    margin-bottom: 20px;
}

#profile img {
    width: 100%;
    max-width: 400px;
    border: solid 2px #f0f0f0;
    /* 影を追加 */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#business-rink {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25px;
    margin: 50px 0;
}

#business-rink div {
    margin: 0 10px;
}

#business-rink img {
    width: 40px;
}

table {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    border-collapse: collapse;
    border: solid 1px #f0f0f0;
    /* 影を右と下だけに追加 */
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
}

th {
    background-color: #f0f0f0;
    padding: 10px;
    width: 30%;
}

td {
    padding: 10px;
    width: 70%;
}
</style>

</html>