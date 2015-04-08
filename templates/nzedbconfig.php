<?php

//!! WARNING !! - This file is maintained by JUJU
// !! Do not Edit by hand, your changes will not be saved

//=========================
// Config you must change - updated by installer.
//=========================
define('DB_SYSTEM', 'mysql');
define('DB_HOST', '{{ host }}');
define('DB_PORT', '3306');
define('DB_SOCKET', '');
define('DB_USER', '{{ user }}');
define('DB_PASSWORD', '{{ password }}');
define('DB_NAME', '{{ database }}');
define('DB_PCONNECT', false);

define('NNTP_USERNAME', '{{ nntp_username }}' );
define('NNTP_PASSWORD', '{{ nntp_password }}');
define('NNTP_SERVER', '{{ nntp_server }}');
define('NNTP_PORT', '{{ nntp_port }}');
// If you want to use TLS or SSL on the NNTP connection (the NNTP_PORT must be able to support encryption).
define('NNTP_SSLENABLED', {{ nntp_ssl_enabled }});
// If we lose connection to the NNTP server, this is the time in seconds to wait before giving up.
define('NNTP_SOCKET_TIMEOUT', '{{ nntp_socket_timeout }}');

define('NNTP_USERNAME_A', '');
define('NNTP_PASSWORD_A', '');
define('NNTP_SERVER_A', '');
define('NNTP_PORT_A', '');
define('NNTP_SSLENABLED_A', false);
define('NNTP_SOCKET_TIMEOUT_A', '');

// Location to CA bundle file on your system. You can download one here: http://curl.haxx.se/docs/caextract.html
define('nZEDb_SSL_CAFILE', '');
// Path where openssl cert files are stored on your system, this is a fall back if the CAFILE is not found.
define('nZEDb_SSL_CAPATH', '');
// Use the aforementioned CA bundle file to verify remote SSL certificates when connecting to a server using TLS/SSL.
define('nZEDb_SSL_VERIFY_PEER', '');
// Verify the host is who they say they are.
define('nZEDb_SSL_VERIFY_HOST', '');
// Allow self signed certificates. Note this does not work on CURL as CURL does not have this option.
define('nZEDb_SSL_ALLOW_SELF_SIGNED', '1');

require_once 'automated.config.php';

