import vok1
import vok2
import v4k
import v720p

import cv2

image = cv2.resize(cv2.imread("relais.png"), (1080, 400))
cv2.imshow("Output", image)
key = cv2.waitKey(0) & 0xFF
if key == ord('1'):
    vok1.video1()
if key == ord('2'):
    v720p.video2()
if key == ord('3'):
    vok2.video3()
if key == ord('4'):
    v4k.video4()
