import cv2
import numpy as np
import pygame
from pygame.locals import *
from OpenGL.GL import *
from OpenGL.GLU import *

# Load the pre-trained face detector from OpenCV
face_cascade = cv2.CascadeClassifier(
    cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Load the 3D face model from an .obj file
with open('t.obj', 'r') as obj_file:
    obj_data = obj_file.read()

vertices = []
faces = []

for line in obj_data.splitlines():
    if line.startswith('v '):
        vertex = list(map(float, line[2:].split()))
        vertices.append(vertex)
    elif line.startswith('f '):
        face = list(map(int, line[2:].split()))
        faces.append(face)

pygame.init()
screen = pygame.display.set_mode((640, 480), DOUBLEBUF | OPENGL)
pygame.display.set_caption("3D Face Renderer")

glEnable(GL_DEPTH_TEST)
glMatrixMode(GL_PROJECTION)
glLoadIdentity()
gluPerspective(45, (640 / 480), 0.1, 50.0)
glMatrixMode(GL_MODELVIEW)

cap = cv2.VideoCapture(0)

while True:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            pygame.quit()
            cap.release()
            cv2.destroyAllWindows()
            quit()

    ret, frame = cap.read()
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    detected_faces = face_cascade.detectMultiScale(
        gray, scaleFactor=1.3, minNeighbors=5, minSize=(30, 30))

    glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT)

    for (x, y, w, h) in detected_faces:
        cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)

        # Map 2D face coordinates to 3D
        x_3d = (x + w/2) / 320.0 - 1.0
        y_3d = (y + h/2) / 240.0 - 1.0

        glLoadIdentity()
        glTranslatef(x_3d, -y_3d, -5)

        glBegin(GL_TRIANGLES)
        for face in faces:
            for vertex_index in face:
                vertex = vertices[vertex_index - 1]
                glVertex3fv(vertex)
        glEnd()

    cv2.imshow('Face Tracker and Renderer', frame)

    pygame.display.flip()
    pygame.time.wait(10)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
pygame.quit()
