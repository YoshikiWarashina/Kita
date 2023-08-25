
// ページ遷移してもチェックボックスを記憶しておく
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.article-checkbox');
    const selectedArticles = JSON.parse(localStorage.getItem('selectedArticles')) || [];
    checkboxes.forEach(checkbox => {
        const articleId = checkbox.getAttribute('data-article-id');
        checkbox.checked = selectedArticles.includes(articleId);
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                selectedArticles.push(articleId);
            } else {
                const index = selectedArticles.indexOf(articleId);
                if (index !== -1) {
                    selectedArticles.splice(index, 1);
                }
            }
            localStorage.setItem('selectedArticles', JSON.stringify(selectedArticles));
        });
    });
});
