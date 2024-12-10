let mix = require('laravel-mix');

mix.js('resources/js/umtt/dashboard-common.js', 'public/js/umtt').version();
mix.js('resources/js/umtt/common.js', 'public/js/umtt').version();
mix.js('resources/js/umtt/vendor/tauhid/time/time.js', 'public/js/umtt/vendor/tauhid/time').version();

//css

mix.css('resources/css/umtt/dashboard-layout.css', 'public/css/umtt').version();
mix.css('resources/css/loader.css', 'public/css/').version();
mix.css('resources/css/structure.css', 'public/css').version();
mix.css('resources/css/support-chat.css', 'public/css').version();

//bootstrap
mix.css('resources/css/bootstrap/bootstrap.css', 'public/css/bootstrap').version();
mix.css('resources/css/bootstrap/bootstrap.min.css', 'public/css/bootstrap').version();

//user
mix.css('resources/css/users/account-setting.css', 'public/css/users').version();
mix.css('resources/css/users/calendar.css', 'public/css/users').version();
mix.css('resources/css/users/lockscreen-1.css', 'public/css/users').version();
mix.css('resources/css/users/lockscreen-3.css', 'public/css/users').version();
mix.css('resources/css/users/login-1.css', 'public/css/users').version();
mix.css('resources/css/users/login-3.css', 'public/css/users').version();
mix.css('resources/css/users/pass_recovery_1.css', 'public/css/users').version();
mix.css('resources/css/users/pass_recovery_3.css', 'public/css/users').version();
mix.css('resources/css/users/register-1.css', 'public/css/users').version();
mix.css('resources/css/users/register-3.css', 'public/css/users').version();

//uni_kit
mix.css('resources/css/ui-kit/custom-modal.css', 'public/css/ui-kit').version();
mix.css('resources/css/ui-kit/custom-notification.css', 'public/css/ui-kit').version();
mix.css('resources/css/ui-kit/notification/notify.css', 'public/css/ui-kit/notification').version();

//default-dashboard
mix.css('resources/css/default-dashboard/style.css', 'public/css/default-dashboard').version();

//datetimepicker
mix.css('resources/css/datetimepicker/tempusdominus-bootstrap-4.css', 'public/css/datetimepicker').version();
mix.css('resources/css/datetimepicker/tempusdominus-bootstrap-4.min.css', 'public/css/datetimepicker').version();

// organizations
mix.js('resources/js/umtt/organizations.js', 'public/js/umtt').version();

// sales invoice
mix.css('resources/css/umtt/invoices.css', 'public/css/umtt').version();



