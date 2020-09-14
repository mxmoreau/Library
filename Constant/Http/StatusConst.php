<?php

    /**
     * @author Maxime Moreau
     * @version 1.0.0
     * @see https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @see https://ci.apache.org/projects/httpd/trunk/doxygen/group__HTTP__Status.html
     * @see https://www.nginx.com/resources/wiki/extending/api/http/
     */

    namespace Library\Constant\Http;

    class StatusConst
    {
        /* .:: INFORMATIONAL ::. */
        const CONTINUE = 100;
        const SWITCHING_PROTOCOLS = 101;
        const PROCESSING = 102;
        const EARLY_HINTS = 103;

        /* .:: SUCCESS ::. */
        const OK = 200;
        const CREATED = 201;
        const ACCEPTED = 202;
        const NON_AUTHORITATIVE_INFORMATION = 203;
        const NO_CONTENT = 204;
        const RESET_CONTENT = 205;
        const PARTIAL_CONTENT = 206;
        const MULTI_STATUS = 207;
        const ALREADY_REPORTED = 208;
        const IM_USED = 226;

        /* .:: REDIRECTION ::. */
        const MULTIPLES_CHOICES = 300;
        const MOVED_PERMANENTLY = 301;
        const FOUND = 302;
        const SEE_OTHER = 303;
        const NOT_MODIFIED = 304;
        const USE_PROXY = 305; // (DEPRECATED)
        const UNUSED = 306; // (DEPRECATED)
        const TEMPORARY_REDIRECT = 307;
        const PERMANENT_REDIRECT = 308;

        /* .:: CLIENT_ERROR ::. */
        const BAD_REQUEST = 400;
        const UNAUTHORIZED = 401;
        const PAYMENT_REQUIRED = 402; // (EXPERIMENTAL)
        const FORBIDDEN = 403;
        const NOT_FOUND = 404;
        const METHOD_NOT_ALLOWED = 405;
        const NOT_ACCEPTABLE = 406;
        const PROXY_AUTHENTICATION_REQUIRED = 407;
        const REQUEST_TIMEOUT = 408;
        const CONFLICT = 409;
        const GONE = 410;
        const LENGTH_REQUIRED = 411;
        const PRECONDITION_FAILED = 412;
        const PAYLOAD_TOO_LARGE = 413;
        const URI_TOO_LARGE = 414;
        const UNSUPPORTED_MEDIA_TYPE = 415;
        const RANGE_NOT_STATISFIABLE = 416;
        const EXPECTATION_FAILED = 417;
        const IM_A_TEAPOT = 418;
        const MISDIRECTED_REQUEST = 421;
        const UNPROCESSABLE_ENTITY = 422;
        const LOCKED = 423;
        const FAILED_DEPENDENCY = 424;
        const TOO_EARLY = 425;
        const UPGRADE_REQUIRED = 426;
        const PRECONDITION_REQUIRED = 428;
        const TOO_MANY_REQUESTS = 429;
        const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
        const NO_RESPONSE = 444;
        const RETRY_WITH = 449;
        const BLOCKED_BY_WINDOWS_PARENTAL_CONTROLS = 450; // Microsoft
        const UNAVAILABLE_FOR_LEGAL_REASONS = 451;
        const CLIENT_CLOSED_REQUEST = 499; // NGINX

        /* .:: SERVER_ERROR ::. */
        const INTERNAL_SERVER_ERROR = 500;
        const NOT_IMPLEMENTED = 501;
        const BAD_GATEWAY = 502;
        const SERVICE_UNAVAILABLE = 503;
        const GATEWAY_TIMEOUT = 504;
        const HTTP_VERSION_NOT_SUPPORTED = 505;
        const VARIANT_ALSO_NEGOTIATES = 506; // (EXPERIMENTAL)
        const INSUFFICIENT_STORAGE = 507; // WebDAV
        const LOOP_DETECTED = 508; // WebDAV
        const BANDWITCH_LIMIT_EXCEEDED = 509; // Apache 
        const NOT_EXTENDED = 510;
        const NETWORK_AUTHENTIFICATION_REQUIRED = 511;
    }
?>
