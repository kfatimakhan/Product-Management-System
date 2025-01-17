// JavaScript functionality for the product management system

document.addEventListener('DOMContentLoaded', function () {
    // Confirm before deleting a product
    const deleteForms = document.querySelectorAll('form[action*="products"][method="POST"]');

    deleteForms.forEach((form) => {
        form.addEventListener('submit', function (event) {
            const isConfirmed = confirm('Are you sure?');
            if (!isConfirmed) {
                event.preventDefault(); // Stop form submission if not confirmed
            }
        });
    });

    // Example for handling search (if needed for dynamic functionality)
    const searchForm = document.querySelector('form[action*="products"]');
    if (searchForm) {
        searchForm.addEventListener('submit', function (event) {
            const searchInput = this.querySelector('input[name="search"]');
            if (searchInput && searchInput.value.trim() === '') {
                alert('Please enter a search term!');
                event.preventDefault();
            }
        });
    }
});
