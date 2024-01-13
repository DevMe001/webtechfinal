/*================FOR ADMIN================*/

// Wrap the code in a window load event
window.addEventListener('load', function () {
    // Function to submit the sorting form on change
    document.getElementById('sortOrder').addEventListener('change', function () {
        document.getElementById('sortForm').submit();
    });

    // Function to submit the filtering form on change
    document.getElementById('roleFilter').addEventListener('change', function () {
        document.getElementById('filterForm').submit();
    });
});