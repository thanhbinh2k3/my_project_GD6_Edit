import sys
import tensorflow as tf
import numpy as np
from tensorflow.keras.preprocessing import image

# Load the trained model
model = tf.keras.models.load_model("path_to_model/model.h5")

def predict_image(image_path):
    img = image.load_img(image_path, target_size=(224, 224))  # Adjust target size if necessary
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)  # Add batch dimension

    # Normalize image if necessary (depending on your model's requirements)
    img_array = img_array / 255.0  # Example normalization

    # Get prediction
    predictions = model.predict(img_array)
    predicted_class = np.argmax(predictions, axis=1)  # Assuming a classification task

    return predicted_class[0]  # Return the predicted class index

if __name__ == "__main__":
    image_path = sys.argv[1]
    result = predict_image(image_path)
    print(result)  # Output the result to be captured by PHP
