$(function ()
{
    //「toggle_wish」というクラスを持つタグがクリックされたときに以下の処理が走る
    $('.toggle_wish').on('click', function ()
    {
        //表示しているプロダクトのIDと状態、押下し他ボタンの情報を取得
        text_id = $(this).attr("text_id");
        like_post = $(this).attr("like_post");
        click_button = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  //基本的にはデフォルトでOK
            },
            url: '/like_post',  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'text_id': text_id, 'like_post': like_post, }, //コントローラーに送るに名称をつけてデータを指定
        })
        //正常にコントローラーの処理が完了した場合
        .done(function (data) //コントローラーからのリターンされた値をdataとして指定
        {
            if ( data == 0 ){
                //クリックしたタグのステータスを変更
                click_button.attr("like_post", "1");
                //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                click_button.children().attr("class", "fas fa-heart");
            }
            if ( data == 1 ){
                //クリックしたタグのステータスを変更
                click_button.attr("like_post", "0");
                //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                click_button.children().attr("class", "far fa-heart");
            }
        })
        ////正常に処理が完了しなかった場合
        .fail(function (data){
            alert('いいね処理失敗');
            console.log(error.statusText);
        });
    });
});