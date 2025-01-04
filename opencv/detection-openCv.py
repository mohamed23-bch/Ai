import cv2

# Initialize the camera
cam = cv2.VideoCapture(0)
cam.set(3, 740)  # Width
cam.set(4, 580)  # Height

className = []

# Load class names
classFile = 'coco.names'
with open(classFile, 'rt') as f:
    className = f.read().rstrip('\n').split('\n')

print(className)

# Load the model
configPath = 'ssd_mobilenet_v3_large_coco_2020_01_14.pbtxt'
weightsPath = 'frozen_inference_graph.pb'

net = cv2.dnn_DetectionModel(weightsPath, configPath)
net.setInputSize(320, 230)
net.setInputScale(1.0 / 127.5)
net.setInputMean((127.5, 127.5, 127.5))
net.setInputSwapRB(True)

while True:
    success, img = cam.read()

    # Check if the frame was captured successfully
    if not success:
        print("Erreur : Impossible de lire l'image de la caméra.")
        break

    classIds, confs, bbox = net.detect(img, confThreshold=0.5)
    print(classIds, bbox)

    if len(classIds) != 0:
        for classId, confidence, box in zip(classIds.flatten(), confs.flatten(), bbox):
            cv2.rectangle(img, box, color=(0, 255, 0), thickness=2)
            cv2.putText(img, className[classId - 1], (box[0] + 10, box[1] + 20),
                        cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), thickness=2)

    cv2.imshow('img', img)

    # Use a small delay for a smoother display
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release the camera and close windows
cam.release()
cv2.destroyAllWindows()
