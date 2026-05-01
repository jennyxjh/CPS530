#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename; 
$CGI::POST_MAX = 1024 * 5000;


my $first = param ('first');
my $last = param ('last');
my $street = param ('street');
my $province = param ('province');
my $city = param ('city');
my $postal = param ('postal');
my $phone = param ('phone');
my $email = param ('email');

my $postal_format = qr/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d/;
my $phone_format = qr/^\d{10}$/;
my $email_format = qr/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

my @errors;

if ($postal !~ $postal_format) {
    push @errors, "- Incorrect Postal Code Format: <p style='color: red;'>$postal<p> 
    <p>Correct Format:<span style='color: green;'> X#X #X#</span><p>";
}
if ($phone !~ $phone_format) {
    push @errors, "- Incorrect Phone Number Format: <p style='color: red;'>$phone<p>
    <p>Correct Format:<span style='color: green;'> 1234567890</span><p>";
}
if ($email !~ $email_format) {
    push @errors, "- Incorrect Email Address Format: <p style='color: red;'>$email<p>
    <p>Correct Format:<span style='color: green;'> _______&commat;_____.___</span><p>";
}

my $safe_filename_characters = "a-zA-Z0-9_.-"; 
my $upload_dir = "/class-years/y2022/x44huang/public_html/upload"; 
my $query = new CGI; 
my $filename = $query->param("photo"); 
if ( !$filename ) { print $query->header ( ); print "There was a problem uploading your picture (try a smaller file)."; exit; } 
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g; 

if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { $filename = $1; } else { die "Filename contains invalid characters"; } 
my $upload_filehandle = $query->upload("photo"); 

open (UPLOADFILE, ">$upload_dir/$filename") or die "$!"; binmode UPLOADFILE; 
while ( <$upload_filehandle> ) { print UPLOADFILE; } 
close UPLOADFILE; 

print $query->header ( ); 


if (@errors) {
    print "Please Correct The Following Errors: <br><br>";
    foreach my $error (@errors) {
        print "$error";
    }
    print "<a href='https://www2.cs.torontomu.ca/~x44huang/lab07b/lab07b.html'>Return to the form</a><br>";
}
else {
print <<HTML;
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Customer Registration Information </title>

        <style>
            h2 {
                text-align: center;
                font-size: 35px;
                color: navy;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            body {
                background-color: gainsboro;
                font-family: Verdana, Geneva, Tahoma, sans-serif;           
            }
            section {
                color: navy;
                background-color: rgb(135, 206, 235);
                padding: 20px;
                text-align: center;
                margin: 10px 0;
                border-radius: 8px;
            }
        </style>
    </head>
    <body>
        <h2> Customer Registration </h2>
        <section>
            <p> Full Name: $first $last <p> 
            <p> Address: $street, $city, $province, $postal <p> 
            <p> Phone Number: $phone <p> 
            <p> Email: $email <p> <br>
            <p> Photo: <p>
            <img src="https://www.cs.torontomu.ca/~x44huang/upload/$filename" alt="Uploaded picture" style="max-width:90%; height:auto;">
        </section>
    </body>
</html>
HTML
}



