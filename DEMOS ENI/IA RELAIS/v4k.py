import cv2
import numpy as np
import source as common
import kyuubi as ku

# PRESENTABLE COMME AUTRES EXEMPLE CAR LA DETECTION DE
# VEHICULES EST JUSTE PARFAITE !
# SEUL SOUCIE: LA VIDEO EST EN 4K DONC CA RAM !

def video4():
    color_infos = (0, 0, 255)

    ymin = 1150
    ymax = 1290

    y1_offset = 750
    y2_offset = 160
    x1_offset = 150
    x2_offset = 100

    xmin1 = 280
    xmax1 = 730

    xmin2 = 950
    xmax2 = 1350

    video = '/home/trofel/Bureau/DEMOS ENI/DATA/4k.mp4'
    vehicule1 = 0
    vehicule2 = 0
    seuil = 40
    seuil2 = 147

    fond = common.moyenne_image(video, 200)
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
        cadre1 = frame[ymin + 250:ymax + y1_offset, 0:xmax1 + x1_offset]
        cadre2 = frame[ymin - y2_offset:ymax + y2_offset, xmin2:xmax2 + x2_offset]

        if calcul_mean(mask1[0:ymax - ymin, 0:xmax1 - xmin1]) > seuil2:
            if old_1 == 0:
                ku.Create(file)
                vehicule1 += 1
                ku.API(file, vehicule1, cadre1, 'E', '4k')
                old_1 = 1
                ku.Delete(file)
        else:
            old_1 = 0

        if calcul_mean(mask2[0:ymax - ymin, 0:xmax2 - xmin2]) > seuil2:
            if old_2 == 0:
                ku.Create(file)
                vehicule2 += 1
                ku.API(file, vehicule2, cadre2, 'S', '4k')
                old_2 = 1
                ku.Delete(file)
        else:
            old_2 = 0

        # fps=cv2.getTickFrequency()/(cv2.getTickCount()-tickmark)
        # cv2.putText(frame, "FPS: {:05.2f}  Seuil: {:d}".format(fps, seuil), (10, 30), cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, color_infos, 1)
        cv2.putText(frame, "IN:{:02d}".format(vehicule1), (xmin1, ymin - 10), cv2.FONT_HERSHEY_COMPLEX_SMALL, 2,
                    (255, 255, 255), 2)
        cv2.putText(frame, "OUT:{:02d}".format(vehicule2), (xmin2, ymin - 10), cv2.FONT_HERSHEY_COMPLEX_SMALL, 2,
                    (255, 255, 255), 2)
        cv2.line(frame, (xmin1, ymin), (xmax1, ymin), (0, 0, 255) if old_1 else (255, 0, 0), 3)
        cv2.line(frame, (xmin2, ymin), (xmax2, ymin), (0, 0, 255) if old_2 else (255, 0, 0), 3)
        # cv2.imshow('video', frame)
        # imgStack = extract.stackImages(0.3, ([frame]))
        cv2.imshow('RELAIS', frame)
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
