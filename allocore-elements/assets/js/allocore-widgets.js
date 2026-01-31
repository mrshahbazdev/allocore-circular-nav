jQuery(document).ready(function($) {

    // --- Content Toggle ---
    function initContentToggle($scope) {
        $scope.find('.allocore-toggle-switch').on('change', function() {
            const isChecked = $(this).is(':checked');
            const $wrapper = $(this).closest('.allocore-toggle-wrapper');

            if (isChecked) {
                $wrapper.find('.allocore-toggle-content-a').addClass('hidden');
                $wrapper.find('.allocore-toggle-content-b').removeClass('hidden');
                $wrapper.find('.allocore-toggle-label-a').removeClass('text-primary font-bold').addClass('text-muted-foreground');
                $wrapper.find('.allocore-toggle-label-b').addClass('text-primary font-bold').removeClass('text-muted-foreground');
            } else {
                $wrapper.find('.allocore-toggle-content-a').removeClass('hidden');
                $wrapper.find('.allocore-toggle-content-b').addClass('hidden');
                $wrapper.find('.allocore-toggle-label-a').addClass('text-primary font-bold').removeClass('text-muted-foreground');
                $wrapper.find('.allocore-toggle-label-b').removeClass('text-primary font-bold').addClass('text-muted-foreground');
            }
        });
    }

    // --- Countdown ---
    function initCountdown($scope) {
        const $timer = $scope.find('.allocore-countdown');
        if (!$timer.length) return;

        const targetDate = new Date($timer.data('date')).getTime();

        const updateTimer = setInterval(function() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(updateTimer);
                $timer.html('<div class="text-xl font-bold">EXPIRED</div>');
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $timer.find('.days .val').text(String(days).padStart(2, '0'));
            $timer.find('.hours .val').text(String(hours).padStart(2, '0'));
            $timer.find('.minutes .val').text(String(minutes).padStart(2, '0'));
            $timer.find('.seconds .val').text(String(seconds).padStart(2, '0'));
        }, 1000);
    }

    // --- Alert Box ---
    function initAlertBox($scope) {
        $scope.find('.allocore-alert-close').on('click', function() {
            $(this).closest('.allocore-alert-box').fadeOut();
        });
    }

    // --- Elementor Hooks ---
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/allocore_content_toggle.default', initContentToggle);
        elementorFrontend.hooks.addAction('frontend/element_ready/allocore_countdown.default', initCountdown);
        elementorFrontend.hooks.addAction('frontend/element_ready/allocore_alert_box.default', initAlertBox);
    });
});
