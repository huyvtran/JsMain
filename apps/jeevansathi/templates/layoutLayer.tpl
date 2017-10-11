<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    ~include_http_metas`
    ~include_metas`
    ~include_title`
    <!--link rel="shortcut icon" href="/favicon.ico" /-->
    <script src="https://ajax.googleapis.com/ajax/libs/prototype/1.6.1.0/prototype.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>

    ~use helper = SfMinify`
    ~minify_include_module_javascripts('top')`
    ~minify_include_stylesheets()`
  </head>
  <body>
~$sf_content`
  </body>
</html>
