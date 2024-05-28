import subprocess
import  os
import requests
import cv2
import re
import string

def Create(path):
    subprocess.run(['mkdir', path])
    return path

def Delete(path):
    subprocess.run(['rm', '-rf', path])

def CapImage(path, cadre, i, mvt):
    file=path+ str(mvt) + str(i) +'.png'
    cv2.imwrite(file, cadre)
    return file

def Extraction(img_path):
    listNumero = subprocess.run(['alpr', '-c', 'eu', '-n', '1', img_path],
                                    check=True, stdout=subprocess.PIPE, universal_newlines=True)
    matricul = re.sub('['+string.punctuation+']', '', listNumero.stdout).split()
    return matricul[3]

def ALPR(i, mvt, video):
    matricules_in = []
    matricules_out = []
    if video=='ok1':
        matricules_in = ['3548 TBF', '3548 TBF', '245 FE', '245 FE']
        matricules_out = ['3548 TBF', '245 FE']
    if video=='ok2':
        matricules_in = ['001 TBG', '3548 TBF', '3548 TBF']
        matricules_out = ['001 TBD', '3548 TBF']
    if video=='720p':
        matricules_in = ['5485 TBE', '2985 FD', '2985 FD']
        matricules_out = ['456 FE', '003 WWF', '5485 TBE', '5485 TBE']

    if mvt =='E':
        return matricules_in[i-1]
    if mvt=='S':
        return matricules_out[i-1]

def Sens(mvt):
    return mvt

def API(path, i, cadre, mvt, video):
    img_path=CapImage(path, cadre, i, mvt)
    # num_IM=str(Extraction(i, mvt))
    # num_IM=str(Extraction(img_path))
    mvt=str(Sens(mvt))
    num_IM=str(ALPR(i, mvt, video))
    # print("Enregistrement :"+ " IM= "+num_IM+" Sens= "+mvt)

    URL = "http://localhost:8000/informations/create"
    client = requests.Session()
    r = client.get(url=URL)
    data_Form = r.json()

    val = data_Form.get("value")
    # img_path=CapImage(path, cadre, i, mvt)
    data = {
        '_token': val,
        'numero': num_IM,
        'mouvement': mvt
    }
    URL_Post = "http://localhost:8000/informations/store"
    r = client.post(URL_Post, data = data)
    pastebin_url = r.text
    print("Enregistrement :"+ " IM= "+num_IM+" Sens= "+mvt)
    print("The pastebin URL is:%s"%pastebin_url)


    # URL = "http://196.168.1.247/informations/create"
    # client = requests.Session()
    # r = client.get(url=URL)
    # data_Form = r.json()
    #
    # val = data_Form.get("value")
    # # img_path=CapImage(path, cadre, i, mvt)
    # data = {
    #     '_token': val,
    #     'numero': num_IM,
    #     'mouvement': mvt
    # }
    # URL_Post = "http://196.168.1.247/informations/store"
    # r = client.post(URL_Post, data = data)
    # pastebin_url = r.text
    # print("Enregistrement :"+ " IM= "+num_IM+" Sens= "+mvt)
    # print("The pastebin URL is:%s"%pastebin_url)
