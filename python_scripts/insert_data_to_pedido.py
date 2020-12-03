import pandas as pd
import connection_database
import handler_query

dataset = pd.read_csv("input_process/data_load_with_id_chofer.csv")
#instance objects to handler database
connector = connection_database.connection_db()
connector.initConnectionDB()#start connection
handler_db = handler_query.HandlerQuery()

id_reparto = 1593825949
for i in range(len(dataset)):

	#process data to insert reparto
	inicial = dataset['retirados'][i]
	entregado = dataset['entregados'][i]
	pendiente = dataset['sobrantes'][i]
	comuna = dataset['id_comuna'][i]
	fecha = dataset['fecha'][i].split("/")
	fecha = "%s-%s-%s" % (fecha[2], fecha[1], fecha[0])
	query_reparto = "INSERT INTO reparto values (%d, %d, %d, %d, '%s', %d)" % (id_reparto, inicial, pendiente, entregado, fecha, comuna)
	print query_reparto

	handler_db.insertToTable(query_reparto, connector)

	#process data to insert reparto_chofer
	chofer = dataset['id_chofer'][i]
	query_reparto_chofer = "INSERT INTO reparto_chofer values (%d, %d, 'FINALIZADO')" % (chofer, id_reparto)

	print query_reparto_chofer
	handler_db.insertToTable(query_reparto_chofer, connector)

	id_reparto+=1
	