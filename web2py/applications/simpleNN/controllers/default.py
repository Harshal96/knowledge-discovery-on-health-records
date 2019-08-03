from keras.models import Sequential
from keras.layers import Dense
from io import StringIO

import numpy
import math
import sklearn

#model=None
#from sklearn.preprocessing import StandardScaler
#fix random seed for reproducibility

def index():
	
	numpy.random.seed(10)


	dataset = numpy.loadtxt("/home/ria/Desktop/web2py/applications/simpleNN/controllers/pima-indians-diabetes.csv", delimiter=",")


	Z = dataset[:,0:8]
	Q = dataset[:,8]


	model = Sequential()
	model.add(Dense(12, input_dim=8, activation='relu'))
	model.add(Dense(8, activation='relu'))
	model.add(Dense(1, activation='sigmoid'))


	model.compile(loss='binary_crossentropy', optimizer='adam', metrics=['accuracy'])


	model.fit(Z, Q, epochs=150, batch_size=10)

	
	# evaluate the model
	scores = model.evaluate(Z, Q)
	var=("Accuracy achieved: %.2f%%" % (scores[1]*100))
	model.save_weights("model.h5")
	return dict(var=var)
	
	#[['6','148','72','35','0','33.6','0.627','50']]
	#[['1','85','66','29','0','26.6','0.351','31.0']]
	
def prediction(inputP):
	var=Nothing
	numpy.random.seed(seed)

	# create model
	model = Sequential()
	model.add(Dense(48, input_dim=8, init='uniform', activation='relu'))
	model.add(Dense(10, init='uniform', activation='relu'))
	model.add(Dense(1, init='uniform', activation='sigmoid'))

	# Compile model
	model.compile(loss='binary_crossentropy', optimizer='adam', metrics=['accuracy'])
	model.load_weights("/home/ria/Desktop/ria.h5")
	Z=numpy.asmatrix(inputP)
	predictions = model.predict(Z)
	rounded = [round(x[0]) for x in predictions]
	if math.isclose(rounded[0],0.0,rel_tol=1e-5):
		if rounded=='0.0':
			var=("Patient will likely not have diabetes")
		else:
			var=("Patient is likely to have diabetes")
	return dict(var=var)
