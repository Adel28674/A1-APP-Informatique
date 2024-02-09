#!/usr/bin/env python3

import numpy as np
import sys
from scipy.integrate import quad
from math import sqrt
#Calcul integral de a à b f(x) dx
#METHODE RECTANGLE
#I_rg = sum(i=0 à n-1) f(xi)*h
#I_rd = sum(i=1 à n) f(xi)*h
#avec h = (b-a)/n
# [a;b] n sous intervalles, points a=x0, x1, x2, ..., b=xn; xi+1-xi=h; xi = a+i*h

def rectG(f,a,b,n): #METHODE RECTANGLE PAR LA GAUCHE
    h = (b-a)/n
    S = 0
    for i in range(0,n):#on va de 0 à n-1 mais on rajoute 1 pour prendre le dernier tour de boucle
        x = a + i*h
        S = S + f(x)*h
    return S

def gauss(t):
    return 1 / (sigma*sqrt(2*np.pi))*np.exp(-(t-m)**2/(2*sigma**2))

def main():
    global m
    global sigma
    global t

    if len(sys.argv) < 3:
        print("Veuillez tous remplir les champs.")
        sys.exit(1)
    else:
        try:
            m = float(sys.argv[1])
            sigma = float(sys.argv[2])
            t = float(sys.argv[3])
            a = m-3*sigma
            integ = rectG(gauss,a,t,10000)
            print("{:.5f}".format(integ))
        except ValueError:
            print("Les valeurs doivent être des nombres entiers ou décimaux.")
            sys.exit(1)

if __name__ == '__main__':
      main()
