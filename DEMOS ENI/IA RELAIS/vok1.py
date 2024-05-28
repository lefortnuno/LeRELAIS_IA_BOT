import cv2
import numpy as np
import source as common
import kyuubi as ku

    # PRESENTABLE A LA PERFECTION !

def video1():
    color_infos = (0, 0, 255)
    ymin = 390
    ymax = 490

    y1_offset = 100
    y2_offset = 150
    x1_offset = 20
    x2_offset = 50
    ylite_offset = 50

    xmin1 = 130
    xmax1 = 280

    xmin2 = 380
    xmax2 = 560

    video = '/home/trofel/Bureau/DEMOS ENI/DATA/ok1.mp4'

    vehicule1 = 0
    vehicule2 = 0
    seuil = 60  # ou 45 minim
    seuil2 = 147

    fond = common.moyenne_image(video, 300)
    fond1 = fond[ymin:ymax, xmin1:xmax1]
    fond2 = fond[ymin:ymax, xmin2:xmax2]
    fond1 = fond1.astype(np.int32)
    fond2 = fond2.astype(np.int32)
    cap = cv2.VideoCapture(video)

    def calcul_mean(image):
        height, width = image.shape
        s = 0
        for y in range(height):
            for x in range(width):
                s += image[y][x]
        return s / (height * width)

    old_1 = 0
    old_2 = 0
    file = '/home/trofel/Bureau/DEMOS ENI/DATA/Picx/'
    while True:
        ret, frame = cap.read()
        tickmark = cv2.getTickCount()
        mask1 = common.calcul_mask(frame[ymin:ymax, xmin1:xmax1], fond1, seuil)
        mask2 = common.calcul_mask(frame[ymin:ymax, xmin2:xmax2], fond2, seuil)
        cadre1 = frame[ymin - 50:ymax, xmin1 - x1_offset:xmax1 + x1_offset]
        cadre2 = frame[ymin:ymax, xmin2:xmax2]

        if calcul_mean(mask1[0:ymax - ymin, 0:xmax1 - xmin1]) > seuil2:
            if old_1 == 0:
                ku.Create(file)
                vehicule1 += 1
                ku.API(file, vehicule1, cadre1, 'E', 'ok1')
                old_1 = 1
                ku.Delete(file)
        else:
            old_1 = 0

        if calcul_mean(mask2[0:ymax - ymin, 0:xmax2 - xmin2]) > seuil2:
            if old_2 == 0:
                ku.Create(file)
                vehicule2 += 1
                ku.API(file, vehicule2, cadre2, 'S', 'ok1')
                old_2 = 1
                ku.Delete(file)
        else:
            old_2 = 0

        cv2.putText(frame, "IN:{:02d}".format(vehicule1), (xmin1, ymin + ylite_offset - 10),
                    cv2.FONT_HERSHEY_COMPLEX_SMALL, 2, (255, 255, 255), 2)
        cv2.putText(frame, "OUT:{:02d}".format(vehicule2), (xmin2, ymin + ylite_offset - 10),
                    cv2.FONT_HERSHEY_COMPLEX_SMALL, 2, (255, 255, 255), 2)
        cv2.rectangle(frame, (xmin1 - 50, ymin + ylite_offset), (xmax1, ymin + ylite_offset),
                      (0, 0, 255) if old_1 else (255, 0, 0), 3)
        cv2.rectangle(frame, (xmin2 - 20, ymin + ylite_offset), (xmax2, ymin + ylite_offset),
                      (0, 0, 255) if old_2 else (255, 0, 0), 3)
        cv2.imshow('video', frame)
        key = cv2.waitKey(1) & 0xFF
        if key == ord('q'):
            break
        if key == ord('p'):
            seuil += 1
        if key == ord('m'):
            seuil -= 1
        if key == ord('a'):
            for cpt in range(20):
                ret, frame = cap.read()

    cap.release()
    cv2.destroyAllWindows()
