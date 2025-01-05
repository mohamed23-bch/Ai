import cv2 as cv 
import numpy as np

img = cv.imread('photo.jpg') 
# img_rez=cv.resize(img, (500,500),interpolation=cv.INTER_CUBIC)
cv.imshow('image',img)
# cv.imshow('image',img_rez)





cv.waitKey(0)
 
cv.destroyAllWindows()
 
# ###################################################################


# capture = cv.VideoCapture('dd.mp4')

# while True:
#     isTrue,frame = capture.read()
#     if isTrue:
#         cv.imshow('video',frame)
#         if cv.waitKey(20) & 0xFF == ord('x'):
#             break
#     else:
#         break

#################################
# vid = cv.VideoCapture(0) 
# while True:
#     isTrue,frame = vid.read()

#     cv.imshow('cam',frame)

#     if isTrue:
#         if cv.waitKey(20) & 0xFF == ord('x'):
#             break


# vid.release()
# cv.destroyAllWindows()

# 3##################################

# empty = np.zeros((600,600,3) ,dtype="uint8")

# # cv.imshow('empty',empty)


# empty[200:300,300:400]=150,150,150
# cv.imshow('coo',empty)

# cv.rectangle(empty,(0,0),(300,300),(0,230,255),thickness=3)
# cv.imshow('root',empty)

# cv.waitKey(0)
# cv.destroyAllWindows() 