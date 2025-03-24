document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const deleteBtn = document.getElementById('delete-selected-btn');
    const deleteForm = document.getElementById('delete-selected-form');
    const selectedIdsInput = document.getElementById('selected-ids');
    const checkboxAll = document.getElementById('checkbox-all');

    function toggleDeleteButton() {
        const checked = document.querySelectorAll('.checkbox-item:checked').length > 0;
        deleteBtn.style.display = checked ? 'inline-flex' : 'none';
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
    });

    if (checkboxAll) {
        checkboxAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            toggleDeleteButton();
        });
    }

    deleteBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const selectedIds = Array.from(document.querySelectorAll('.checkbox-item:checked'))
            .map(checkbox => checkbox.value);
        
        if (selectedIds.length === 0) return;

        if (confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')) {
            selectedIdsInput.value = selectedIds.join(',');
            deleteForm.submit();
        }
    });
});
