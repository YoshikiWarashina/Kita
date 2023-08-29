/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/delete.articles.js ***!
  \*****************************************/
$(function () {
  $('#my-button').on('click', function () {
    // 選択された記事のIDを配列として取得
    var selectedArticles = Array.from(getSelectedArticles());

    // 削除の確認メッセージ取得
    var confirmDelete = confirm('選択した記事を削除しますか？');

    //キャンセルしたら処理中断
    if (!confirmDelete) {
      return;
    }

    // CSRFトークンを取得
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Ajaxリクエストを実行して選択した記事を削除
    $.ajax({
      type: 'DELETE',
      url: '/my_articles',
      data: {
        selected_articles: selectedArticles
      },
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function success(response) {
        alert(response.message);

        // 選択された記事の情報をクリアして、ページをリロード
        clearSelectedArticles();
        location.reload();
      },
      error: function error(xhr, status, _error) {
        alert('削除中にエラーが発生しました。');
      }
    });
  });

  // ローカルストレージから選択された記事のIDを取得する
  function getSelectedArticles() {
    var selectedArticlesString = localStorage.getItem('selectedArticles');
    return new Set(JSON.parse(selectedArticlesString) || []);
  }

  // 選択された記事の情報をローカルストレージからクリアする関数
  function clearSelectedArticles() {
    localStorage.removeItem('selectedArticles');
  }
});
/******/ })()
;