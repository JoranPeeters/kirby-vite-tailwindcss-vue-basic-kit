<?php declare(strict_types=1);

return [
  'panel' => [
    'install' => true,
  ],

  'email' => [
    'transport' => [
      'type'     => 'smtp',
      'host'     => $_ENV['MAIL_HOST'] ?? 'localhost',
      'port'     => (int) ($_ENV['MAIL_PORT'] ?? 1025),
      'security' => $_ENV['MAIL_SECURITY'] ?? false,
      'auth'     => false,
    ],
  ],

  'routes' => [
    [
      'pattern' => 'test-mail',
      'method'  => 'GET',
      'action'  => function (): string {
        try {
          kirby()->email([
            'from'    => 'no-reply@kirby-template.test',
            'to'      => 'nimiqoinfo@gmail.com',
            'subject' => 'Mailpit test — ' . date('Y-m-d H:i:s'),
            'body'    => 'This is a test email sent from the Kirby mail test route. If you see this in Mailpit, SMTP transport is working correctly.',
          ]);

          return 'Mail sent successfully. Check Mailpit at http://localhost:8025';
        } catch (\Throwable $e) {
          return 'Mail failed: ' . $e->getMessage();
        }
      },
    ],
  ],
];