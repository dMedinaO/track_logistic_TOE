import mysql.connector

class connection_db(object):
	
	#building for class
	def __init__(self):

		self.ConfigurationDB = None#give values to ConfigurationDB atributes
		self.getConfiguration()
		self.Conex = None
		self.cursor= None

	#methon for get params for handler the connection to data base, reading file configuration
	def getConfiguration(self):

		#create dictionary for add information of connection
		dictionary_keys = {}
		dictionary_keys['user'] = "root"
		dictionary_keys['password'] = "desarrollo.toexpress.2019"
		#dictionary_keys['password'] = "123ewq"
		dictionary_keys['host'] = "localhost"
		dictionary_keys['database'] = "logistic_transporte"
		dictionary_keys['raise_on_warnings'] = True

		self.ConfigurationDB = dictionary_keys

	#method that inicializated the connection
	def initConnectionDB(self):
		self.Conex = mysql.connector.connect(**self.ConfigurationDB)#instance to connection
		self.cursor = self.Conex.cursor()

	#method that allow closed connection
	def closeConnectionDB(self):
		self.cursor.close()
		self.Conex.close()

		