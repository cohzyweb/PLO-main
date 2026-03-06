<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('SMTP_HOST', env('MAIL_HOST', 'plo-group.sakura.ne.jp')), // SMTP host (separate from IMAP)
            'port' => env('SMTP_PORT', env('MAIL_PORT', 587)), // SMTP port: 587 (TLS) or 465 (SSL)
            'encryption' => env('SMTP_ENCRYPTION', env('MAIL_ENCRYPTION', 'tls')), // TLS for port 587, SSL for port 465
            'username' => env('MAIL_USERNAME', 'info@plo-group.jp'), // Username: "info" or full email "info@plo-group.jp"
            'password' => env('MAIL_PASSWORD'),
            'timeout' => 60, // Increase timeout for slow connections
            'local_domain' => env('MAIL_EHLO_DOMAIN', 'plo-group.sakura.ne.jp'), // Use SMTP server domain for EHLO
        ],

        'en_smtp' => [
            'transport' => 'smtp',
            'host' => env('SMTP_HOST', env('MAIL_HOST', 'plo-group.sakura.ne.jp')), // SMTP host (separate from IMAP)
            'port' => env('SMTP_PORT', env('MAIL_PORT', 587)), // SMTP port: 587 (TLS) or 465 (SSL)
            'encryption' => env('SMTP_ENCRYPTION', env('MAIL_ENCRYPTION', 'tls')), // TLS for port 587, SSL for port 465
            'username' => env('MAIL_USERNAME', 'info@plo-group.jp'), // Username: "info" or full email "info@plo-group.jp"
            'password' => env('MAIL_PASSWORD'), // Dùng chung với default mailer: iD&BKX6z%Zdb
            'timeout' => 60, // Increase timeout for slow connections
            'local_domain' => env('MAIL_EHLO_DOMAIN', 'plo-group.sakura.ne.jp'), // Use SMTP server domain for EHLO
        ],
        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'info@plo-group.jp'),
        'name' => env('MAIL_FROM_NAME', 'Passion Leisure Office'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Production SMTP Settings (from client)
    |--------------------------------------------------------------------------
    |
    | メールアドレス：info@plo-group.jp
    | MAIL_USERNAME：info（もしくはメールアドレス）
    | MAIL_PASSWORD：iD&BKX6z%Zdb
    | SMTPサーバー情報：plo-group.sakura.ne.jp
    | ポート番号：587
    | 暗号化方式（SSL / TLS など）：SSL
    |
    */

];
