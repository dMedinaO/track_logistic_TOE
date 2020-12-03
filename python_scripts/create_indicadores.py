import connection_database
import handler_query

def get_number_stars(index):

	stars=0
	if index in [1,3]:
		stars=5
	elif index in [4,10]:
		stars=4
	elif index in [11, 30]:
		stars=3
	elif index in [31, 60]:
		stars=2
	else:
		stars=1

	return stars

#instance objects to handler database
connector = connection_database.connection_db()
connector.initConnectionDB()#start connection
handler_db = handler_query.HandlerQuery()

#get values for rider with respect to: pedidos recogidos, pedidos entregados, pedidos pendientes, dias trabajados
query = "select AVG(reparto.paquetes_inicial) as iniciales, AVG(reparto.paquetes_entregados) as entregados, AVG(reparto.paquetes_pendiente) as pendientes, reparto_chofer.chofer from reparto join reparto_chofer on (reparto.idreparto = reparto_chofer.reparto) group by reparto_chofer.chofer order by entregados DESC, pendientes ASC"
response = handler_db.queryBasicDataBase(query, connector)

index=1
for element in response:

	estrellas = get_number_stars(index)
	query_user = "update chofer set ranking=%d, estrellas=%d where idchofer=%s" % (index, estrellas, element[-1])
	print query_user
	handler_db.insertToTable(query_user, connector)
	index+=1

