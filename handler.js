'use strict';

var child_process = require('child_process');

module.exports.handle = (event, context, callback) => {

  var response = '';
  var php = './php';

  // When using 'serverless invoke local' use the system PHP binary instead
  if (typeof process.env.PWD !== "undefined") {
    php = 'php';
  }

  var proc = child_process.spawn(php, ["handler.php", JSON.stringify(event)]);

  proc.stdout.on('data', function (data) {
    response += data.toString()
  });

  proc.stderr.on('data', function (data) {
    console.log(`${data}`);
  });

  proc.on('close', function(code) {
    if (code !== 0) {
      return callback(new Error(`Process error code ${code}: ${response}`));
    }

    callback(null, JSON.parse(response));
  });
};
