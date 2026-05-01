#!/usr/bin/ruby 
require 'cgi'
require 'fileutils'
cgi = CGI.new("html5")

cityCap = cgi['city'].capitalize
countryCap = cgi['country'].capitalize
psCap = cgi['provinceState'].capitalize


puts "Content-type: text/html\n\n"
print <<-HTML;
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        p {
            color: rgb(135, 206, 235);
        }
        body {
            background-color: bisque;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <h1 style="color: navy">Ruby Output</h1>
    <p> City: #{cityCap} </p> 
    <p> Province/State: #{psCap} </p> 
    <p> Country: #{countryCap} </p> 
    <p> Image: </p>
</body>
</html>
HTML
