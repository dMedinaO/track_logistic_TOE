import pandas as pd

data = pd.read_csv('comunas_list.csv')

comunas_full = []

for comuna in data['comuna']:
	lista = comuna.split("/")
	for element in lista:
		comunas_full.append(element.upper())

comunas_full = list(set(comunas_full))

index = 1

for i in range(len(comunas_full)):
	query = "INSERT INTO comuna values(%d, '%s', NOW(), NOW());" % (index, comunas_full[i])
	print query