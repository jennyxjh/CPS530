#!/usr/bin/python
import cgi
print("Content-type:text/html\n\n")

form = cgi.FieldStorage()

city = form.getvalue('city')
country = form.getvalue('country')
provinceState = form.getvalue('provinceState')

cityCap = city.capitalize()
countryCap = country.capitalize()
psCap = provinceState.capitalize()

print('<!DOCTYPE html><html lang="en">')
print(""" 
<head>
    <style>
        p {
            color: hotpink;
        }
        body {
            background-color: bisque;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
""")

print(""" 
    <body>
    <h1 style="color: red">Ruby Output</h1>
    <p> City: {}</p> 
    <p> Province/State: {} </p> 
    <p> Country: {} </p> 
    <p> Image: </p>
    </body></html>
""").format(cityCap, psCap, countryCap)
