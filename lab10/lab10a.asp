<%
Dim color
color = Request.QueryString("color")

if color = "" Then
   color = "white"
end if

Dim lastVisit, curVisit
curVisit = Now()

if Request.Cookies("lastVisit") <> "" Then
   lastVisit = Request.Cookies("lastVisit")
else
   lastVisit = "This is your first visit"
end if

Response.Cookies("lastVisit") = curVisit
Response.Cookies("lastVisit").Expires = DateAdd("m", 1, Now())
%>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lab 10 Problem 1</title>

      <style>
         body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            color: <%=font%>;
            background-color: <%=color%> ; 
         }
      </style>
   </head>

   <body>
      <h1> Problem 1 Solution</h1>

      <p> Last Visit: <%=lastVisit%></p>
   </body>
</html>
