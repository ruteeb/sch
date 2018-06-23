<h1>Project Oranje </h1>

<?php

(new MailMessage)
->line('You are receiving this email because we received a password reset request for your account.')
->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
->line('If you did not request a password reset, no further action is required.');