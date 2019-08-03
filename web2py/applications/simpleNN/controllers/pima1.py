from keras.models import Sequential
from keras.layers import Dense
from io import StringIO

import numpy
import math
import sklearn

def isclose(a, b, rel_tol=1e-09, abs_tol=0.0):
	return abs(a-b) <= max(rel_tol * max(abs(a), abs(b)), abs_tol)

model=None

#from sklearn.preprocessing import StandardScaler

def index(): return dict(message="hello from pima1.py")
def predict1():
	return dict(message="hi")
def result1():
	inputP=request.vars['value']
	var=None

	# create model
	pmodel = Sequential()
	pmodel.add(Dense(12, input_dim=8, activation='relu'))
	pmodel.add(Dense(8, activation='relu'))
	pmodel.add(Dense(1, activation='sigmoid'))

	#oldw=model.get_weights()
	#pmodel.set_weights(oldw)

	pmodel.load_weights("model.h5")
	
	pmodel.compile(loss='binary_crossentropy', optimizer='adam', metrics=['accuracy'])

	res=pmodel.predict(numpy.asmatrix(inputP))

	rounded = [round(x[0]) for x in res]

	if isclose(rounded[0],0.0,rel_tol=1e-5):
		var="Patient will likely not have diabetes"
	else:
		var="Patient is likely to have diabetes"
	print (var)
	
	return dict(message=var)
def result2():
	value = request.vars
	value ="[['"+value['col1']+"','"+value['col2']+"','"+value['col3']+"','"+value['col4']+"','"+value['col5']+"','"+value['col6']+"','"+value['col7']+"','"+value['col8']+"']]"
	# handle the variable
	print value
	print "test"
	redirect(URL('result1', vars=dict(value=value)) )
