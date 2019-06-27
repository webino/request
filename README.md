# Webino Request

Simple PHP environment request implementation. [WIP]

[![Build Status](https://img.shields.io/travis/webino/request/master.svg?style=for-the-badge)](http://travis-ci.org/webino/request "Master Build Status")
[![Coverage Status](https://img.shields.io/coveralls/github/webino/request/master.svg?style=for-the-badge)](https://coveralls.io/github/webino/request?branch=master "Master Coverage Status")
[![Code Quality](https://img.shields.io/scrutinizer/g/webino/request/master.svg?style=for-the-badge)](https://scrutinizer-ci.com/g/webino/request/?branch=master "Master Code Quality")
[![Latest Stable Version](https://img.shields.io/github/tag/webino/request.svg?label=STABLE&style=for-the-badge)](https://packagist.org/packages/webino/request)

## Recommended Usage

Request data for application dispatch.


## Setup
[![PHP from Packagist](https://img.shields.io/packagist/php-v/webino/request.svg?style=for-the-badge)](https://php.net "Required PHP version")

```bash
composer require webino\request
```


## Quick Use

Getting request object for current execution context:
```php
use Webino\InstanceContainer;
use Webino\HttpRequest;
use Webino\ConsoleRequest;
use Webino\RequestInterface;

$container = new InstanceContainer;

/** @var RequestInterface $request */
$request = $container->get(RequestInterface::class);

if ($request instanceof HttpRequest) {

} elseif ($request instanceof ConsoleRequest) {

}
```

Making HTTP request:
```php
use Webino\InstanceContainer;
use Webino\HttpRequest;

$container = new InstanceContainer;

/** @var HttpRequest $request */
$request = $container->make(HttpRequest::class, HttpRequest::defaults([
    HttpRequest::QUERY_STRING => 'foo=bar&baz=bam',
    HttpRequest::SCRIPT_NAME => '/example/index.php',
    HttpRequest::SCRIPT_FILENAME => '/var/www/html/example/index.php',
    HttpRequest::URI => '/example/some-route'
]));
```

Making console request:
```php
use Webino\InstanceContainer;
use Webino\ConsoleRequest;

$container = new InstanceContainer;

/** @var ConsoleRequest $request */
$request = $container->make(ConsoleRequest::class, ConsoleRequest::defaults([
    ConsoleRequest::COMMAND => 'foo --bar baz',
    ConsoleRequest::SCRIPT_FILENAME => '/var/www/html/test/index.php',
]));
```


## API

**RequestInterface**

- *const* TIME <br>
  Request time float option.
  
- *const* TIME_DEFAULT <br>
  Default request time float, example value.

- *const* SCRIPT_FILENAME <br>
  Executed script file name string option.
  
- *const* SCRIPT_FILENAME_DEFAULT <br>
  Default executed script file name, example value.
  
- *float* getRequestTime() <br>
  Returns HTTP request time.

- *string* getScriptFileName() <br>
  Returns executed script file name.
  

**HttpRequest**

- *const* SCRIPT_NAME <br>
  Executed script name string option.
  
- *const* SCRIPT_NAME_DEFAULT <br>
  Executed script name, example value.
  
- *const* GATEWAY_INTERFACE <br>
  Gateway interface string option.
  
- *const* GATEWAY_INTERFACE_DEFAULT <br>
  Gateway interface, example value.

- *const* SERVER_SOFTWARE <br>
  Server software string option.
  
- *const* SERVER_SOFTWARE_APACHE <br>
  Apache server software, example value.
  
- *const* SERVER_SOFTWARE_NGINX <br>
  Nginx server software, example value.
  
- *const* HOST <br>
  Server host name string option.
  
- *const* HOST_LOCAL <br>
  Local server host name, example value.
  
- *const* HOST_IP <br>
  Server IP address string option.
  
- *const* HOST_IP_LOCAL <br>
  Local server IP address, example value.

- *const* URI <br>
  Request URI string option.

- *const* URI_DEFAULT <br>
  Request URI, example value.
  
- *const* METHOD <br>
  Request method string option.
  
- *const* METHOD_GET <br>
  GET request method, example value.
  
- *const* METHOD_POST <br>
  POST request method, example value.
  
- *const* SCHEME <br>
  Request scheme string option.
  
- *const* SCHEME_HTTP <br>
  HTTP request scheme, example value.
  
- *const* SCHEME_HTTPS <br>
  HTTPS request scheme, example value.
  
- *const* PORT <br>
  Request port string option.
  
- *const* PORT_HTTP <br>
  HTTP request port, example value.
  
- *const* PORT_HTTPS <br>
  HTTPS request port, example value.
  
- *const* QUERY_STRING <br>
  Query string option.

- *const* QUERY_STRING_DEFAULT <br>
  Query string, example value.
  
- *const* ACCEPT <br>
  Accept header string option.
  
- *const* ACCEPT_HTML <br>
  Accept HTML header, example value.
  
- *const* ACCEPT_LANGUAGE <br>
  Accept language header string option.
  
- *const* ACCEPT_LANGUAGE_DEFAULT <br>
  Default accept language, example value.
  
- *const* ACCEPT_CHARSET <br>
  Accept charset header string option.
  
- *const* ACCEPT_CHARSET_DEFAULT <br>
  Default charset header, example value.

- *const* ACCEPT_ENCODING <br>
  Accept encoding header string option.
  
- *const* ACCEPT_ENCODING_DEFAULT <br>
  Default accept encoding header, example value.
  
- *const* USER_AGENT <br>
  User agent header string option.
  
- *const* USER_AGENT_DEFAULT <br>
  Default user agent header, example value.
  
- *const* REFERER <br>
  Referer header string option.
  
- *const* REFERER_DEFAULT <br>
  Default referer header, example value.

- *const* REMOTE_IP <br>
  Remote IP address string option.
  
- *const* REMOTE_IP_LOCAL <br>
  Local remote IP address, example value.

- *const* REMOTE_PORT <br>
  Remote port string option.

- *const* REMOTE_PORT_DEFAULT <br>
  Default remote port, example value.
  
- *const* REQUESTED_WITH <br>
  The x-requested-with header string option.
  
- *const* REQUESTED_WITH_AJAX <br>
  The Ajax x-requested-with header, example value.

- *string* getRoutePath() <br>
  Returns route path.

- *string* getScriptName() <br>
  Returns executed script name.

- *string* getMethod() <br>
  Returns HTTP request method.
  
- *string* getHost() <br>
  Returns HTTP host name.

- *string* getHostIP() <br>
  Returns HTTP host IP address.

- *string* getScheme() <br>
  Returns HTTP request scheme.

- *bool* isHttps() <br>
  Returns true when request scheme is HTTPS.

- *string* getPort() <br>
  Returns HTTP request port.

- *string* getQueryString() <br>
  Returns HTTP request query string.
  
- *string* getBasePath() <br>
  Returns HTTP root.

- *string* getUri() <br>
  Returns request URI.
  
- *string* getGatewayInterface() <br>
  Returns server gateway interface identifier.

- *string* getServerSoftware() <br>
  Returns server software identifier.
  
- *string* getAccept() <br>
  Returns HTTP accept header value.
  
- *string* getAcceptLanguage() <br>
  Returns HTTP accept language header value.
  
- *string* getAcceptCharset() <br>
  Returns HTTP accept charset header value.
  
- *string* getAcceptEncoding() <br>
  Returns HTTP accept encoding header value.
  
- *string* getUserAgent() <br>
  Returns HTTP request user agent.

- *string* getReferer() <br>
  Returns HTTP referer header value.

- *string* getRemoteIP() <br>
  Returns HTTP remote IP address.
  
- *string* getRemotePort() <br>
  Returns HTTP remote port.

- *bool* isAjax() <br>
  Returns true when request was made by Ajax.

- *array* *static* defaults(*array* $overrides = []) <br>
  Returns default HTTP request options, example values.


**ConsoleRequest**

- *const* COMMAND <br>
  Console command string option.

- *string* getCommand() <br>
  Returns console command.

- *array* *static* defaults(*array* $overrides = []) <br>
  Returns default console request options, example values.


## Development

[![Build Status](https://img.shields.io/travis/webino/request/develop.svg?style=for-the-badge)](http://travis-ci.org/webino/request "Develop Build Status")
[![Coverage Status](https://img.shields.io/coveralls/github/webino/request/develop.svg?style=for-the-badge)](https://coveralls.io/github/webino/request?branch=develop "Develop Coverage Status")
[![Code Quality](https://img.shields.io/scrutinizer/g/webino/request/develop.svg?style=for-the-badge)](https://scrutinizer-ci.com/g/webino/request/?branch=develop "Develop Code Quality")
[![Latest Unstable Version](https://img.shields.io/github/tag-pre/webino/request.svg?label=PREVIEW&style=for-the-badge)](https://packagist.org/packages/webino/request "Packagist")


Static analysis:
```bash
composer analyse
```

Coding style check:
```bash
composer check
```

Coding style fix:
```bash 
composer fix
```

Testing:
```bash
composer test
```

Git pre-commit setup:
```bash
ln -s ../../pre-commit .git/hooks/pre-commit
```


## Addendum

[![License](https://img.shields.io/packagist/l/webino/request.svg?style=for-the-badge)](https://github.com/webino/request/blob/master/LICENSE.md "BSD-3-Clause License")
[![Total Downloads](https://img.shields.io/packagist/dt/webino/request.svg?style=for-the-badge)](https://packagist.org/packages/webino/request "Packagist") 
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/webino/request.svg?style=for-the-badge)


  Please, if you are interested in this library report any issues and don't hesitate to contribute.
  We will appreciate any contributions on development of this library.

[![GitHub issues](https://img.shields.io/github/issues/webino/request.svg?style=for-the-badge)](https://github.com/webino/request/issues)
[![GitHub forks](https://img.shields.io/github/forks/webino/request.svg?label=Fork&style=for-the-badge)](https://github.com/webino/request)
