window.$ = window.jQuery = require('jquery');

// ページ遷移してもチェックボックスを記憶しておく
$(function() {

    // 全てのチェックボックス要素を取得
    const checkboxes = $('.article-checkbox');

    // チェックされているものを取得 or 空の配列
    const selectedArticles = JSON.parse(localStorage.getItem('selectedArticles')) || [];

    checkboxes.each(function() {
        const checkbox = $(this);

        // data-article-id属性から記事のidを取得
        const articleId = checkbox.data('article-id');

        // 要素が実際にチェックされているかどうかの確認
        checkbox.prop('checked', selectedArticles.includes(articleId));

        checkbox.on('change', function() {

            // チェックされていれば配列に追加 or されていなければ排除
            if (this.checked) {
                selectedArticles.push(articleId);
            } else {
                const index = selectedArticles.indexOf(articleId);
                if (index !== -1) {
                    selectedArticles.splice(index, 1);
                }
            }
            // 配列を文字列にしてローカルストレージに保存
            localStorage.setItem('selectedArticles', JSON.stringify(selectedArticles));
        });
    });
});
