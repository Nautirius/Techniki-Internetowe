#!/usr/bin/env python3
import cgi
import csv
import os

csv_file = "../../lab05/data/data.csv"

# parsowanie danych formularza
form = cgi.FieldStorage()
first_name = form.getvalue("first-name", "")
last_name = form.getvalue("last-name", "")
email = form.getvalue("email", "")
year = form.getvalue("year", "")

# zapisywanie danych do pliku
with open(csv_file, mode='a', newline='') as file:
    writer = csv.writer(file)
    writer.writerow([last_name, first_name, email, year])

# wypisanie informacji dla uzytkownika
print("Content-type: text/html")
print()
print("<html><head><title>Potwierdzenie</title></head><body>")
print("<p>Dane zostaly pomyslnie zapisane</p>")
print("<a href='../../lab05/form.html'>Wroc do formularza</a>")
print("</body></html>")
