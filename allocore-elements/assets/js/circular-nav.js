jQuery(document).ready(function($) {

    function initCircularNav($scope) {
        // If scope is provided, limit search to that scope. Otherwise use document.
        const $container = $scope ? $scope : $(document);

        $container.find('.allocore-circular-nav-wrapper').each(function() {
            const $wrapper = $(this);
            const $svg = $wrapper.find('.allocore-circular-svg');
            const $segments = $wrapper.find('.allocore-nav-segment');
            const $labels = $wrapper.find('.allocore-segment-label');
            const $contentItems = $wrapper.find('.allocore-content-item');

            // Remove existing event handlers to prevent duplicates if re-initialized
            $segments.off('click');

            $segments.on('click', function() {
                const $segment = $(this);
                const angle = parseFloat($segment.attr('data-angle')); // Use attr for compatibility
                const id = $segment.attr('data-id');
                const color = $segment.attr('data-color');

                // Calculate target rotation (clockwise to top)
                const targetRotation = -angle;

                // Rotate SVG
                $svg.css('transform', `rotate(${targetRotation}deg)`);

                // Counter-rotate text
                $labels.each(function() {
                    const $label = $(this);
                    $label.css('transform', `rotate(${-targetRotation}deg)`);
                });

                // Update Content
                $contentItems.addClass('hidden');
                // Find content item with matching ID within this wrapper
                $wrapper.find(`.allocore-content-item[data-id="${id}"]`).removeClass('hidden');

                // Update Active State Visuals
                $segments.each(function() {
                    const $seg = $(this);
                    const sColor = $seg.attr('data-color');
                    const $path = $seg.find('path');

                    if ($seg.is($segment)) {
                        // Active
                        if (sColor === 'orange') {
                            $path.attr('fill', '#FF9D33');
                        } else {
                            $path.attr('fill', '#1FB0B8');
                        }
                        $path.css('filter', 'drop-shadow(0 4px 12px rgba(0,0,0,0.2))');
                    } else {
                        // Inactive
                        if (sColor === 'orange') {
                            $path.attr('fill', '#FF8C00');
                        } else {
                            $path.attr('fill', '#0D9BA6');
                        }
                        $path.css('filter', 'drop-shadow(0 2px 4px rgba(0,0,0,0.1))');
                    }
                });
            });
        });
    }

    // Initialize on load for non-Elementor pages or initial load
    initCircularNav();

    // Initialize on Elementor Frontend load
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/allocore_circular_nav.default', function($scope) {
            initCircularNav($scope);
        });
    });

});
