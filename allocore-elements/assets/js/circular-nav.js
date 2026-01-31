jQuery(document).ready(function($) {

    function initCircularNav() {
        $('.allocore-circular-nav-wrapper').each(function() {
            const $wrapper = $(this);
            const $svg = $wrapper.find('.allocore-circular-svg');
            const $segments = $wrapper.find('.allocore-nav-segment');
            const $labels = $wrapper.find('.allocore-segment-label');
            const $contentItems = $wrapper.find('.allocore-content-item');

            // Set initial state
            // Rotate text to be upright initially (already done by default 0 deg)

            $segments.on('click', function() {
                const $segment = $(this);
                const angle = parseFloat($segment.data('angle'));
                const id = $segment.data('id');
                const color = $segment.data('color');

                // Calculate target rotation (clockwise to top)
                // If angle is 72, we want to rotate -72.
                const targetRotation = -angle;

                // Rotate SVG
                $svg.css('transform', `rotate(${targetRotation}deg)`);

                // Counter-rotate text
                $labels.each(function() {
                    const $label = $(this);
                    // The label has a transform origin set in inline style.
                    // We just need to set the rotation.
                    // Note: We need to preserve the origin if it was set via CSS, but here it is inline.
                    // However, jQuery .css might overwrite.
                    // The PHP output sets transform-origin.
                    // We need to apply rotation.
                    $label.css('transform', `rotate(${-targetRotation}deg)`);
                });

                // Update Content
                $contentItems.addClass('hidden');
                $wrapper.find(`.allocore-content-item[data-id="${id}"]`).removeClass('hidden');

                // Update Active State Visuals (Fill colors)
                $segments.each(function() {
                    const $seg = $(this);
                    const sColor = $seg.data('color');
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

    // Initialize on load
    initCircularNav();

    // Initialize on Elementor Frontend load (if inside Elementor editor)
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/allocore_circular_nav.default', function($scope) {
            initCircularNav();
        });
    });

});
