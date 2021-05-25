$(function() {
  // 送信ボタンをトリガーとする
  $("#ajax_sub").on('click',function() {

    // CSRF対策としてヘッダーにトークンを設定
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // 入力された俳句情報を取得
    $.ajax( {
      type: 'POST',
      data: {
        content: $('#content').val()
      },
      url: './haiku_history_update',
      timeout: 200
    })
    // ajaxリクエスト成功時に実行される処理
    .done (
      (data) => {
        alert('俳句の投稿が完了しました。');
        $('#content').val('');
      }
    )
    // ajaxリクエスト失敗時に実行される処理
    .fail (
      (data) => {
        alert('俳句の投稿に失敗しました。');
        console.log(data);
      });
    });
  });
