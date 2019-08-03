# -*- coding: utf-8 -*-
# try something like
import numpy as np
import cPickle

default_settings = {
    "weights_low": -0.1,  # Lower bound on initial weight range
    "weights_high": 0.1,  # Upper bound on initial weight range
    "initial_bias_value": 0.01,
}

def softmax(signal, derivative=False):
    # Calculate activation signal
    e_x = np.exp(signal - np.max(signal, axis=1, keepdims=True))
    signal = e_x / np.sum(e_x, axis=1, keepdims=True)

    if derivative:
        return np.ones(signal.shape)
    else:
        # Return the activation signal
        return signal
        
class neuralnet:
    def __init__(self, settings):
        self.__dict__.update(default_settings)
        self.__dict__.update(settings)

        assert not softmax in map(lambda x: x[1], self.layers) or softmax == self.layers[-1][1], \
            "The `softmax` activation function may only be used in the final layer."

        # Count the required number of weights. This will speed up the random number generation when initializing weights
        self.n_weights = (self.n_inputs + 1) * self.layers[0][0] + \
                         sum((self.layers[i][0] + 1) * layer[0] for i, layer in enumerate(self.layers[1:]))

        # Initialize the network with new randomized weights
        self.set_weights(self.generate_weights(self.weights_low, self.weights_high))

        # Initalize the bias to 0.01
        for index in range(len(self.layers)):
            self.weights[index][:1, :] = self.initial_bias_value

    def generate_weights(self, low=-0.1, high=0.1):
        # Generate new random weights for all the connections in the network
        return np.random.uniform(low, high, size=(self.n_weights,))

    def set_weights(self, weight_list):
        # This is a helper method for setting the network weights to a previously defined list
        # as it's useful for loading a previously optimized neural network weight set.
        # The method creates a list of weight matrices. Each list entry correspond to the
        # connection between two layers.
        start, stop = 0, 0
        self.weights = []
        previous_shape = self.n_inputs + 1  # +1 because of the bias

        for n_neurons, activation_function in self.layers:
            stop += previous_shape * n_neurons
            self.weights.append(weight_list[start:stop].reshape(previous_shape, n_neurons))

            previous_shape = n_neurons + 1  # +1 because of the bias
            start = stop

    def update(self, input_values, trace=False):
        # This is a forward operation in the network. This is how we
        # calculate the network output from a set of input signals.
        output = input_values
        if trace:
            derivatives = []  # collection of the derivatives of the act functions
            outputs = [output]  # passed through act. func.
        for i, weight_layer in enumerate(self.weights):
            # Loop over the network layers and calculate the output
            signal = np.dot(output, weight_layer[1:, :]) + weight_layer[0:1, :]  # implicit bias
            output = self.layers[i][1](signal)
            if trace:
                outputs.append(output)
                derivatives.append(
                    self.layers[i][1](signal, derivative=True).T)  # the derivative used for weight update
        if trace:
            return outputs, derivatives
        return output

    def predict(self, predict_set):
        predict_data = np.array([instance.features for instance in predict_set])
        return self.update(predict_data)
        
class Instance:
    def __init__(self, features, target=None):
        self.features = np.array(features)

        if target != None:
            self.targets = np.array(target)
        else:
            self.targets = None

network = neuralnet({"n_inputs": 1, "layers": [[0, None]]})

with open('/home/ria/Desktop/web2py/applications/simpleNN/controllers//network.dat', 'rb') as file:
    store_dict = cPickle.load(file)

network.n_inputs = store_dict["n_inputs"]
network.n_weights = store_dict["n_weights"]
network.layers = store_dict["layers"]
network.weights = store_dict["weights"]
        
def index(): return dict(message="hello from palomino1.py")
def predict(): return dict(message="hello from predicty")

def result():
    a1=int(request.vars['a1'])
    a2=float(request.vars['a2'])
    a3=float(request.vars['a3'])
    a4=int(request.vars['a4'])
    a5=int(request.vars['a5'])
    a6=int(request.vars['a6'])
    a7=int(request.vars['a7'])
    a8=int(request.vars['a8'])
    a9=int(request.vars['a9'])
    a10=int(request.vars['a10'])
    a11=int(request.vars['a11'])
    a12=int(request.vars['a12'])
    a13=int(request.vars['a13'])
    a14=int(request.vars['a14'])
    a15=int(request.vars['a15'])
    a16=int(request.vars['a16'])
    #neural net code
    prediction_set = [Instance([a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16])]
    ans = ("Predicted Mortality (lung resection) is: {} %" .format(network.predict(prediction_set) * 100))
    #compute result in variable ans
    return dict(message=ans)

def result3():
    value = request.vars
    #handle input variable - value
    a1= value['col1']
    a2= value['col2']
    a3= value['col3']
    a4= value['col4']
    a5= value['col5']
    a6= value['col6']
    a7= value['col7']
    a8= value['col8']
    a9= value['col9']
    a10= value['col10']
    a11= value['col11']
    a12= value['col12']
    a13= value['col13']
    a14= value['col14']
    a15= value['col15']
    a16= value['col16']
    #value ="[['"+value['col1']+"','"+value['col2']+"','"+value['col3']+"','"+value['col4']+"','"+value['col5']+"','"+value['col6']+"','"+value['col7']+"','"+value['col8']+"']]"
    redirect(URL('result', vars=dict(a1=a1,a2=a2,a3=a3,a4=a4,a5=a5,a6=a6,a7=a7,a8=a8,a9=a9,a10=a10,a11=a11,a12=a12,a13=a13,a14=a14,a15=a15,a16=a16)) )
