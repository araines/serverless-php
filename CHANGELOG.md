# Change log

## [v0.2](https://github.com/araines/serverless-php/tree/0.2)
* Add Context object and pass it in to the handle method, making the interface
more similar to native languages.
* Made several services private for small performance benefit.
* Logger added to the Context object to operate in the same style as Java.
* Example HelloHandler altered to use new interface and get logger from context
instead of from an injected service (although both ways would still work).

## [v0.1](https://github.com/araines/serverless-php/tree/0.1)
Initial project set up.
