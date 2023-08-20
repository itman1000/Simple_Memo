"use strict";

{
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const confirmDelete = confirm('本当に削除してよろしいですか？');

                if (confirmDelete) {
                    const form = button.closest('form');
                    form.submit();
                }
            });
        });
    });
}
