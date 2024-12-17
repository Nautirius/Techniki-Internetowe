#!/usr/bin/env python3
import csv
import os

csv_file = "../../lab05/data/data.csv"

# HTTP header
print("Content-type: text/html")
print()
print("<html><head><title>Tabela danych</title><style>table{width:30vw; border-collapse:collapse; margin-bottom:10px;} tr:nth-child(even){background-color: lightblue;} td, th{padding: 5px;}</style></head><body>")
print("<h2>Tabela danych</h2>")
print("<table border='1'>")
print("<tr><th>Nazwisko</th><th>Imie</th><th>e-mail</th><th>Rok studiow</th></tr>")

# odczytywanie danych z pliku
if os.path.exists(csv_file):
    with open(csv_file, mode='r') as file:
        reader = csv.reader(file)
        for row in reader:
            print("<tr><td>{}</td><td>{}</td><td>{}</td><td>{}</td></tr>".format(*row))
else:
    print("<tr><td colspan='4'>Nie udalo sie wczytac danych z pliku</td></tr>")

print("</table>")
print("<a href='../../lab05/form.html'>Wroc do formularza</a>")
print("</body></html>")
