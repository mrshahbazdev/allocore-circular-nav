(function () {
    'use strict';

    function initToolsFilters() {
        var filterContainer = document.getElementById('allocore-tool-filters');
        if (!filterContainer) return;

        var buttons = filterContainer.querySelectorAll('.allocore-filter-btn');
        var categories = document.querySelectorAll('.allocore-tools-category');

        buttons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var filter = this.getAttribute('data-filter');

                buttons.forEach(function (b) { b.classList.remove('allocore-filter-btn--active'); });
                this.classList.add('allocore-filter-btn--active');

                categories.forEach(function (cat) {
                    if (filter === 'all' || cat.getAttribute('data-category') === filter) {
                        cat.style.display = '';
                    } else {
                        cat.style.display = 'none';
                    }
                });
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initToolsFilters);
    } else {
        initToolsFilters();
    }

    // Re-init for Elementor preview
    if (typeof jQuery !== 'undefined') {
        jQuery(window).on('elementor/frontend/init', function () {
            if (typeof elementorFrontend !== 'undefined') {
                elementorFrontend.hooks.addAction('frontend/element_ready/allocore_tools_showcase.default', initToolsFilters);
            }
        });
    }
})();
