#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<HTML;
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        h1 {
            font-family: 'Sour Gummy', cursive;
            text-align: center;
            color: navy;
            font-size: 50px;
        }
        body {
            background-color: rgb(135, 206, 235);
        }
    </style>
</head>

<body>
    <h1>THIS IS MY FIRST PERL PROGRAM!</h1>
</body>
</html>
HTML

