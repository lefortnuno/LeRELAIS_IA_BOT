import cv2
import numpy as np
import source as common
import kyuubi as ku

# VOYEZ VOUS ON A FAIT EXPRET DE LAISSER LA ROUGE ETRE IDENTIFIER 02 FOIS
# CAR IL SE PEUT QUE CE GENRE DE CHOSE ARRIVE EN VRAI ALORS ON A D OR ET DEJA PARRE A CETTE SITUATION !
# VOYEZ, IL N'EST ENREGISTRER QU'UNE FOIS ! ENTANT QU ENTRANT

def video2():
    color_infos = (0, 0, 255)

    ymin = 550
    ymax = 590

    y1_offset = 350
    y2_offset = 350
    x1_offset = 0
    x2_offset = 50

    xmin1 = 180
    xmax1 = 330

    xmin2 = 450
    xmax2 = 600

    video = '/home/trofel/Bureau/DEMOS ENI/DATA/720p1.mp4'

    vehicule1 = 0
    vehicule2 = 0
    seuil = 20
    seuil2 = 147

    fond = common.moyenne_image(video, 500)
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
        cadre1 = frame[ymin - 200:ymax + y1_offset, xmin1 - x1_offset:xmax1 + x1_offset]
        cadre2 = frame[ymin - y2_offset:ymax + 200, xmin2:xmax2]

        if calcul_mean(mask1[0:ymax - ymin, 0:xmax1 - xmin1]) > seuil2:
            if old_1 == 0:
                ku.Create(file)
                vehicule1 += 1
                ku.API(file, vehicule1, cadre1, 'E', '720p')
                old_1 = 1
                ku.Delete(file)
        else:
            old_1 = 0

        if calcul_mean(mask2[0:ymax - ymin, 0:xmax2 - xmin2]) > seuil2:
            if old_2 == 0:
                ku.Create(file)
                vehicule2 += 1
                ku.API(file, vehicule2, cadre2, 'S', '720p')
                old_2 = 1
                ku.Delete(file)
        else:
            old_2 = 0

        cv2.putText(frame, "IN:{:02d}".format(vehicule1), (xmin1, ymin - 10), cv2.FONT_HERSHEY_COMPLEX_SMALL, 2,
                    (255, 255, 255), 2)
        cv2.putText(frame, "OUT:{:02d}".format(vehicule2), (xmin2, ymin - 10), cv2.FONT_HERSHEY_COMPLEX_SMALL, 2,
                    (255, 255, 255), 2)
        # cv2.rectangle(frame, (xmin1, ymin), (xmax1, ymax), (0, 0, 255) if old_1 else (255, 0, 0), 3)
        # cv2.rectangle(frame, (xmin2, ymin), (xmax2, ymax), (0, 0, 255) if old_2 else (255, 0, 0), 3)
        cv2.line(frame, (xmin1 - 50, ymin), (xmax1, ymin), (0, 0, 255) if old_1 else (255, 0, 0), 3)
        cv2.line(frame, (xmin2 - 20, ymin), (xmax2 + 30, ymin), (0, 0, 255) if old_2 else (255, 0, 0), 3)
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
