import pandas as pd
import connection_database
import handler_query

dataset = pd.read_csv("input_process/data_load.csv")

#instance objects to handler database
connector = connection_database.connection_db()
connector.initConnectionDB()#start connection

handler_db = handler_query.HandlerQuery()
count=0
list_id = []
for chofer in dataset['chofer']:

	#traer query:
	query = "select chofer.idchofer from chofer where chofer.nombre_chofer = '%s'" % (chofer)
	response_data = handler_db.queryBasicDataBase(query, connector)
	if len(response_data) ==0:
		list_id.append(-1)
		count+=1
	else:
		list_id.append(response_data[0][0])

print count
dataset['id_chofer'] = list_id
dataset.to_csv("input_process/data_load_with_id_chofer.csv", index=False)		
